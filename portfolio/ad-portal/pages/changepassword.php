<?php 
session_start();
//GET INPUT FIELD VALUE 
include 'bdConnect.php'; 
$dbname = "users";
$conn = new mysqli($servername, $username, $serverpassword, $dbname); 
$oldPassword = htmlspecialchars($_POST['oldPassword']); 
$newPassword = htmlspecialchars($_POST['newPassword']);
$Rnewpassword = htmlspecialchars($_POST['Rnewpassword']);
$id = htmlspecialchars($_SESSION['id']); 

//CHECK ERRORS
if (!preg_match("/^[a-zA-Z0-9]*$/",$oldPassword) OR !preg_match("/^[a-zA-Z0-9]*$/",$newPassword)) {
	$errors[] = "Only letters , numbers and space allowed! <br>"; 	
}

if (strlen($newPassword) < 4) {
	$errors[] = 'Your new password is too short need 4 or more character <br>';
}

if ($newPassword != $Rnewpassword) {
	$errors[] = 'New passwords do not match <br>';	 
}
 
//CHECK OLD PASSWORD IS CORRECT
$sql = "SELECT password FROM usersforadportal WHERE id = $id";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if (md5($oldPassword) != $row['password']) {
	$errors[] = 'Old password is incorrect! <br>';
}

//IF NO ERRORS - CHANGE PASSWORD !
if (empty($errors)) { 
	$newPassword = md5($newPassword); 
	$sql = "UPDATE usersforadportal SET password = '$newPassword' WHERE id = $id";
	$conn->query($sql);
	mysqli_close($conn);
	exit;
}

//ELSE RETURN ERRORS
else {
 	$errors = json_encode($errors);
	echo $errors;
} 
?>