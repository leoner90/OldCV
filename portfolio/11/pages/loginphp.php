<?php
session_start();
$login = trim($_POST['login']," ");
$login = htmlspecialchars($login);
$login = stripslashes($login);
$passwords = $_POST['password'];
$passwords = htmlspecialchars($passwords);
$passwords = stripslashes($passwords);
	
if (!preg_match("/^[a-zA-Z0-9]*$/",$login) OR !preg_match("/^[a-zA-Z0-9]*$/",$passwords)) {
	$errors[] = 'Only letters , numbers and space allowed! <br>';	
}

else {
	include 'bdConnect.php';  
	$dbname = "users";
	$passwords = md5($passwords);
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT *  FROM usersforsushi";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {  	
		if ($row['login'] == $login and  $row['password'] == $passwords )  {
			 $_SESSION['login'] = $row['login'] ;		
			 $_SESSION['id'] = $row['id'] ;
			break;		   		  	
		}
	} 
}



if (!isset($_SESSION['login'] )) {
	$errors[] = 'Login or Password are incorrect!! <br>';
	$errors = json_encode($errors);
	echo $errors;
}
else {
	exit;
}
?> 

