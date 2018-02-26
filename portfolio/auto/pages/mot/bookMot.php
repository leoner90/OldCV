<!--  Block for errors and success msg. -->
<div class="booking-errors" style="color:red;"></div> 
<form>
	<!-- Select month  -> CALLS selectDate() function -->
	<label>PLEASE SELECT MONTH OF M.O.T.</label>
	<select class="form-control , month " onchange="selectDate()">
		<option selected disabled value="0">SELECT MONTH</option>
		<option <?php echo 'value="'.date("n").'">'.date("F")?></option>
		<option <?php echo 'value="'.date("n" , strtotime('+1 month')).'">'.date("F" , strtotime('+1 month'))  ?></option>
	</select>
	<br>

	<!-- Select date  -> CALLS selectTime() function -->
	<select class="form-control , date" style="display: none;" onchange="selectTime();" > 
	</select>
	<br>

	<!-- Select month  reveal .userdata Div for user information -->
	<select class="form-control , time" style="display: none;" onchange="$('.user-data').show();"> 
	</select>
	<br>
	<!-- information about user mail , car number , phone number -->
	<div class="user-data" style="display: none;">
		<input type="text" class="form-control , mail"  placeholder="Your email."><br>
		<input type="number" class="form-control , phone"  placeholder="Your phone number "><br>
		<input type="text" class="form-control , regNumber "   placeholder="YOUR CAR REG. NUMBER EXAMPLE: BD51 SMR"  ><br>
		<button class="btn , btn-primary"  style="width: 100%; font-weight: bold;" onclick="bookMot();"> Submit</button>
	</div>
</form>

<br />
* If some of time diapason not shown it's mean it's already booked!
<br />
* Opening Times: Monday - Friday , 8.00 - 18.00 (1 hour for M.O.T.)
<br />
* Booking is available for 2 months forward!

<script type="text/javascript">
// Book MOT
function bookMot() {
	event.preventDefault();
	var email = $('.mail').val(); 
 	var phoneNum = $('.phone').val(); 
    var regNumber = $('.regNumber').val();
  	var month = $('.month').val();
  	var date = $('.date').val();
  	var time = $('.time').val();
  	$.post("pages/mot/bookMotphp.php",{email:email, phoneNum:phoneNum, regNumber:regNumber, month:month, date:date, time:time},function(data){ 
   	  	if (data == '') {
	    	$(".booking-errors").html('<h5 style="color:green;"> Your booking is completed! <by> confirmation sended to your email!! <h5>').show().delay(7000).hide(500); 
	      	$('.month , .mail , .phone , .regNumber , .date , .time').val(''); 
	      	$('.user-data , .date , .time').hide(''); 
	      	$('.month').val('0');
    	}
    	else {
      		var result = JSON.parse(data) ;
      		$(".booking-errors").html(result).show().delay(5000).hide(500); 
    	}         
  	});
}

//get date list (select options)
function selectDate() {
	$('.date , .time , .user-data').hide();
	var month = $('.month').val();
	$.post("pages/mot/selectDate.php",{ month:month},function(data){ 
		$('.date').show();
		var result = JSON.parse(data) ;
		$('.date').html('<option selected disabled value="0">SELECT DATE</option>' + result);
	});
}

//get time list (select options)
function selectTime() {
	$('.user-data').hide();
	var month = $('.month').val();
	var date = $('.date').val();
	$.post("pages/mot/selectTime.php",{ month:month , date:date},function(data){  
		$('.time').show();
		var result = JSON.parse(data);
		$('.time').html('<option selected disabled value="0" >SELECT TIME</option>' + result);
	});
}
</script>

