<?php 
//вывод инфы из базы данных в соответсвии с районами
include 'bdConnect.php'; 
$tablename = strtolower($_POST['tableName']);
$dbname = $_POST['dbname'];
$conn = new mysqli($servername, $username, $serverpassword, $dbname); 

$sql = "SELECT tittle , img ,id ,price  FROM $tablename"; 
$result = $conn->query($sql); 
$i = 0;
while($row = $result->fetch_assoc()) { 
	$myArr[] = 
    '<a href="#lists/'.$tablename.'/'.$dbname.'/adObserve/id='.$row['id'].'" >
      <div class="row , table-row" >
        <div class="col-sm-3 "> 
          <img class="img-responsive ,  table-img " src="pages/'.$row['img'].'"> 
        </div>  
        <div class="col-sm-6 table-text">
          <span class="text">'.$row['tittle'].'</span>
        </div>
        <div class="col-sm-3 , table-price">
          <span class="text"> '.$row['price'].' &#163</span>
        </div>
      </div>
    </a>';
}


$myJSON = json_encode($myArr);
echo $myJSON;

?>

 