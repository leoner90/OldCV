<!-- IF LOGПED IN -  REDIRECT TO MAIN PAGE , IF NOT SHOW REGISTRATION FORM -->
<?php 
session_start();      
if (isset($_SESSION['login'] )) {
    echo '<script> location.hash = "#main"; </script>';
}
else {
  echo '
  <div class="tittle">REGISTRATION </div> 
    <div id="reg-errors" style="  color:red; font-size: 15px;line-height: 20px; border: 1px solid black;"></div> 
    <br><br>
    <form>
      <label for="login">Email address:</label>
      <input type="email" class="form-control" id="mail"  >

      <label for="login">Your Login:</label>
      <input type="login" class="form-control" id="reg-login" >

      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" >

      <label for="r-pwd">Repeat Password:</label>
      <input type="password" class="form-control" id="Rpassword" >
      <br>
      <button onclick="reg()" type="submit" class="btn btn-success">Registration</button>
  </form>'
;}

?>

<!-- REGISTRATION FUNCTION -->
<script type="text/javascript">
function reg() {
  event.preventDefault();
  var email = $('#mail').val();
  var login = $('#reg-login').val();    
  var password = $('#password').val();
  var Rpassword = $('#Rpassword').val();  
  $.post("pages/regphp.php",{email: email ,login:login, password:password , Rpassword:Rpassword },function(data,status){
    if (data == '') {
      bodyReload();
    }
    else {
      var result = JSON.parse(data) ;
      $("#reg-errors").show().html(result); 
         $(window).scrollTop(0);
    }
  });
}

</script>