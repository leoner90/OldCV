<!-- POP UP / SEND MAIL FORM-->
<div  class="PopUp"  >
  <div  class="PopUpWrapper">
    <div style="text-align: right;"><span class="x-button"  onclick="PopUpH()">X</span></div> 
    <div class="PopUpContent">
		<div class="errors" style="color:red; font-weight: bold;"></div>
	  	<form>
	      <h4 style="text-align: center; color:#fff;">SEND EMAIL</h4><br>
	    	<input type="text" class="form-control , email "  placeholder="Your email."><br>
	    	<textarea  class="form-control , message"  placeholder="Write something.."  style="resize: none; overflow:hidden ; height:200px"></textarea>
	    	<br>
	    	<button class="btn , btn-primary"  style="width: 75%; font-weight: bold;" onclick="sendMail();"> Submit</button>
	  	</form>
    </div>       
  </div>
</div>


<script type="text/javascript">
//receives file path and load its content to .PopUpContent
function PopUpShow(){
	$(".PopUp").show(250);
}

function PopUpH(){
    $(".PopUp").hide(250);
}

$(document).keyup(function(e) {
  if (e.keyCode === 27) $('.PopUp').hide(250);   // esc
});


//SEND MAIL 
function sendMail() {
  event.preventDefault();
  var email = $('.email').val(); 
  var message = $('.message').val();
  $.post("pages/sendMail.php",{email:email , message:message  },function(data){ 
    
    if (data === '') {alert();
      $(".errors").html('<h5 style="color:green;">MAIL SENDED ! <h5>').show();
      $(window).scrollTop(100);
      $('.email').val(''); 
      $('.message').val('') ; 
    }
    else { 
      var result = JSON.parse(data) ;
      $(".errors").html(result).show(); 
      $(window).scrollTop(100);
    }         
  });
}
</script>