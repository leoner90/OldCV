<?php
/*при клике отсылает имена всех 4 картинок в функцию PopUpShow переменная должна быть c кавычками для это используется экранирование \ в следущих вызовах функции первая переменая будет img2 а не img1  что бы отображалась именна та фотка на которую ты кликнул и сотвественно next foto будет img3*/
include 'bdConnect.php';
$dbname = "sushi";
$conn = new mysqli($servername, $username, $serverpassword, $dbname); //connect to db susi

 
//выбираем из таблицы menu значения img1 img 2 etc.
$sql = "SELECT * FROM menu"; 
$result = $conn->query($sql); //  создаем массив result со значениями img1 img 2 etc.  result

$i = 0;
while($row = $result->fetch_assoc()) { // создаем массив row со значениями img1 img 2 etc.  row[0] = value of img1 from db
?>
<table class="table , table-bordered" style=" word-break: break-all; ">
   <tbody>
    <tr >      
      <td rowspan="3" class="col-sm-2" onclick="ShowImgPreview<?php echo '(\''.$row["img1"]. '\',\''.$row["img2"]. '\',\''.$row["img3"]. '\',\''.$row["img4"].'\')'?>"  >
        <img class="img-responsive" src=img/<?php echo $row["img1"] ?> >Click to Resize
      </td>

      <td class="col-sm-1" onclick="ShowImgPreview<?php echo '(\''.$row["img2"]. '\',\''.$row["img3"]. '\',\''.$row["img4"]. '\',\''.$row["img1"].'\')'?>">
        <img class="img-responsive" src=img/<?php echo $row["img2"] ?> > 
      </td>

      <td rowspan="3" class="col-sm-4">
        <p style="border-bottom:1px solid #fff;"><?php echo $row["name"] ?></p>
        <?php echo $row["description"]?>
      </td>

      <td rowspan="3" class="col-sm-3"   style="vertical-align:bottom;">
         <p style="width:100%; background-color:#333; margin:0; padding:10px;text-align:center;">PRICE: <?php echo $row["price"]?> &#163; </p>
       <input class="inputik" type="number"   value="1" max="10" min="1" style="color:red; width:100%;"> 
       <button style="width:100%; border-radius:0;"  onclick="buy<?php echo '(\''.$row["id"].'\',\''.$i. '\' )'?>"   class="btn , btn-danger">Add to bascket</button> <div class="AddToBascketMsg" >ADDED TO BASKET !</div> 
      </td>
    </tr>

    <tr> 
      <td class="col-sm-1" onclick="ShowImgPreview<?php echo '(\''.$row["img3"]. '\',\''.$row["img4"]. '\',\''.$row["img1"]. '\',\''.$row["img2"].'\')'?> "    ">
        <img class="img-responsive" src=img/<?php echo $row["img3"]?> > 
       </td>
    </tr>

    <tr> 
      <td class="col-sm-1" onclick="ShowImgPreview <?php echo '(\''.$row["img4"]. '\',\''.$row["img1"]. '\',\''.$row["img2"]. '\',\''.$row["img3"].'\')'?>"  "> 
        <img class="img-responsive" src=img/<?php echo $row["img4"]?> > 
      </td>
    </tr>

  </tbody>
</table>
<?php
$i++;
} 
?>

 <?php include 'imagePreview.php'; ?>
 


<script type="text/javascript">
  
//добавление в корзину
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


