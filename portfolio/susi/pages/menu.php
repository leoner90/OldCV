<?php
//CONNECT TO DB
include 'bdConnect.php';
$dbname = "sushi";
$conn = new mysqli($servername, $username, $serverpassword, $dbname); 
$sql = "SELECT * FROM menu"; 
$result = $conn->query($sql); 
$i = 0;
while($row = $result->fetch_assoc()) { 
?>

<!-- CREATE tABLE WITH INFORMATION (IMG, TEXT) FROM DB AND ONCLICK ON IMG - SEND IMG PATCH FROM DB TO ImagePrewie.PHP  
ONCLICK ON BUTTON SEND INFO TO orderphp.php -->
<table class="table , table-bordered" style=" word-break: break-all; ">
   <tbody>
    <tr >      
      <td style="vertical-align: middle; cursor: pointer;"  rowspan="3" class="col-xs-2" onclick="ShowImgPreview<?php echo '(\''.$row["img1"]. '\',\''.$row["img2"]. '\',\''.$row["img3"]. '\',\''.$row["img4"].'\')'?>">
        <img class="img-responsive" src=img/<?php echo $row["img1"] ?> > <p class="text-center">Click <br>to Resize</p>
      </td>

      <td style="vertical-align: middle; cursor: pointer;"  class="col-sm-1" onclick="ShowImgPreview<?php echo '(\''.$row["img2"]. '\',\''.$row["img3"]. '\',\''.$row["img4"]. '\',\''.$row["img1"].'\')'?>">
        <img class="img-responsive" src=img/<?php echo $row["img2"] ?> > 
      </td>

      <td rowspan="3" class="col-xs-4" ">
        <p class="sushi-name" ><?php echo $row["name"] ?></p>
        <?php echo $row["description"]?>
      </td>

      <td rowspan="3" class="col-xs-3"   style="vertical-align:bottom;">
        <p style="width:100%; background-color:#333; margin:0; padding:10px;text-align:center;">PRICE: <?php echo $row["price"]?> &#163; </p>
        <input class="inputik" type="number"   value="1" max="10" min="1" style="color:red; width:100%;"> 
        <button style="width:100%; border-radius:0;"  onclick="buy<?php echo '(\''.$row["id"].'\',\''.$i. '\' )'?>"   class="btn , btn-danger">Add to bascket</button> <div class="AddToBascketMsg" >ADDED TO BASKET !</div> 
      </td>
    </tr>

    <tr> 
      <td style="vertical-align: middle; cursor: pointer;"  class="col-xs-1" onclick="ShowImgPreview<?php echo '(\''.$row["img3"]. '\',\''.$row["img4"]. '\',\''.$row["img1"]. '\',\''.$row["img2"].'\')'?> "    ">
        <img class="img-responsive" src=img/<?php echo $row["img3"]?> > 
      </td>
    </tr>

    <tr> 
      <td  style="vertical-align: middle; cursor: pointer;" class="col-xs-1" onclick="ShowImgPreview <?php echo '(\''.$row["img4"]. '\',\''.$row["img1"]. '\',\''.$row["img2"]. '\',\''.$row["img3"].'\')'?>"  "> 
        <img class="img-responsive" src=img/<?php echo $row["img4"]?> > 
      </td>
    </tr>

  </tbody>
</table>
<?php
$i++;
} 
?>

<!-- IMAGE SLIDER  -->
 <?php include 'imagePreview.php'; ?> 
 
<!-- ADD ORDER TO BACKET -->
<script type="text/javascript">
function buy(id, index) {   
  var quantity = $('.inputik')[index].value; // get input value (quantity)
  $.post("pages/orderphp.php",{id: id , quantity:quantity },function(data){  
    var result =  JSON.parse(data);//return tottal price
    $("#totalSumm").html(result); // reload bascet
    $('.AddToBascketMsg').eq(index).slideDown(500).delay(1500).slideUp(500);
    $('.inputik')[index].value = 1;
  }); // send to server
} 
</script>