<?php session_start(); 
// GOOGLE CAPTCHA
$secret= '6LcApK0UAAAAAGF_HgI_2wyFh0wF_1I545M7Ykdk';
$response = $_POST['captcha'];
$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success=json_decode($verify);
// CAPTCHA ERROR CHECK
if ($captcha_success->success==false)  {
	$errors[] = 'captcha-Err';
}
 
$msg = htmlspecialchars($_POST['message']);
$email = htmlspecialchars($_POST['email']);
$email = trim($email);

// EMAIL ERROR CHECK
if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
	$errors[] = 'e-mail-Err';
}
// MESSAGE ERROR CHECK
if  (trim($msg) == '') {
	$errors[] = 'message-Err';
}

// TIMING ERROR CHECK (IF MSG SENT LESS THAN 1 MINUTE AGO - ERROR))
if (isset($_SESSION['timeout']) and $_SESSION['timeout'] > time()) {
	$errors[] = 'timing-Err';
	$errors[] = $_SESSION['timeout'] - time();
}
//IF NO ERRORS - SEND MAIL
if (empty($errors)) { 
	$_SESSION['timeout'] =  time() + 60;
	$msg = wordwrap($msg,70);
	mail('leonid.gurockin@gmail.com', 'Sender E-mail: ' .$email , $msg );
	exit;
}
//IF ERRORS SEND BACK TO mainJS.js AND SHOW THEM TO USER
else {
	$errors = json_encode($errors);
	echo $errors; 
}
?>