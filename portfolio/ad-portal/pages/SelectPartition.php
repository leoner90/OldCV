<?php 
//задает выбор раздел в подаче объявлений!
include 'bdConnect.php'; 


if (isset($_POST['partition2']) ) { //if need select cars model

	$dbname =  strtolower($_POST['partition']); 
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT table_name FROM information_schema.tables where table_schema='$dbname'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$districts[] = '<option value="'.$row['table_name'].'">'. strtoupper($row['table_name']) .'</option>' ;
	}

    
} 



else {
 	$dbname =  $_POST['partition']; 
 	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT table_name FROM information_schema.tables where table_schema='$dbname'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$districts[] = '<option value="'.$row['table_name'].'">'.strtoupper($row['table_name']) .'</option>' ;
	}
 
}
	$districts = json_encode($districts);
	echo $districts;

?>


