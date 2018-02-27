<?php session_start();

//ADVERT MAKER BY SELECTS(OPTIONS) AND FIELDS 
if (isset($_SESSION['login'] )) {
  echo '
  <div class="tittle">POST AN AD </div>
  <div id="errors" style="color: red;"></div>
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
     <textarea maxlength="90" id="tittle"  class="form-control"  name="tittle" rows="1"   placeholder="Advert tittle max. 100 symbols" style="resize: none; overflow:hidden " >
     </textarea>
     <br>
      <textarea maxlength="1900" id="text"  class="form-control"  name="text" rows="10"   placeholder="Advert text max. 2000 symbols" style="resize: none; overflow:hidden " >
      </textarea>
      <br>
      <input id="price" name="price" class="form-control"  type="number"    placeholder="Enter price " >
      <br>
      <input id="phone" name="phone" class="form-control"  type="number"    placeholder="Phone number" >
      <br>

      <div class="checkbox">
        <label><input type="checkbox" id="no-images" name="no-images"   onclick="noImg();">NO IMAGES NEED!</label>
      </div>
      <div id="img-container">
        <img class="img-responsive" id="image" src="#"  alt="Select Image"  style="height: 150px; width:35%;"> 
        <input id="file"  type="file"   name="userImage"  style="display: block;" onchange="SetPicturePreview(this ,\'#image\' )"> 

        <img class="img-responsive" id="image2" src="#"  alt="Select Image"  style="height: 150px; width:35%;"> 
        <input id="file2" type="file"  name="userImage2" style="display: block;" onchange="SetPicturePreview(this ,\'#image2\' )">  

        <img class="img-responsive" id="image3" src="#"  alt="Select Image"  style="height: 150px; width:35%;"> 
        <input id="file3" type="file"  name="userImage3" style="display: block;" onchange="SetPicturePreview(this ,\'#image3\' )">    

        <img class="img-responsive" id="image4" src="#"  alt="Select Image"  style="height: 150px; width:35%;"> 
        <input id="file4" type="file"  name="userImage4" style="display: block;" onchange="SetPicturePreview(this ,\'#image4\' )">     
        *image size should be in 1 mb range
      </div>
      <br><br>
      <button type="button" class="btn , btn-success , btn-lg , btn-block" onclick="SendData()">POST ADVERT!</button>
    </div>
  </form>';
}
//IF NOT LOGGED IN REDIRECT TO MAIN PAGE
else {
  echo '<script> location.hash = "#main";</script>';
}
?>

<script type="text/javascript">
//IF USER SELECT NO IMAGES NEED 
function noImg() {
  $('#img-container').toggle();
  EqualHeight();
}

//ON PARTITION CHANGE - UNSET PREVIOUS SELECTED VALUES
function unset(){
  $(' #file , #file2, #file3, #file4 , #text , #price , #phone , #tittle').val("") ; 
  $(' #image , #image2, #image3, #image4').hide();
}

//IF FIRST SELECT HAS BEEN CHANGED
$('#partition').change(function() {
  $('#partition2 , #partition3 , #InfoField ').hide(); //HIDE ON CHANGE FIRS PARTITION
  $('#partition3').val("");
  unset();
  var partition = $(this).val();
  $.post("pages/SelectPartition.php",{partition:partition  },function(data){
      var list = JSON.parse(data) ;
      $('#partition2').show();
      $('#partition2').html('<option disabled selected> Choose a section</option>' + list); 
  })
})

//IF SECOND SELECT HAS BEEN CHANGED
$('#partition2').change(function() {
  $('#partition3').val("");
  unset();
  var partition = $('#partition').val();
  var partition2 = $(this).val();
  //IF FIRST SELECT HAS BEEN CAR THEN OPEN THIRD SELECT WITH CAR MODELS
  if  (partition == 'car-models') {    
    $.post("pages/SelectPartition.php",{partition:partition , partition2:partition2  },function(data){
       var list = JSON.parse(data) ;
       $('#partition3').show();
       $('#partition3').html('<option disabled selected>Choose a section</option>' + list); 
    })
  }

  // IF FIRST SELECT  NOT CARS - DISPLAY INFO FIELDS
  else {
     $('#InfoField').css("display" , "block");   
     EqualHeight();
  }       
})

// // IF THIRD SELECT SELECT (ONLY IF CARS)  DISPLAY INFO FIELDS
$('#partition3').change(function() {
  unset();
  $('#InfoField').css("display" , "block");
  EqualHeight();
})

// IMAGE PREVIEW FUNCTION
function SetPicturePreview(input , id) {
  var reader2 = new FileReader(); // READ FILES FROM USER PC
  reader2.onload = function(result) { 
    $(id).show();
    $(id).attr('src', result.target.result);
    EqualHeight();
  }
  reader2.readAsDataURL(input.files[0]); 
}

//SEND DATA TO SERVER - CHECK ERRORS AND IF NO ERRORS WRITE TO DB AND DOWNLOAD FILES
function SendData() {
  event.preventDefault();
  var form =  new FormData($('#uploadForm')[0]);
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
            $('#errors').html('<h1 style="color:green;">Your ad has been successfully added</h1').delay(4000).hide(500); 
        }
        else { 
            $('#errors').show();// if was hiden
            var result = JSON.parse(result);
            $('#errors').html(result); 
            $(window).scrollTop(0);
            EqualHeight();
        }            
      }      
  })    
}

//LINK ACTIVE COLOR 
activeColor('.adMaker');     
</script>