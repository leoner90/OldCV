<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>CAR FIX</title>
  <!--  meta tag for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--   Jqery -->
  <script src="LibrariesAndFrameworks/jquery-3.3.1.min.js"></script>
  <!-- bootstrap css -->
  <link  rel="stylesheet" href="LibrariesAndFrameworks/bootstrap.min.css">
  <!--  My css file -->
  <link href="css/style.css" rel="stylesheet">
  <!--  Angular -->
  <script src="LibrariesAndFrameworks/angular.min.js"></script>
  <script src="LibrariesAndFrameworks/angular-route.min.js"></script>
  <script src="LibrariesAndFrameworks/angular-animate.min.js"></script>
</head>

<body ng-app="app" ng-controller="ctrl" ng-class="animation" >
<!-- Bootstrap Menu  + collapse button -->
<div class="nav-menu" >
	<nav class="navbar" >
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        	<span class="icon-bar" style="background-color: #fff;"></span>
	        	<span class="icon-bar" style="background-color: #fff;"></span> 
	        </button>
	        <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="myNavbar" >
				<ul class="nav navbar-nav">
					<li><a href="#/">HOME</a></li>
          <li><a href="#/repairs">REPAIRS</a></li>
					<li><a href="#/service">CAR SERVICING</a></li>
					<li><a href="#/tyres">TYRES</a></li>
					<li><a href="#/contacts">CONTACTS</a></li>
				</ul>
		</div>
	</nav>
</div>
<!-- End of menu bar -->

<div class="wrapper"> <!-- whole page wrapper -->
  <!-- Left Side menu-->
  <div class="left-sidebar">
    <h6 style="text-align: center; color:#ccc; font-weight: bold;">NEED M.O.T.?</h6>
    <img class="button-img , img-responsive" src="img/book.png" onclick="PopUpS('pages/mot/bookMot.php')">
    <div id="side-menu"><!-- side menu navigation loaded from navigation.php --></div>
    <form class="send-mail">
      <div class="errors" style="color:red; font-weight: bold;"></div>
      <h4 style="text-align: center; color:#fff;">ANY<br> QUESTIONS?</h4><br>
      <input type="text" class="form-control , email "  placeholder="Your email."><br>
      <input type="number" class="form-control , phoneNum" " placeholder="Your phone number "><br>
      <textarea class="form-control, message" placeholder="Write something.." style="resize:none; overflow:hidden; height:200px; width: 100%;"></textarea>
      <br>
      <button class="btn , btn-primary"  style="width: 100%; font-weight: bold;" onclick="sendMail(0);"> Submit</button>
    </form>
	</div>

<!-- fake element for incline -->
	<div  class="left-sidebar-fake"><div id="side-menu"></div></div> 

<!-- Main block of content -->
	<div class="content">
    <div ng-view class="view"></div>
  </div>

<!-- Right Sidebar -->
	<div class="right-sidebar ">
    <div class="errors" style="color:red; font-weight: bold;"></div>
  	<form>
      <h4 style="text-align: center; color:#fff;">ANY QUESTIONS?</h4><br>
    	<input type="text" class="form-control , email "  placeholder="Your email."><br>
    	<input type="number" class="form-control , phoneNum" " placeholder="Your phone number "><br>
    	<textarea  class="form-control , message"  placeholder="Write something.."  style="resize: none; overflow:hidden ; height:200px"></textarea>
    	<br>
    	<button class="btn , btn-primary"  style="width: 75%; font-weight: bold;" onclick="sendMail(1);"> Submit</button>
  	</form>
	</div>

  <!-- Footer -->
	<div class="footer"> </div>	
</div> <!--End of whole page wrapper -->
<script src="LibrariesAndFrameworks/bootstrap.min.js"></script>
</body>
</html>

<!-- M.o.t. Pop Up -->
<?php include 'MotPopUp.php';?> 
<!-- Navigation -->
<?php include 'navigation.php';?> 
<!-- Makes same height to main elements-->
<?php include 'SameHeight.php';?> 

<script type="text/javascript">
//SEND MAIL 
function sendMail(index) {
  event.preventDefault();
  var email = $('.email').eq(index).val(); 
  var phoneNum = $('.phoneNum').eq(index).val(); 
  var message = $('.message').eq(index).val();
  $.post("pages/sendMail.php",{email:email ,phoneNum:phoneNum , message:message  },function(data){ 
    if (data == '') {
      $(".errors").html('<h5 style="color:green;">MAIL SENDED ! <h5>').show().delay(5000).hide(500); 
      $(window).scrollTop(100);
      $('.email').eq(index).val(''); 
      $('.phoneNum').eq(index).val('') ;  
      $('.message').eq(index).val('') ; 
    }
    else { 
      var result = JSON.parse(data) ;
      $(".errors").eq(index).html(result).show().delay(5000).hide(500); 
      $(window).scrollTop(100);
    }         
  });
}
</script>