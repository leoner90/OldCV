<?php session_start();

//Get select option value
$tittle = htmlspecialchars($_POST['tittle']);
$phone = htmlspecialchars($_POST['phone']);
$price = htmlspecialchars($_POST['price']);
$text = htmlspecialchars($_POST['text']);

//FIELDS CHECK
if (trim($text) == '' OR trim($tittle) == '') {
	$errors[] = "Fill  Text and Tittle fields please! <br>";
}

if (strlen($tittle) < 10) {
	$errors[] = 'Tittle text should be not less than 10 symbols! <br>';
}

if (strlen($text) < 50) {
	$errors[] = 'Text should be not less than 50 symbols! <br>';
}

if (strlen($text) > 2001) {
	$errors[] = 'Text should be not more than 2000 symbols! <br>';
}

if (strlen($tittle) > 101) {
	$errors[] = 'Tittle text should be not more than 100 symbols! <br>';
}

if (!is_numeric($price) OR  trim($price) == '' OR strlen($price) > 15) {
	$errors[] = 'Incorrect price <br>';
}

if (!is_numeric($phone) OR  trim($phone) == '' OR strlen($phone) > 15  )  {
	$errors[] = 'Incorrect phone number <br>';
}

//IMAGES CHECK  (if checkbox no-images not checked -  then proceed . otherwise no error checks)
if(!isset($_POST['no-images'])){
	
	//GET IMAGES
	$imagesArr = array($_FILES['userImage'] , $_FILES['userImage2'] , $_FILES['userImage3'] , $_FILES['userImage4'] ); //достаем все картинки
	
	//IMAGE SIZE CHECK
	for ($i=0; $i < count($imagesArr) ; $i++) { 
		//CHECK THAT IMG NOT EMPTY AND SIZE NOT MORE THEN 2 GB
		if ($imagesArr[$i]['size'] !== 0 &&  $imagesArr[$i]['size'] < 2097150 && $imagesArr[$i]['error'] == 0  ) { 
			$images[] = $imagesArr[$i]; //if size is good and no error 
		}

		// if field isn't empty check for other errors like php.ini restriktion (size)
		elseif ($imagesArr[$i]['error'] !== 4) { 
			$errors[] = 'File size is too big!. 2mb allowed   IMG:  '.$imagesArr[$i]['name'].'<br>';
		} 
		$targetPath[$i] = '';//create empty array for db in case if not all 4 images uploaded it will write to db empty slot 
	}

	if (isset($images)) {
		$ImagesArrLength = count($images);
	}

	else{ //IF NO IMAGES SELECTED
		 $errors[] = "Choose at least one image! <br>"; 
		 $ImagesArrLength = 0;
	}
 
	//check img range allowed
	$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' );
	for ($i=0; $i < $ImagesArrLength   ; $i++) { 
		if (!in_array($images[$i]['type'], $types)){
	      $errors[] =  'Allowed only: *.png, *.jpg <br>';
		}
	}

	//check on php files
	$blacklist = array(".php", ".phtml", ".php3", ".php4");
	for ($i=0; $i < $ImagesArrLength   ; $i++) { 
		foreach ($blacklist as $item) {
		  if(preg_match("/$item\$/i", $images[$i]['name'])) {
		    $errors[] =   "PHP file not allowed! <br>";
		  }
		}
	}
}

//if checkbox no-images is checked then first image - default and other 3 images empty!
else {
	$targetPath[0] = '../img/AdImages/default-img.jpg';
	$targetPath[1] = '';
	$targetPath[2] = '';
	$targetPath[3] = '';
}

//adding to the database
if (empty($errors)) { 
	include 'bdConnect.php';  
	$dbname = $_POST['partition'];
	$TableName  = $_POST['partition2'];
	
	// if selected cars partition 
	if (!empty($_POST['partition3']) ){ 
		$dbname = $_POST['partition2'];
		$TableName = $_POST['partition3'];
	}
	$conn = new mysqli($servername, $username, $serverpassword, $dbname);  

	//if checkbox no-images is checked miss the image adding to server
 	if(!isset($_POST['no-images'])){ 
		for ($i=0; $i < $ImagesArrLength   ; $i++) { 
	 		$sourcePath = $images[$i]['tmp_name']; 
	 		$targetPath[$i] = "../img/AdImages/".mt_rand().$images[$i]['name'];
	 		move_uploaded_file($sourcePath,$targetPath[$i]);
		 }
 	}
 	//adding to the database
 	$user = md5($_SESSION['login']);
 	$text = str_replace('\'', '"', $text); //to avoid problems with bd (singl quotes)
 	$tittle = str_replace('\'', '"', $tittle); //to avoid problems with bd (singl quotes)
	$sql = "INSERT INTO $TableName (tittle , text , phone , price  , img , img2 , img3 , img4 , user_name ) 
	VALUES ('$tittle' , '$text' , '$phone' , '$price' , '$targetPath[0]', '$targetPath[1]', '$targetPath[2]', '$targetPath[3]' , '$user') "; 
	$conn->query($sql); 
	$last_advert_id = $conn->insert_id;
	$conn->close();

	//adding to the user advert history 
	$history = $last_advert_id.'/'.$dbname.'/'.$TableName.'/'.md5($_SESSION['login']).'%';
	include 'bdConnect.php';  
	$dbname = 'users';
	$id = $_SESSION['id'];
	$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
	$sql = "UPDATE usersforadportal SET history=CONCAT( history,  '$history')  where id = '$id'";
	$conn->query($sql);
	$conn->close();
	exit;
}

//IF ERRORS
else {
	$errors = json_encode($errors);
	echo $errors;	
}
?>
