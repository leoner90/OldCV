<?php 
//recive bd name from models.php and return links withs table names from db (car models)
include 'bdConnect.php';  
$dbname = strtolower($_POST['dbname']);
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT table_name FROM information_schema.tables where table_schema='$dbname'";
$result = $conn->query($sql);
$i=1;
while($row = $result->fetch_assoc()) {
    $myArr[] = '<a  href="#lists/'.$row['table_name'].'/'.$dbname.'"><li><span class="badge">'.$i.'</span> '. strtoupper($row['table_name']).' </li> </a>';
    $i++;
}
$conn->close();

$myJSON = json_encode($myArr);
echo $myJSON;

?>