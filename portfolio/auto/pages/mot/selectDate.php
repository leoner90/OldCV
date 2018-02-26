<?php
//return <options>  for  <select> with  selected month days  (depending of day count in this month)
$month = htmlspecialchars($_POST['month']);
$number = cal_days_in_month(CAL_GREGORIAN,  $month , date("Y"));

//if selected current month then date will starts from todays date
if ($month == date("n")) {
	$i = date("j") ; 
}

//if selected next month then date will starts from 1 date
else {
	$i = 1 ;
}

//return <options>  for  <select> with  selected month days
for ($i  ; $i <= $number ; $i++) {
	$DayOfbookingDate = date("l", mktime(0, 0, 0, $month, $i, date('Y')));
	if ($DayOfbookingDate !== 'Saturday' AND $DayOfbookingDate !== 'Sunday') {
		$selectdate[] = '<option value="'.$i.'">'.$i.'</option>';
	}	
}
$selectdate = json_encode($selectdate);
echo $selectdate; 


?>
