<?php 
$tittle = htmlspecialchars($_POST['tittle']);
$phone = htmlspecialchars($_POST['phone']);
$price = htmlspecialchars($_POST['price']);
$text = htmlspecialchars($_POST['text']);
//GET IMAGES
$imagesArr = array($_FILES['userImage'] , $_FILES['userImage2'] , $_FILES['userImage3'] , $_FILES['userImage4'] ); //достаем все картинки

for ($i=0; $i < count($imagesArr)  ; $i++) { 
	if ($imagesArr[$i]['size'] !== 0 && $imagesArr[$i]['error'] == 0) { // проверяем пустые они или нет
		$images[] = $imagesArr[$i]; //создаем масив с реально загруженными картинками
	}
		 $targetPath[$i] = '';  //??? идиотизм!!!! для того что бы не было ошибки при добавление в базу данных что бы не было пустых элементов в массиве
}


if (isset($images)) {
	$ImagesArrLength = count($images) ;
}

else {
	 $errors[] = "Choose at least one image! <br>"; 
	 $ImagesArrLength = 0;
}

 
//FIELDS CHECK
if (trim($text) == '' OR trim($tittle) == '') {
	$errors[] = "Fill  Text and Tittle fields please! <br>";
}

// if (!preg_match("/^[a-zA-Z0-9\s-,.()'\"%!+-]*$/",$text) OR !preg_match("/^[А-Яа-яa-zA-Z0-9\s-,.()'\"%!+-]*$/",$tittle))  {
//   $errors[] = "Only letters , numbers and space allowed! <br>"; 
// } 



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


if (!is_numeric($price) OR  trim($price) == '') {
	$errors[] = 'Incorrect price <br>';
}

if (!is_numeric($phone) OR  trim($phone) == ''  )  {
	$errors[] = 'Incorrect phone number <br>';
}




//IMAGES CHECK
//если картинка не выбрана проверка
for ($i=0; $i < $ImagesArrLength   ; $i++) { 
	if ($images[$i]['size'] > 1048576) {//1mb если размер файла больше чем указан в php ini то файл полностью игнориться
			$errors[] = 'File size is too big!. 1mb allowed'.$images[$i]['name'].'<br>';
	}
}


$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' );
for ($i=0; $i < $ImagesArrLength   ; $i++) { 
	if (!in_array($images[$i]['type'], $types)){
      $errors[] =  'Allowed only: *.png, *.jpg <br>';
	}
}


$blacklist = array(".php", ".phtml", ".php3", ".php4");
for ($i=0; $i < $ImagesArrLength   ; $i++) { 
	foreach ($blacklist as $item) {
	  if(preg_match("/$item\$/i", $images[$i]['name'])) {
	    $errors[] =   "PHP file not allowed! <br>";
	  }
	}
}

//adding to the database
if (empty($errors)) { 
	include 'bdConnect.php';  
	$dbname = $_POST['partition'];
	$TableName  = $_POST['partition2'];
	

	if (!empty($_POST['partition3']) ){ // if selected cars partition 
		$dbname = $_POST['partition2'];
		$TableName = $_POST['partition3'];
	}
	$conn = new mysqli($servername, $username, $serverpassword, $dbname);  
 
	for ($i=0; $i < $ImagesArrLength   ; $i++) { 
 		$sourcePath = $images[$i]['tmp_name']; 
 		$targetPath[$i] = "images/".$images[$i]['name'];
 		move_uploaded_file($sourcePath,$targetPath[$i]);
	 }
	
 	
	$sql = "INSERT INTO $TableName (tittle , text , phone , price  , img , img2 , img3 , img4 ,address) 
	VALUES ('$tittle' , '$text' , '$phone' , '$price' , '$targetPath[0]', '$targetPath[1]', '$targetPath[2]', '$targetPath[3]' , 'St George's Townhouses 
Jewellery Quarter, Birmingham '  ) "; //как то генерировать сразу в форе
	$conn->query($sql); 
	$conn->close();
	exit;
//adding to the user database advert history 
	// include 'bdConnect.php';  
	// $dbname = "users";
	// $conn = new mysqli($servername, $username, $serverpassword , $dbname);
	// $sql = "UPDATE usersforadportal SET weight = 160, desiredWeight = 145 WHERE id = 1;
	// VALUES ('$login' ,'$password' ,'$mail')";  добавлять ссылку типо dbname+tablename+advert id
	// $conn->query($sql); 

}

else {
	$errors = json_encode($errors);
	echo $errors;	
}

?>
 



       
