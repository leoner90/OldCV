<?php
session_start();

//GET CARD INPUT FIELDS VALUE
$cardNum = htmlspecialchars($_POST['cardNum']);
$cardName = htmlspecialchars($_POST['cardName']);
$cardExpMonth = htmlspecialchars($_POST['cardExpMonth']);
$cardExpYear = htmlspecialchars($_POST['cardExpYear']);
$cardBack = htmlspecialchars($_POST['cardBack']);
$cardAddress = htmlspecialchars($_POST['cardAddress']);
$cardPhone = htmlspecialchars($_POST['cardPhone']);

//ERROR CHECK
if (trim($cardName) == '' OR trim($cardAddress) == '' ) {
	$errors[] = "Fill CARD NAME and ADDRESS fields please! <br>";
}

if (!is_numeric($cardPhone)) {
	$errors[] = 'Incorrect phone number <br>';
}

if (strlen($cardNum) !== 16  OR !is_numeric($cardNum) ) {
	$errors[] = "Card number is incorect! <br>";
}

if (strlen($cardBack) !== 3  OR !is_numeric($cardBack) ) {
	$errors[] = "Card CVC is incorect! <br>";
}

if ( $cardExpYear < date("Y") ) {
	$errors[] = " Your card has been expired! <br>";
}

if ( $cardExpYear == date("Y") AND $cardExpMonth < date("m")) {
	$errors[] = " Your card has been expired! <br>";
}

//IF NO ERRORS
if (empty($errors)) { 
//Add to user history
	include 'bdConnect.php';  
	$dbname = 'users';
	$id = $_SESSION['id'];
	$tableName = 'usersforsushi';
	$conn = new mysqli($servername, $username, $serverpassword , $dbname); 
	$history = '<div class="history">'.date("l jS \of F Y h:i:s A") . "<br> TOTAL SUMM:" . $_SESSION['totalSumm'].'</div>';
	$sql = "UPDATE $tableName SET history=CONCAT( history, '$history')  where id = '$id'";
	$result = $conn->query($sql);
	mysqli_close($conn);

//send message to restorant  about new order
	$headers = "MIME-Version: 1.0" . "\r\n"; //Always set content-type when sending HTML email
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$message = '';
	for ( $i = 0; $i < sizeof($_SESSION['OrderList']); $i++) { 
		$message .= $_SESSION['OrderList'][$i];
	}
	$message .= '<BR>PHONE NUMBER:'. $cardPhone .'<BR> ADDRESS:'. $cardAddress .'<BR> Total summ:'. $_SESSION['totalSumm'];
	 mail("leonid.90@inbox.ru","New Order",$message , headers);

//unset whole order variables !
	unset($_SESSION['summ']) ;
	unset($_SESSION['totalSumm']); 
	unset($_SESSION['OrderList']);
	unset($_SESSION['i']);
	exit;
}

//IF ERRORS !
else {
	$errors = json_encode($errors);
	echo $errors;	
}
?>