<?php 
session_start();
$userName = $_POST['login'];

//Get variables send by click on button and connect to db
include 'bdConnect.php';
$dbname = $_POST['db'];
$tableName = $_POST['table'];
$id = $_POST['id'];
$conn = new mysqli($servername, $username, $serverpassword , $dbname);
$sql = "SELECT user_name  FROM $tableName WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//Check is user authorized to delete this or not (Login == login who made ad)
if ($row['user_name'] == md5($_SESSION['login'])) {
	//If Ok Delete Advert
	$sql = "DELETE  FROM $tableName WHERE id='$id'";
	$conn->query($sql);
	$conn->close();

	//Delete ad from user history
	$userId = $_SESSION['id'];
	$conn = new mysqli($servername, $username, $serverpassword , 'users');
	$sql = "SELECT history  FROM usersforadportal WHERE id='$userId'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$string = $row['history'];
	$replace = "";
	$search = "/$id(.*?)%/"; 
	$string = preg_replace($search,$replace,$string);
	$sql = "UPDATE usersforadportal SET history='$string' WHERE id = '$userId'";
	$conn->query($sql);
	$conn->close();
	exit;
}
//if try to delete other user ad by sending wrong information
else { 
	$errors = json_encode('ERROR:You are not authorized to do this!');
	echo $errors;
}
?>