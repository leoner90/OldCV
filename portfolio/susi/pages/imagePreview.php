<!-- POP UP FOR IMAGE PREVIEW -->
<div  class="ImgPopUp">
  <!--  ONCLICK CALL FUNCTION BACK() TO CHANGE IMG INSIDE POP UP AT PREVIOUS-->
  <div id="backButton"   >
    <img class="img-responsive , imgBackButton" src="img/prev.png">
  </div>

  <!--  ONCLICK CALL FUNCTION NEXT() O CHANGE IMG INSIDE POP UP AT NEXT-->
  <div id="nextButton">
    <img   class="img-responsive , imgNextButton"  src="img/next.png">
  </div>

  <div  class="ImgPreviewWrapper">
    <!-- non block element inside block element to avoid that whole line call the function   -->
    <div  style="text-align: right;">
      <span class="x-button"  onclick="PopUpHide()">X</span>
    </div> 
    <div class="ImgPreview"><!-- main content for images --></div>  
  </div>
</div>

<script type="text/javascript">
//FUNCTION LOAD IMAGES INTO POP UP WHERE firstImg IS row[img1]  FROM DB , secondImg is row[img2] from db etc.
function ShowImgPreview(firstImg ,secondImg,thirdImg,fourthImg){
  $(".ImgPopUp").show(250);
  $(".ImgPreview").html('<img class="img-responsive" width="70%" src="img/'+firstImg+'">'); 

  //onclick next button
  var i = 0;
  $("#nextButton").on("click", function(){
    var images = [firstImg, secondImg, thirdImg , fourthImg]; // create an array for busting
    i++; //counter to show next photo
    if (i > 3) {i = 0 }; // when counter is 4 then reset it to 0 , because we have only 4 photos
    $(".ImgPreview").html('<img class="img-responsive" width="70%" src="img/'+ images[i] +'">');
  })

  //onclick  back button
  $("#backButton").on("click", function(){ 
    var images = [firstImg, secondImg, thirdImg , fourthImg];
    i--; //counter to show previus photo
    if (i < 0) {i = 3 }; //when counter is -1 then reset it to 3 , because we have only 4 photos
    $(".ImgPreview").html('<img class="img-responsive" width="70%" src="img/'+ images[i] +'">');
  });
}

// function hide pop up on X button onclick
function PopUpHide(){
  $(".ImgPopUp").hide(250);
}

//Hide pop up on ESC button
$(document).keyup(function(e) {
  if (e.keyCode === 27) $('.ImgPopUp').hide(250);
});

</script>


