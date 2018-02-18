<?php session_start(); 
$login = trim($_POST['login']," "); 
$login = htmlspecialchars($login);
$password = htmlspecialchars($_POST['password']);
$Rpassword = htmlspecialchars($_POST['Rpassword']);
$mail = trim($_POST['email']," ");
$mail = htmlspecialchars($mail);

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
	

include 'bdConnect.php';  
$dbname = "users";
$conn = new mysqli($servername, $username, $serverpassword, $dbname);  
//проверяем существет ли такой логин или эмаил в базе данных
$sql = "SELECT login, email  FROM usersforsushi";
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


if (empty($errors)) { 
	$password = md5($password);
	$sql = "INSERT INTO usersforsushi (login, password, email) 
	VALUES ('$login' ,'$password' ,'$mail')";
	$conn->query($sql); 
    $_SESSION['login'] = $login; 
	$_SESSION['id'] = $conn->insert_id;
	exit;
}

 else {
 	$errors = json_encode($errors);
	echo $errors;
 }

?>