 <?php session_start();

//GET INPUT FIELD VALUE AND CONNECT & SELECT INFO FROM DB
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

//Iterator
if (!isset($_SESSION['i'])){
	$_SESSION['i'] = 0; 
}

//variable for total summ 
if (!isset($_SESSION['totalSumm'])){
	$_SESSION['totalSumm'] = 0; 
}

//make every price summ as array - so that you can delete  exactly what you need 
$_SESSION['summ'][$_SESSION['i']] = $price *  $quantity;
$_SESSION['totalSumm'] = $_SESSION['totalSumm'] + $_SESSION['summ'][$_SESSION['i']] ;

//Create main table to display in order bascet
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

//increase the iterator for correct next add to bascet
$_SESSION['i']++;

//return total summ  to display price in order backet in main menu!
$totalSumm = json_encode($_SESSION['totalSumm']);
echo $totalSumm;
?>
 

 
 
