<?php 
session_start();
if (isset($_SESSION['login'])) {
include 'bdConnect.php';  
$dbname = "users";
$id = $_SESSION['id'];
$conn = new mysqli($servername, $username, $serverpassword , $dbname);
$sql = "SELECT * FROM usersforsushi where '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ; 

if ($_SESSION['login'] ==  $row['login']) {
	echo '
	<table class="table , table-bordered" style=" min-height: 100px; word-break: break-all;">
		<thead>
			<tr>
				<th colspan="2" style="text-align: center;">INFO</th>
			</tr>
		</thead>
		<tbody>
			<tr style="padding:5px;">
				<td > Your login</td>
				<td class="text-center"> '.strtoupper($row['login']).'</td>
			</tr>

			<tr>
				<td> Your e-mail</td>
				<td class="text-center"> '.strtoupper($row['email']).'</td>
			</tr>

			<tr>
				<td>Set new password</td>
				<td><button onclick="PopUpS(\'pages/passwordChange.php\')" class="btn btn-danger btn-sm" style="width:100%;">Change password </button></td>
			</tr>   
		</tbody>
	</table>

	<div class="panel panel-primary">
		<div   class="panel-heading" data-toggle="collapse" data-target="#demo">Order history</div>
		<div id="demo"  class="collapse , panel-body" style="color:red;"> 
			'.$row['history'].'
		</div>
	</div> ';
} 		 			 	  		
} 
 
else {
	  echo '<script>  location.hash = "#main";</script>';
 }
?>

 

 