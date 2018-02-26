<?php session_start(); 
//GET INPUT FIELDS
$login = trim($_POST['login']," "); 
$login = htmlspecialchars($login);
$password = htmlspecialchars($_POST['password']);
$Rpassword = htmlspecialchars($_POST['Rpassword']);
$mail = trim($_POST['email']," ");
$mail = htmlspecialchars($mail);

//ERRORS CHECK
if 	($login == '' OR  $mail == '' OR $password =='' OR $Rpassword == ''){
	$errors[] = 'Fill all fields !! <br>';
}

if (!preg_match("/^[a-zA-Z0-9]*$/",$login) OR !preg_match("/^[a-zA-Z0-9]*$/",$password)) {
  $errors[] = "Only letters , numbers and space allowed! <br>"; 
} 

if ($password != $Rpassword) {
	$errors[] = 'Passwords do not match <br>';	 
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL) ) {
    $errors[] = 'E-mail is incorrect !! <br>';
}

if (strlen($password) < 4) {
	$errors[] = 'Your   password is too short need 4 or more character  <br>';
}
	
//DB CONNECT
include 'bdConnect.php';  
$dbname = "users";
$conn = new mysqli($servername, $username, $serverpassword, $dbname);  

//Check if such login or email exists in the database IF YES RETURN ERROR
$sql = "SELECT login, email  FROM usersforadportal";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) { 
	if ($row['email'] == $mail )   {
		$errors[] = 'User with such an e-mail is already registered <br>';	
		break;	   		  	
	}	

	if ($row['login'] == $login )   {
		$errors[] = 'User with such login already exists <br>';	
		break;	   		  	
	}		 
} 

//IF NO ERRORS -> RESTER AND LOG IN USER !
if (empty($errors)) { 
	$password = md5($password);
	$sql = "INSERT INTO usersforadportal (login, password, email) 
	VALUES ('$login' ,'$password' ,'$mail')";
	$conn->query($sql); 
    $_SESSION['login'] = $login; 
	$_SESSION['id'] = $conn->insert_id;
	exit;
}

//IF ERRORS
else {
	$errors = json_encode($errors);
	echo $errors;
}
?>