<?php 
session_start();
$emptybar = 0;
if (isset($_SESSION['OrderList'])) {
	for ( $i = 0; $i < $_SESSION['i']; $i++) { 
		if (!empty($_SESSION['OrderList'][$i])) {
			$emptybar = 1; // check if any of $sesion[OrderList] isn't empty!
			echo $_SESSION['OrderList'][$i];
		}
	}
}
 
if ($emptybar == 0) { // if all  $sesion[OrderList] array is empty - display backet empty!
	echo 'YOUR BASKET IS EMPTY';
}

else {
  	echo '<hr> 
  	<table class="table ">
	  	<tr class="totalsumm-row">
			<td class="col-sm-8">
				TOTAL SUMM IS:
			</td>
			<td class="col-sm-1">
				'.$_SESSION['totalSumm'].' &#163
			</td>
			<td class="col-sm-3"></td>
		</tr>
	</table>';
		
  

	if (isset($_SESSION['login'])) {
		echo '
		
		<button onclick="PayByCardForm()" class="btn btn-success" style="width:100%;"> PAY BY CARD</button><br><br>
		<div class="cardPayCheckout">
			<h1 style="font-weight:bold;"> PAY BY CARD </h1>
			<div id="card-errors"  style="color:red;"> </div>
			<label>Card number(16 digits)</label><br>
			<input  id="card-number" class="form-control" type="number"   oninput="maxlenght(this , 16)"><br>

			<label>Card holder name</label><br>
			<input id="card-name" class="form-control" type="text"   ><br>

			<label>Card expaires months</label> 
			<select id="card-exp-months" class="form-control">
			    <option value="">Month</option>
			    <option value="01">January</option>
			    <option value="02">February</option>
			    <option value="03">March</option>
			    <option value="04">April</option>
			    <option value="05">May</option>
			    <option value="06">June</option>
			    <option value="07">July</option>
			    <option value="08">August</option>
			    <option value="09">September</option>
			    <option value="10">October</option>
			    <option value="11">November</option>
			    <option value="12">December</option>
			</select>  
			<label>Card expaires year</label> 
			<select  id="card-exp-year" class="form-control">
			    <option value="">Year</option>
			    <option value="2018">2018</option>
			    <option value="2019">2019</option>
			    <option value="2020">2020</option>
			</select> 

			<label>CVC (Card back last 3 digits) </label> 
			<input id="card-back" class="form-control" type="number"  style="width: 10%;"  oninput="maxlenght(this , 3)">

			<h3 style="color:red; border-bottom:2px solid #fff; padding-bottom:5px;" >SUMM IS:  '.$_SESSION['totalSumm'].'&#163</h3> 
			
			<label >Address for delivery</label><br>
			<input id="card-address" class="form-control" type="text"  "><br>

			<label>Phone Number </label><br>
			<input id="card-phone-number"class="form-control" type="number"  ><br>

			<button onclick="PayByCard()" class="btn btn-danger" style="width:100%;">Proceed</button>
			
		</div>

		<button onclick="PayByCashForm()" class="btn btn-primary" style="width:100%; ">OR CASH PAYMENT</button><br>

		<div   class="cashPayCheckout">
			
			<h1 style="font-weight:bold;"> CASH PAYMENT</h1>
			<h3 style="color:red; border-bottom:2px solid #fff; padding-bottom:5px;" >SUMM IS:  '.$_SESSION['totalSumm'].'&#163</h3> 
			<div id="cash-errors" style="color:red;"> </div>
			<label>Address for delivery</label><br>
			<input id="Cashaddres" class="form-control" type="text"   "><br>

			<label>Phone Number </label><br>
			<input id="CashPhone" class="form-control" type="number"><br>

			<button onclick="PayByCash()" class="btn btn-danger" style="width:100%;">Proceed</button>
		</div>';
	}

	else {
		echo '<br><span style="color:red;"> YOU MUST BE A  REGISTERED USER TO CONTINUE! <br> PLEASE LOG IN !</span>';
	}
}
 
?>

<script type="text/javascript">
function maxlenght(thiss , maxLength){
 if (thiss.value.length > maxLength) thiss.value = thiss.value.slice(0, thiss.maxLength);
}

function emptyy(index) {  
	$.post("pages/orderbasket.php",{ index:index },function( ){ 
		bodyReload(); // reload bascet logo and basketlist
	});
}

function PayByCardForm(){
	$('.cashPayCheckout').hide();
	$('.cardPayCheckout').toggle();
}

function PayByCashForm(){
	$('.cardPayCheckout').hide();
	$('.cashPayCheckout').toggle();
}

function PayByCard() {
	var cardNum = $('#card-number').val(); 
	var cardName = $('#card-name').val(); 
	var cardExpMonth = $('#card-exp-months').val(); 
	var cardExpYear = $('#card-exp-year').val(); 
	var cardBack = $('#card-back').val(); 
	var cardAddress = $('#card-address').val(); 
	var cardPhone = $('#card-phone-number').val(); 
 	$.post("pages/payByCard.php",{cardNum:cardNum ,cardName:cardName , cardExpMonth:cardExpMonth ,cardExpYear:cardExpYear ,cardBack:cardBack,  cardAddress:cardAddress , cardPhone:cardPhone  },function(data){ 
	 		if (data == '') {
				$(window).scrollTop(0);
		    	$('#body').load('body.php' , function() {
				$('#succes-msg').show().delay(1500).slideUp(1000);
			});
		    }
		  	else { 
			    var result = JSON.parse(data) ;
			    $("#card-errors").html(result); 
			    $(window).scrollTop(200);
		  	}	  	    
	 });

}

function PayByCash() {
	 var address = $('#Cashaddres').val(); 
	 var phone = $('#CashPhone').val(); 
	 $.post("pages/payByCash.php",{ address:address , phone:phone  },function(data){ 
	 	if (data == '') {
		    $(window).scrollTop(0);
		    $('#body').load('body.php' , function() {
				   $('#succes-msg').show().delay(1500).slideUp(1000);
			});
		}
	  	else { 
		    var result = JSON.parse(data) ;
		    $("#cash-errors").html(result); 
	  	}	   
	 });
}

</script>



<!-- Delete one of order -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	if (is_numeric($_POST['index']))  {
  		$i = $_POST['index'];
		$_SESSION['totalSumm'] =  $_SESSION['totalSumm'] - $_SESSION['summ'][$i] ;
		$_SESSION['OrderList'][$i]=''; 
	}	
}
?>

 