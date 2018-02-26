<?php
$month = htmlspecialchars($_POST['month']);
$date = htmlspecialchars($_POST['date']);
	
if ($month == date("n") AND $date == date("j") ) {  // if todays date
	if (date("H") >= 17) { //  and if time over 17 then return in select 'sorry we are closed now'!(work till 18)
		$selectdate = json_encode('<option value="0" disabled >Sorry we are closed today(work till 18)</option>');
		echo $selectdate; 
		exit; 
	}

	else {
		$startHour = date('H') - 8; //if we are still open then start hour for booking will be currently hour(-8 for wholeTimes array) 
	}
}

else {
	$startHour = 0; // if not todays date then start booking from 8 (opening hour)
}

//check in database - times  which  already booked
$tableName  = array('','january', 'february' ,'march', 'april' , 'may' , 'june' , 'julay' ,'august' , 'september' , 'october' , 'november' , 'december'  );
$wholeTimes  = array('8' ,'9','10', '11' ,'12', '13' , '14' , '15' , '16' ,'17');
include '../bdConnect.php';
$dbname = 'gettimelist';
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT time  FROM $tableName[$month] where date = '$date'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$array  = explode("/",$row['time']); //get all times from db in array

//if time is allready exist in database then empty this time from $wholeTimes array
for ($i=0; $i < sizeof($array) ; $i++) { 
 	for ($x=0; $x < sizeof($wholeTimes) ; $x++) { 
 		if ($wholeTimes[$x] == $array[$i]) {
 			$wholeTimes[$x] = '';
 		}
 	}
}
//insert in $selectdate array times  which are not booked + options for select - which will be returned back in bookmot.php
for ($startHour; $startHour < sizeof($wholeTimes) ; $startHour++) { 
	if ($wholeTimes[$startHour] != '') {
		$selectdate[] = '<option value="'.$wholeTimes[$startHour].'">'.$wholeTimes[$startHour].':00</option>'; 	
	}		
}

//if all times in this date are booked
if (empty($selectdate)) {
	$selectdate = '<option value="0" disabled>Sorry this day is fully booked </option>';
}

//return times & options for select back to bookmot.php
$selectdate = json_encode($selectdate);
echo $selectdate; 
exit;	 
	 
 
?>	
