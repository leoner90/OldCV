<?php 
//return table with information from the database in accordance with the received db name and table name 
include 'bdConnect.php'; 
$tablename = strtolower($_POST['tableName']);
$dbname = $_POST['dbname'];
$conn = new mysqli($servername, $username, $serverpassword, $dbname); 
$sql = "SELECT tittle , img ,id ,price  FROM $tablename"; 
$result = $conn->query($sql); 
$i = 0;
while($row = $result->fetch_assoc()) { 
  $myArr[] = ' 
  <table class="table , table-responsive" style="word-break: break-all;">
  <tbody>
    <tr class="table-row" onclick="location.href=\'#lists/'.$tablename.'/'.$dbname.'/adObserve/id='.$row['id'].'\'">
      <td class="col-xs-2"> <img class="img-responsive , table-img" src="img/'.$row['img'].'"> </td>
      <td class="col-xs-7 , table-text"> <span class="text">'.$row['tittle'].'</span></td>
      <td class="col-xs-3 , table-price"> <span class="text"> '.$row['price'].' &#163</span></td>
    </tr>
  </tbody>
 </table>';
}

$myJSON = json_encode($myArr);
echo $myJSON;

?>

