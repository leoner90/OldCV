<?php 
include 'bdConnect.php';  
$dbname = $_POST['dbname'];
$id = $_POST['id'];
$tableName = $_POST['tableName'];
$conn = new mysqli($servername, $username, $serverpassword , $dbname);  

$sql = "SELECT * FROM $tableName where id= '$id'";
  
$result = $conn->query($sql);

$row = $result->fetch_assoc() ; 
$imagesCounter ='';
$Indicators ='';
     
$i = 2; // get from db img2 img3 img4

while (isset($row['img'.$i]  ) AND $row['img'.$i] !==''   )  { 
  $imagesCounter = $imagesCounter  .'<div class="item">
      <img src="pages/'.$row['img'.$i].'" alt="'.$i.'" style="width:100%; height: 400px;">
    </div> ';
  $Indicators = $Indicators . '<li data-target=".myCarousel" data-slide-to="'.($i-1).'"></li>';
 
  $i++;
}



$myArr[] = ' <div  class="adobserve-row-tittle" >'.$row['tittle'].'</div>
<div class="myCarousel , carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target=".myCarousel" data-slide-to="0" class="active"></li>
    '. $Indicators.'
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="pages/'.$row['img'].'" alt="1" style="width:100%; height: 400px;"> 
    </div>
 '.$imagesCounter.'

   </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href=".myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href=".myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br>
<div  class="adobserve-row-text" style="width:100%; white-space:pre-wrap;">'.$row['text'].'</div><br><br>
 
 <div  class="adobserve-row-price" > PRICE:  '.$row['price'].' &#163 </div>

 <br><br><div  class="adobserve-row-phone"> Phone Number: '.$row['phone'].'</div>';      
  
 


$myJSON = json_encode($myArr);
echo $myJSON;



?>



