 
<div  class="ImgPopUp">
  <!--  вызывает функцию back() -->
  <div id="backButton"   >
  <img class="img-responsive , imgBackButton" src="img/prev.png">
  </div>

  <!--  вызывает функцию next() -->
  <div id="nextButton">
  <img   class="img-responsive , imgNextButton"  src="img/next.png">
  </div>

  <div  class="ImgPreviewWrapper">
    <div  style="text-align: right;"><!-- non block element inside block element to avoid that whole line call the function   -->
      <span class="x-button"  onclick="PopUpHide()">X</span>
    </div> 
    <div class="ImgPreview"></div>  <!-- main content for images     -->
  </div>
</div>


<script type="text/javascript">
//Функция отображения PopUp берет название изображение из базы данных row[img1] row[img2] row[img3] row[img4]
function ShowImgPreview(firstImg ,secondImg,thirdImg,fourthImg){
  $(".ImgPopUp").show(250);
  $(".ImgPreview").html('<img class="img-responsive" width="70%" src="img/'+firstImg+'">'); //показывает первую картинку если нажата 2 картинка то first img =   second img from db

  //при нажатие на стрелку next
  var i = 0;
  $("#nextButton").on("click", function(){
    var images = [firstImg, secondImg, thirdImg , fourthImg]; // создаем массив для перебора
    i++; // при очередном вызови функции next счетчик ++ что бы показать next foto
    if (i > 3) {i = 0 }; // когда счетчик достигает последней фото то есть 4 то он сбрасывается на 0 тоесть первое фото
    $(".ImgPreview").html('<img class="img-responsive" width="70%" src="img/'+ images[i] +'">');
  })

  // при нажатие на стрелку back
  $("#backButton").on("click", function(){ 
    var images = [firstImg, secondImg, thirdImg , fourthImg];
    i--;
    if (i < 0) {i = 3 };
    $(".ImgPreview").html('<img class="img-responsive" width="70%" src="img/'+ images[i] +'">');
  });
}
 
function PopUpHide(){
  $(".ImgPopUp").hide(250);
}

$(document).keyup(function(e) {
  if (e.keyCode === 27) $('.ImgPopUp').hide(250);   // esc
});

</script>


