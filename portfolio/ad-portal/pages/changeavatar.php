<?php
session_start();
//IMAGE CHECKS

//CHECK THAT IMG NOT EMPTY AND SIZE NOT MORE THEN 2 GB
if ($_FILES['userImage']['size'] > 2097150 OR $_FILES['userImage']['error'] !== 0  ) { 
	$errors[] = 'File size is too big!. 2mb allowed ';
}

else {
	$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' );
	if (!in_array($_FILES['userImage']['type'], $types)){
	      $errors[] =  'Allowed only: *.png, *.gif, *.jpg <br>';
	}
	 
	if ($_FILES['userImage']['size'] > 1048576 ){ //1 MB MAX
	 	$errors[] = 'File size is too big!. 1mb allowed <br>';
	}

	$blacklist = array(".php", ".phtml", ".php3", ".php4");
	foreach ($blacklist as $item) {
		if(preg_match("/$item\$/i", $_FILES['userImage']['name'])) {
			$errors[] =   "PHP file not allowed! <br>";
		}
	}
}
//IF NO ERROS SAVE IMAGE ON SERVER 
if (empty($errors)) { 
	$sourcePath = $_FILES['userImage']['tmp_name']; //временный путь и имя файла
	$targetPath = "../img/avatars/".md5($_SESSION['login']).'.png';  // путь и имя куда сохраняется файл
	move_uploaded_file($sourcePath,$targetPath);
	$_SESSION['random'] =  mt_rand();
	exit;
}

//IF ERRORS -RETURN ERROS
else {
	$errors = json_encode($errors);
	echo $errors;
	exit;
}
?>
