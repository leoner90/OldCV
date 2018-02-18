<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>CAR FIX</title>
  <!--  meta tag for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--   Jqery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- bootstrap css CDN-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--  My css file -->
  <link href="css/style.css" rel="stylesheet">
  <!--  Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-route.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-animate.min.js"></script>
</head>

<body ng-app="app" ng-controller="ctrl" ng-class="animation" >
<!-- Bootstrap Menu  + collapse button -->
	<div class="nav-menu" >
		<nav class="navbar" >
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span> 
		        </button>
		        <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
		    </div>

		    <div class="collapse navbar-collapse" id="myNavbar" >
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
					<li><a href="#/service">Сервис</a></li>
					<li><a href="#/fix">Ремонтные работы</a></li>
					<li><a href="#/mounting">Шиномонтаж</a></li>
					<li><a href="#/contacts">Контакты</a></li>
				</ul>
			</div>
		</nav>
	</div>
<!-- End of menu bar -->

<div class="wrapper"> <!-- whole page wrapper -->
  <!-- Left Side menu-->
  <div class="left-sidebar">
    <h6 style="text-align: center; color:#fff;">NEED M.O.T.?</h6>
    <img class="button-img , img-responsive" src="img/book.png" onclick="PopUpS('pages/bookMot.php')">
    <div id="side-menu"><!-- side menu navigation logic is inside pages  --></div>
    <form class="send-mail">
      <h4 style="text-align: center; color:#fff;">ANY QUESTIONS?</h4><br>
      <input type="text" class="form-control" id="usr"placeholder="Your email."><br>
      <input type="text" class="form-control" id="usr"placeholder="Your phone number "><br>
      <textarea id="subject" class="form-control" name="subject" placeholder="Write something.."  style="resize: none; overflow:hidden ; height:200px"></textarea>
      <br>
      <button class="btn , btn-primary" type="submit"  > Submit</button>
    </form>
	</div>

<!-- fake element for incline -->
	<div  class="left-sidebar-fake"></div> 

<!-- Main block of content -->
	<div class="content">
    <div ng-view class="view"></div>
  </div>

<!-- Right Sidebar -->
	<div class="right-sidebar ">
  	<form>
      <h4 style="text-align: center; color:#fff;">ANY QUESTIONS?</h4><br>
    	<input type="text" class="form-control" id="usr"placeholder="Your email."><br>
    	<input type="text" class="form-control" id="usr"placeholder="Your phone number "><br>
    	<textarea id="subject" class="form-control" name="subject" placeholder="Write something.."  style="resize: none; overflow:hidden ; height:200px"></textarea>
    	<br>
    	<button class="btn , btn-primary" type="submit"  > Submit</button>
  	</form>
	</div>

  <!-- Footer -->
	<div class="footer"> </div>	
</div>

 <?php include 'PopUp.php';?> 
 <?php include 'navigation.php';?> 
 <?php include 'SameHeight.php';?> 

<!-- bootstrap js CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>