<?php session_start(); ?>
<div class="wrapper"> <!-- all page wrapper -->

<!-- Bootstrap Menu/collapse button , 
also if not logged in -> log in & registraion button (otherwise "my account link") - 
also if isset  $_SESSION['totalSumm'] - display currently order price -->
  <div class="nav-menu">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="#"><img class="logo" src="img/logo.png"></a>
            <span id="headTittle" >SUSHI BAR</span>
            <span id="tagline" >Just try us..!</span>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="main"><a href="#main">HOME</a></li>
            <li class="menu"><a href="#menu">MENU</a></li>
            <li class="contacts"><a href="#contacts">CONTACTS</a></li>
            <?php if (isset( $_SESSION['login'] )) {   
              echo  '<li class="cms"><a href="#cms">MY ACCOUNT</a></li>'; }?>
             <li class="orderbasket"> <a  href='#orderbasket'> <span id="totalSumm">
            <?php   
                if (isset( $_SESSION['totalSumm'] )) {
                  echo $_SESSION['totalSumm'];
                }
                else {
                   echo '0.00 '  ;
                }
              ?> 
              </span> &#163; 
              <img src="img/order.png" width="40"  height="30" alt="ааОбаЗаИаНаА">  </a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#contacts"><span class="phone">07741234234</span></a></li>
            <?php   
                if (isset( $_SESSION['login'] )) {
                  echo  
                  '<li ><a href="#cms"><span class="login-text">'.strtoupper($_SESSION['login']).'</span></a></li>
                  <li id="log-out-icon" style="color:#fff; cursor: pointer; padding-right:10px;" onclick="logout()"> <span class="glyphicon glyphicon-log-out"></span> Log out</li>';
                }
                else { // Pop up registration and log in
                   echo '
                     <li id="log-in-icon" onclick="PopUpS(\'pages/login.php\')"> <span class="glyphicon glyphicon-log-in"></span> Login</li>
                     <li id="sign-up-icon" onclick="PopUpS(\'pages/registration.php\')"> <span class="glyphicon glyphicon-user"></span> Sign Up</li>
                     ';
                }
            ?>
          </ul>
      </div>
    </nav>
  </div>
<!-- END of Bootstrap Menu  -->

<!-- main container for information(content reloading by ajax function Navigation.js ) -->
  <div class="content" > 
    <noscript> <h1 style="color:red; font-weight: bold;">Sorry, your browser does not support JavaScript! <br>You can't use this site without it!!</h1></noscript>
  </div>

<!-- Footer just design :) -->
  <div class="footer">
  </div>
</div> <!-- end of wrapper  -->


<!-- AJAX NAVIGATION -->
<?php include 'Navigation.js';?> 

<!-- pop up function for log in , registration and change password forms-->
<?php include 'PopUp.php';?> 

<!-- LOG OUT (php handler on same(this) page! )-->
<script type="text/javascript">
function logout() {
  $.post("body.php" ,function(){
    bodyReload();
  }) 
}

//Full  Page reload function
function bodyReload(){
  $('#body').load('body.php'); // reload bascet logo and basketlist
}
</script>

<!-- LOG OUT handler -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  unset($_SESSION['login']);
  unset($_SESSION['id']);
} 
?>

<!-- bootstrap js CDN-->
<script src="LibrariesAndFrameworks/bootstrap.min.js"></script>