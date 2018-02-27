<?php 
//Specifies the selection section in the submission of ads!
include 'bdConnect.php'; 
//if need select cars model return option list for select with car models
if (isset($_POST['partition2']) ) { 
	$dbname =  strtolower($_POST['partition2']); 
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT table_name FROM information_schema.tables where table_schema='$dbname'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$districts[] = '<option value="'.$row['table_name'].'">'. strtoupper($row['table_name']) .'</option>' ;
	}  
} 

//Return option list for select with Districts or vacansies
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