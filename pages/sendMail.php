<?php
//SEND MAIL
$msg = htmlspecialchars($_POST['message']);
$email = htmlspecialchars($_POST['email']);

//CHECKS
if  (trim($msg) == '' OR  trim($email) == ''){
	$errors[] = 'Fill all fields !! <br>';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
	$errors[] = 'E-mail is incorrect !! <br>';
}

//IF NO ERRORS - SEND MAIL
if (empty($errors)) { 
	$message = $msg .'<br> Email addres  ' . $email;
	mail("leonid.90@inbox.ru", "New question" ,$message );
	exit;
}

//IF ERRORS SEND BACK TO INDEX.PHP AND SHOW THEM TO USER
else {
	$errors = json_encode($errors);
	echo $errors; 
}
?>




