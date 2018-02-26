<?php
session_start();

//GET INPUT FIELDS VALUE
$address = htmlspecialchars($_POST['address']);
$number = htmlspecialchars($_POST['phone']);

//CHECK ON ERRORS
if (trim($address) == '' OR trim($number) == '') {
	$errors[] = "Fill  all fields please! <br>";
}

if (!is_numeric($number)) {
	$errors[] = 'Incorrect phone number <br>';
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
	$message .= '<BR>PHONE NUMBER:'. $number .'<BR> ADDRESS:'. $address .'<BR> Total summ:'. $_SESSION['totalSumm'];
	mail("leonid.90@inbox.ru","New Order",$message , headers);

//unset whole order variables !
	unset($_SESSION['summ']) ;
	unset($_SESSION['totalSumm']); 
	unset($_SESSION['OrderList']);
	unset($_SESSION['i']);
	exit;
}

//IF ERRORS
else {
	$errors = json_encode($errors);
	echo $errors;	
}

?>