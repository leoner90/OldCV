<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>My CV</title>
  <!--  meta tag for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--   Jqery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!-- bootstrap css CDN-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <!--  My css file -->
  <link href="css/style.css" rel="stylesheet">
</head>
<!-- Bootstrap Menu Scroll + Affix + collapse button -->
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="200">
	<div class="container-fluid">
		<div class="nav-menu container-fluid" >
			<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="85">
			    <div class="navbar-header">
			        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span> 
			        </button>
			        <a class="navbar-brand" href="#body">WELCOME TO MY CV</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="#info">INFO</a></li>
						<li><a href="#experience">EXPERIENCE</a></li>
						<li><a href="#portfolio">PORTFOLIO</a></li>
						<li><a href="#education">EDUCATION</a></li>
						<li><a href="#addinfo">OTHER</a></li>
					</ul>
				</div>
			</nav>
		</div>
<!-- End of menu bar -->

<!-- Main content blocks starts -->
	<div id="info" class="header-block , container-fluid">
		<div class="row">
			<div id="avatar" class="col-sm-4">
				<img class="img-circle , avatar , img-responsive" src="img/avatar.png">
			</div>
			<div class="col-sm-8">
				<?php getFile("info");?> <!-- call function witch open and read file by this name -->
			</div>
		</div>
	</div>
	<div id="experience" class="content-block , container-fluid">
		<?php getFile("experience");?> 
	</div>
	<div id="portfolio" class="content-block , container-fluid">
		<?php getFile("portfolio");?>
	</div>
	<div id="education" class="content-block , container-fluid">
		<?php getFile("education");?>
	</div>
	<div id="addinfo" class="content-block , container-fluid">
		<?php getFile("addInfo");?>
	</div>
</div>
<!-- Main content blocks end -->

<!-- Create path to file ,then open and read it -->
<?php 
function getFile($name){
	$fileName = "pages/".$name.".txt";
	$myfile = fopen($fileName, "r") or die("Unable to open file!");
	echo fread($myfile,filesize($fileName));
	fclose($myfile);
}
?>

<!-- Pop-up box start -->
<div class="b-popup" id="email-popup">
    <div class="b-popup-content ">
        <form>
        	<input type="text" name=""><br>
        	<input type="text" name=""><br>
        	<input type="text" name=""><br>
        	 <a href="javascript:PopUpHide()">Hide popup</a>
        	 <?php mail("leonid.90@inbox.lv","My subject","text"); ?>
        </form>
    </div>
</div>

<!-- pop-up show / hide fucntion -->
<script>
    $(document).ready(function(){
        //Скрыть PopUp при загрузке страницы    
        PopUpHide();
    });
    //Функция отображения PopUp
    function PopUpShow(){
        $("#email-popup").show(250);
    }
    //Функция скрытия PopUp
    function PopUpHide(){
        $("#email-popup").hide(250);
    }
</script>
<!-- Pop-up box end -->


 <!-- bootstrap js CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>




