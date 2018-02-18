<div class="tittle">VACANCIES </div> 
 

<?php 
include 'bdConnect.php';  
$dbname = "jobs";
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  
$sql = "SELECT table_name FROM information_schema.tables where table_schema='$dbname'";
$result = $conn->query($sql);
$i=1;
while($row = $result->fetch_assoc()) {
   echo  ' <a  href="#lists/'.$row['table_name'].'/jobs"><li><span class="badge">'.$i.'</span>  '.strtoupper($row['table_name']).'</li> </a> ';
    $i++;
}
$conn->close();



?>
 <div class="tittleEnd"> </div>
<!-- active collor in case of reload or first visit -->
<script type="text/javascript">
	activeColor('.vacancies')
</script>