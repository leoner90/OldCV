<!-- pop up start -->
<div  class="PopUp"  >
  <div  class="PopUpWrapper">
    <div style="text-align: right;"><span class="x-button"  onclick="PopUpH()">X</span></div> <!-- non block element inside block element to avoid that whole line call the function   -->
    <div class="PopUpContent"></div>       
  </div>
</div>


<script type="text/javascript">

function PopUpS(page){
    $(".PopUp").show(250);
    $('.PopUpContent').load(page);
}

function PopUpH(){
    $(".PopUp").hide(250);
}

$(document).keyup(function(e) {
  if (e.keyCode === 27) $('.PopUp').hide(250);   // esc
});

</script>