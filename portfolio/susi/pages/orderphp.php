 
<?php
session_start();
include 'bdConnect.php';  
$dbname = 'sushi';
$id = $_POST['id'];
$tableName = 'menu';
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT price , name FROM $tableName where id= '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ; 

$price = $row['price'];
$sushiName =  strtoupper($row['name']);
$quantity = $_POST['quantity'];

if (!isset($_SESSION['i'])){
	$_SESSION['i'] = 0; // итератор для записи в массив
}

if (!isset($_SESSION['totalSumm'])){
	$_SESSION['totalSumm'] = 0; 
}



//make every price summ as array to can delete afrter
$_SESSION['summ'][$_SESSION['i']] = $price *  $quantity;
$_SESSION['totalSumm'] = $_SESSION['totalSumm'] + $_SESSION['summ'][$_SESSION['i']] ;

$_SESSION['OrderList'][$_SESSION['i']] = 

 '<table class="table">
 	<thead>
 		<tr class="tittle-row">
 			<th class="col-sm-4">NAME</th>
 			<th class="col-sm-1">QUANTITY</th>
 			<th class="col-sm-1"></th>
 			<th class="col-sm-1">PRICE </th>
 			<th class="col-sm-1"></th>
 			<th class="col-sm-1">SUMM</th>
 			<th class="col-sm-3"></th>
 		</tr>
 	</thead>
 	<tbody>
		<tr class=" orderlist-row">
			<td > '.$sushiName.'</td>
			<td > '.$quantity.'</td>
			<td > x </td>
			<td > '.$price.'</td>
			<td > = </td>
			<td > '.$_SESSION['summ'][$_SESSION['i']].'</td>
			<td > <button class="del , btn , btn-danger" onclick="emptyy('.$_SESSION['i'].')"> X Delete this </button> </td>
		</tr>
	</tbody>
</table>';

 
$_SESSION['i']++;

$totalSumm = json_encode($_SESSION['totalSumm']);
echo $totalSumm;
?>
 

 
 
