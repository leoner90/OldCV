<?php 	session_start();?>
<div class="container-fluid"> <!-- bootstrap container fluid -->
 	<div class="content-wrapper , row">  <!-- bootstrap row -->
 		<!-- LEFT SIDEBAR AND MAIN BOOTSTRAP MENU -->
 		<div class=" left-sidebar , col-sm-3 " >	
 			<a  href="#"><img class="logo , img-responsive" src="img/logo.png" ></a>	
			<nav class="navbar navbar-inverse">
			    <div class="navbar-header ">
			        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		             	<span class="icon-bar"></span>
              			<span class="icon-bar"></span> 
		            </button>
			    </div>

			    <div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav nav-pills nav-stacked "> <!-- Creates vertical navigation pills -->
						<li class="main" ><a href="#main">HOME</a></li>
						<li class="flats" ><a href="#flats">PROPERTYS</a></li>
						<li class="cars" ><a href="#cars">CARS</a></li>
						<li class="vacancies" ><a href="#vacancies"> JOBS</a></li>

					</ul>	 
				</div>
			</nav>
	 	</div> <!-- end of left sidebar -->

	 	<!-- MAIN CONTAINER -->
	 	<div class="main-content , col-sm-7" > 		 
			<noscript> <h1 style="color:red; font-weight: bold;">Sorry, your browser does not support JavaScript! <br>You can't use this site without it!!</h1></noscript>
	 	</div>

	 	<!-- RIGHT SIDEBAR -->
	 	<div class="right-sidebar , col-sm-2" > 		 
			<?php 	 		
			//IF LOGGED IN	
			if (isset($_SESSION['login'] )) {

				//to bypass image caching if you select a other avatar, but do not reload the picture if it has not changed 
				// $ _SESSION ['random'] is specified when changing the avatar in changeavatar.php
				if (!isset($_SESSION['random'])) {
					$_SESSION['random'] = 1;
				}

				//if not exist avatar picture - load defaul avatar img
				if(!file_exists('img/avatars/'.md5($_SESSION['login']).'.png">')) {
				  echo '<a href="#cmr" onclick="activeColor(\'.cmr\')" ><img  class="img-responsive , avatar" src="img/avatars/default.png?'.$_SESSION['random'].'">';
				} 

				//if exist avatar picture - load it!
				 else {
				 	echo '<a href="#cmr" onclick="activeColor(\'.cmr\')" ><img class="img-responsive , avatar" src="img/avatars/'.md5($_SESSION['login']).'.png?'.$_SESSION['random'].'">';
				}

			 	echo '<span class="loginName">'.strtoupper($_SESSION['login']).'</span></a>
				  <ul class="nav nav-pills nav-stacked "> 
				  	<li style="color:#fff;cursor: pointer;" onclick="logout()"><span class="glyphicon glyphicon-log-out"></span> LOG OUT</li><br>
				  	<li class="cmr" ><a href="#cmr">MY ACCOUNT</a></li>
				  	<li class="adMaker"><a href="#adMaker">POST AN AD</a></li>
				  </ul>';
			}


			else {//IF NOT LOGGED IN DISPLAY LOGIN FORM AND REG BUTTON
			  echo'
			  <h4 style="color:#ccc;   text-align: center; font-weight: bold; text-shadow: 2px 2px gray;">LOG IN TO POST AN ADS</h4><hr>
			  <form style="padding:10px;">
			  	<div class="errors" style="color:red; "> </div>
				<input id="login" type="text" class="form-control" placeholder="Login"> <br>
				<input id="pwd" type="password" class="form-control" placeholder="Password"> 
				<button  onclick="log()" type="submit" class="btn , btn-success , navbar-btn, btn-sm , logbtn">Login</button>
				<a href="#registration"><button class="btn btn-danger navbar-btn btn-sm regbtn" form="empty">Registration</button></a>
			  </form>';
			}
			?>

			<!-- PARTNERS IMAGES  -->
			<div id="partners">
				<h3 style="color:#ccc; padding-top:35px; text-align: center; font-weight: bold; text-shadow: 2px 2px gray;">OUR PARTNERS</h3><hr>
				<a  href="http://primelocation.co.uk" target="_blank"><img style=" -webkit-filter: contrast(2); filter: contrast(2);" class=" img-responsive " src="img/primelocation.png"></a>	<hr>
				<a  href="http://gumtree.co.uk" target="_blank"><img  style=" -webkit-filter: contrast(2); filter: contrast(2);"class=" img-responsive" src="img/gumtree.png"></a>	<hr>
				<a  href="http://rightmove.co.uk" target="_blank"><img  style=" -webkit-filter: contrast(2); filter: contrast(2);" class=" img-responsive" src="img/rightmove.png"></a>	<hr>
			</div>					
	 	</div> <!-- RIGHT SIDEBAR END -->
 	</div> <!-- ROW END -->
</div> <!-- CONTAINER FLUID END -->
 

<script type="text/javascript">
// LOG IN FUNCTION
function log() {   
	event.preventDefault();
    var login = $('#login').val(); 
    var password = $('#pwd').val();
    $.post("pages/loginphp.php",{login:login , password:password },function(data){
	  	if (data == '') {
	    	$("body").load("body.php");
	  	}
	 	else {
		    var result = JSON.parse(data) ;
		    $(".errors").html(result); 
		    EqualHeight(); // errors stretchs div!
	  	}
  	});   
}

 // LOG OUT PHP HANDLER IS ON SAME PAGE
function logout() {
  $.post("body.php" ,function(){
    $("body").load("body.php");
  }) 
}

//ACTIVE COLOR FUNCTION
function activeColor(partition){
	$("li").removeClass("active");
	$(partition).addClass('active');
}
</script>

<!-- LOG OUT (php handler on same(this) page! )-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  unset($_SESSION['login']);
} 
?>

<!--  INCLUE Ajax navigation AND same Height function -->
<?php include 'SameHeightFunction.js';?>  
<?php include 'Navigation.js';?> 

<!-- bootstrap js -->
<script src="LibrariesAndFrameworks/bootstrap.min.js"></script>
