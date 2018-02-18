<?php
session_start();

$imageinfo = getimagesize($_FILES['userImage']['tmp_name']);
if(!$imageinfo) {
	$errors[] =   "file is not a picture!! <br>";
}

$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' );
if (!in_array($_FILES['userImage']['type'], $types)){
      $errors[] =  'Allowed only: *.png, *.gif, *.jpg <br>';
}
 

if ($_FILES['userImage']['size'] > 1048576 ){//1mb если размер файла больше чем указан в php ini то файл полностью игнориться
 	$errors[] = 'File size is too big!. 1mb allowed <br>';
}

 $blacklist = array(".php", ".phtml", ".php3", ".php4");
 foreach ($blacklist as $item) {
   if(preg_match("/$item\$/i", $_FILES['userImage']['name'])) {
   	$errors[] =   "PHP file not allowed! <br>";
   }
 }

if (empty($errors)) { 
	$_FILES['userImage']['size'] = 104857;
	$sourcePath = $_FILES['userImage']['tmp_name']; //временный путь и имя файла
	$targetPath = "../img/avatars/".md5($_SESSION['login']).'.png';  // путь и имя куда сохраняется файл
	move_uploaded_file($sourcePath,$targetPath);
	$_SESSION['random'] =  mt_rand();
}

else {
	$errors = json_encode($errors);
	echo $errors;
}
?>