<div class="tittle">POST AN AD </div>
<style type="text/css">
  #partition2 , #InfoField, #partition3 ,#image, #image2, #image3, #image4{
    display: none;
  }
</style>
<!-- Не забываем указывать enctype="multipart/form-data" для формы! А то потом долго будем гадать почему массив $_FILES пустой! -->
<?php 
session_start();
if (isset($_SESSION['login'] )) {
  echo '<div id="errors" style="color: red;"></div>
  <form  id="uploadForm" enctype="multipart/form-data">
    
    <div id="choose" class="col-sm-12" style="  margin-bottom: 10px;">
      <select class="form-control" name="partition" id="partition">
        <option disabled selected value="selected">Choose a section</option>
        <option value="alldistricts">PROPERTYS</option>
        <option value="car-models">CARS</option>
        <option value="jobs">JOB</option>
      </select>
    </div>

    <div class="col-sm-12" style="  margin-bottom: 10px;">
      <select class="form-control" name="partition2" id="partition2">
      </select>
    </div>

    <div class="col-sm-12" style="  margin-bottom: 10px;">
      <select class="form-control" name="partition3" id="partition3">
      </select>
    </div>

    <div id="InfoField" class="col-sm-12" style="  margin-bottom: 10px;">
     <textarea maxlength="100" id="tittle"  class="form-control"  name="tittle" rows="1"   placeholder="Advert tittle max. 100 symbols" style="resize: none; overflow:hidden " ></textarea>
     <br>
      <textarea maxlength="2000" id="text"  class="form-control"  name="text" rows="10"   placeholder="Advert text max. 2000 symbols" style="resize: none; overflow:hidden " ></textarea>
      <br>
      <input id="price" name="price" class="form-control"  type="number"    placeholder="Enter price " >
      <br>
      <input id="phone" name="phone" class="form-control"  type="number"    placeholder="Phone number" >

      <br>
      <img class="img-responsive" id="image" src="#"  alt="Select Image"  style="height: 150px;"> 
      <input id="file"  type="file"   name="userImage"  style="display: block;" onchange="SetPicturePreview(this ,\'#image\' )"> 

      <img class="img-responsive" id="image2" src="#"  alt="Select Image"  style="height: 150px;"> 
      <input id="file2" type="file"  name="userImage2" style="display: block;" onchange="SetPicturePreview(this ,\'#image2\' )">  

      <img class="img-responsive" id="image3" src="#"  alt="Select Image"  style="height: 150px;"> 
      <input id="file3" type="file"  name="userImage3" style="display: block;" onchange="SetPicturePreview(this ,\'#image3\' )">    

      <img class="img-responsive" id="image4" src="#"  alt="Select Image"  style="height: 150px;"> 
      <input id="file4" type="file"  name="userImage4" style="display: block;" onchange="SetPicturePreview(this ,\'#image4\' )">      
      <br> <br>
      <button type="button" class="btn , btn-success , btn-lg , btn-block" onclick="SendData()">POST ADVERT!</button>
    </div>
  </form>
  ';
}
else {
  echo '<script> 
   $("#content").load("pages/main.php") 
    location.hash = "#main";
  </script>';
}

?>


<script type="text/javascript">
function unset(){ // при смене раздела  делает Unset у Imputov и imagePrewie что бы убрать имя и картинку
  $(' #file , #file2, #file3, #file4 , #text , #price , #phone , #tittle').val("") ; 
  $(' #image , #image2, #image3, #image4').hide();

}



$('#partition').change(function() {
  $('#partition2 , #partition3 , #InfoField ').hide(); //при смене раздела прачит все остальные разделы
  unset();
  var partition = $(this).val(); // запоминает какой раздел выбран для дальнейшей обработки на сервере и возват нужного списка
  $.post("pages/SelectPartition.php",{partition:partition  },function(data){
      var list = JSON.parse(data) ; //записывает в list значение которые будут отображаться в РАЗДЕЛЕ 2
       $('#partition2').show();
       $('#partition2').html('<option disabled selected> Choose a section</option>' + list); 
  })
})



  $('#partition2').change(function() {
    unset();
    var partition = $(this).val();
    var partition2 = $('#partition').val();

    if  (partition2 == 'car-models') { //в случаи если выбраны раздел машины генерирует еще один подраздел с марками
        
      $.post("pages/SelectPartition.php",{partition:partition , partition2:partition2  },function(data){
        var list = JSON.parse(data) ;
         $('#partition3').show();
         $('#partition3').html('<option disabled selected>Choose a section</option>' + list); 
       })
    }

    else { // если же не машины то сразу выводит  выбор параметров объявления 
       $('#InfoField').css("display" , "block");   
    }
        
 })

  $('#partition3').change(function() {
    unset();
     $('#InfoField').css("display" , "block");
     })



// IMAGE PREVIEW

function SetPicturePreview(input , id) {
  var reader2 = new FileReader(); // fileReader позволяет веб-приложениям асинхронно читать содержимое файлов (или буферы данных), хранящиеся на компьютере пользователя
    reader2.onload = function(result) { 
      $(id).show();
      $(id).attr('src', result.target.result);
       EqualHeight();
    }
    reader2.readAsDataURL(input.files[0]); // Запускает процесс чтения данных указанного Blob, по завершении, аттрибут result будет содержать данные файла в виде data: URL.
 
}


//Отправка данных на сервер и из обработка на наличии ошибок так же запись в базу данных в случаи успеха
function SendData() {
  var form =  new FormData($('#uploadForm')[0]);
//send text and partitions

      $.ajax({
        url: "pages/adMakerphp.php",
        type: "POST",
        data:   form, //  передает объект , по сути всю форму 
        contentType: false,
        cache: false,
        processData:false,
         success: function(result){
          if (result == "") {
              $('#partition2 , #partition3 , #InfoField ').hide(); //при смене раздела прачит все остальные разделы
              unset();
              $("#choose select").val("selected"); // reset select
              $('#errors').show();//  if was hiden
              $(window).scrollTop(0);
              $('#errors').html('Your ad has been successfully added').delay(4000).hide(500); 


          }
          else {
              $('#errors').show();// if was hiden
              var result = JSON.parse(result);
              $('#errors').html(result); 
              $(window).scrollTop(0);
              EqualHeight();
          }
                    
         }
              
     });

       
}


 
activeColor('.adMaker');     
</script>


