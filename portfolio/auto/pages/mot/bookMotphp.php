<?php
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phoneNum']);
$regNumber = htmlspecialchars($_POST['regNumber']);
$month = htmlspecialchars($_POST['month']);
$date = htmlspecialchars($_POST['date']);
$time = htmlspecialchars($_POST['time']);

//defense - if changed in browser  time "value" (inspect element)
if ($time < 8 OR $time > 17 OR !is_numeric($time)) {
	$errors[] = 'Incorrect time! <br> we work  Monday - Friday  / 9 - 18';
}


//defense - if changed in browser date "value" (inspect element)
$DayOfbookingDate = date("l", mktime(0, 0, 0, $month, $date, date('Y')));

if ( $DayOfbookingDate == 'Saturday' OR $DayOfbookingDate == 'Sunday'  OR !is_numeric($date)) {
	$errors[] = 'Incorrect Date! <br> we work  Monday - Friday  / 9 - 18';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
	$errors[] = 'E-mail is incorrect !! <br>';
}

if (!is_numeric($phone)) {
	$errors[] = 'Incorrect phone number <br>';
}

if  (trim($regNumber) == '' OR trim($month) == '' OR trim($date) == ''  OR trim($time) == '' ){
	$errors[] = 'Fill all fields !! <br>';
}

/*connect to DB 
TABLENAME ARRAY - IF $MONTH = 2 THEN TAKE THIRD INDEX OF ARRAY WITCH IS FEBRUARY  
WHOLE TIME = CAR FIX OPENS IN 8 AND WORK TILL 17 )*/
$tableName  = array('','january', 'february' ,'march', 'april' , 'may' , 'june' , 'julay' ,'august' , 'september' , 'october' , 'november' , 'december'  );
$wholeTimes  = array('8' ,'9','10', '11' ,'12', '13' , '14' , '15' , '16' ,'17');
include '../bdConnect.php';  
$dbname = 'gettimelist';
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  


////check of booked timed in DB in case IF value of select option was  changed in browser
$sql = "SELECT time  FROM $tableName[$month] where date = '$date'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$array  = explode("/",$row['time']);

for ($i=0; $i  < sizeof($array); $i++) { 
	  if ($time == $array[$i]) {
	  	$errors[] = 'Sorry this time is already booked!! <br>';
	  }
}


//update booked time in DB and send mail to carfix and user  about new booking + update booked time in DB
if (empty($errors)) { 
	$sql = "UPDATE $tableName[$month] SET time=CONCAT_WS('/' ,time, '$time'  )  where date = '$date'";
	$conn->query($sql);
	$message = '<br> Phone number: ' . $phone . '<br> Email addres: ' . $email .'<br> Car registration Number: ' . $regNumber.'<br>DATE: '.$date.' '.$tableName[$month].'<br>TIME: '.$time.' : 00';
	mail("leonid.90@inbox.ru", "New M.o.t request" ,$message );
	mail($email, "Your M.o.t." ,$message ); // send mail to user
	exit;
}

else {
	$errors = json_encode($errors);
	echo $errors; 
}
?>

 