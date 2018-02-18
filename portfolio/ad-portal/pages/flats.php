 
 <div class="tittle"> DISTRICTS </div> 
<?php 
include 'bdConnect.php';  
$dbname = "alldistricts";
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT table_name FROM information_schema.tables where table_schema='$dbname'";
$result = $conn->query($sql);
$i=1;
while($row = $result->fetch_assoc()) {
    echo  '<a  href="#lists/'.$row['table_name'].'/alldistricts"> <li><span class="badge">'.$i.'</span> '. strtoupper($row['table_name']).' </li> </a>';


    $i++;
}
$conn->close();



?>

  <div class="tittleEnd"> </div>
<script type="text/javascript">

activeColor('.flats')

</script>