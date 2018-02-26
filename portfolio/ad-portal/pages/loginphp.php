<?php
session_start();

//GET INPUT FIELD VALUE
$login = trim($_POST['login']," ");
$login = htmlspecialchars($login);
$login = stripslashes($login);
$passwords = $_POST['password'];
$passwords = htmlspecialchars($passwords);
$passwords = stripslashes($passwords);

//checks for banned characters	
if (!preg_match("/^[a-zA-Z0-9]*$/",$login) OR !preg_match("/^[a-zA-Z0-9]*$/",$passwords)) {
	$errors[] = 'Only letters , numbers and space allowed! <br>';	
}

//if user exist starts sesion login and id
else {
	include 'bdConnect.php';  
	$dbname = "users";
	$passwords = md5($passwords);
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT *  FROM usersforadportal";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {  	
		if ($row['login'] == $login and  $row['password'] == $passwords )  {
			 $_SESSION['login'] = $row['login'] ;		
			 $_SESSION['id'] = $row['id'] ;
			break;		   		  	
		}
	} 
}

//if not exist send back errors otherwise exit
if (!isset($_SESSION['login'] )) {
	$errors[] = 'Login or Password are incorrect!! <br>';
	$errors = json_encode($errors);
	echo $errors;
	exit;
}
else {
	exit;
}
?> 