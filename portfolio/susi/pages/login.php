 

<?php 
session_start();
if (isset($_SESSION['login'] )) {
   echo '<script> location.hash = "#main"; </script>';
}
else {
  echo'
  <div class="tittle">LOG IN </div> 
  <form style="padding:10px; ">
    <div class="errors" style="color:red; "> </div>
    <input id="login" type="text" class="form-control" placeholder="Login"> <br>
    <input id="pwd" type="password" class="form-control" placeholder="Password"> 
    <button  onclick="log()" type="submit" class="btn btn-success navbar-btn btn-sm" style="width:75%; border-radius:20px; margin-top:20px;" >Login</button>
  </form>';
}

?>


<script type="text/javascript">
function log() {   
  var login = $('#login').val(); 
  var password = $('#pwd').val();
  $.post("pages/loginphp.php",{login:login , password:password },function(data){
    if (data == '') {
      bodyReload();
    }
    else {
      var result = JSON.parse(data) ;
      $(".errors").html(result); 
    }
  });  
}
</script>






                