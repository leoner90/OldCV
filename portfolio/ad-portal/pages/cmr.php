 <?php 
session_start();
if (isset($_SESSION['login'] )) {
echo '<div class="tittle"> ACCOUNT SETTINGS  </div>';

include 'bdConnect.php'; 
$dbname = "users";
$conn = new mysqli($servername, $username, $serverpassword , $dbname);
$sql = "SELECT *  FROM usersforadportal";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {  	
	if ($row['login'] == $_SESSION['login'] ) {	
		
		//для обхода кэширования картинки и смене если выбрать дпугой аватар ,но не перезагружать картинку если она не изменилась
		if (!isset($_SESSION['random'])) {
			$_SESSION['random'] = 1;
		}
		if(!file_exists('../img/avatars/'.md5($_SESSION['login']).'.png">')) {
		  echo '<a href="#cmr" onclick="activeColor(\'.cmr\')" ><img style="height:200px; width:100%;padding:1px;>" class="img-responsive" src="img/avatars/default.png">';
		} 

		 else {echo '<a href="#cmr" onclick="activeColor(\'.cmr\')" ><img style="height:200px; width:100%;padding:1px;>" class="img-responsive" src="img/avatars/'.md5($_SESSION['login']).'.png?'.$_SESSION['random'].'">';
		}

			echo '
			<table class="table table-bordered" style="background-color:#1f1e1e;  ">
			<tbody>
				<tr><td> Your Login: </td> <td> '.strtoupper($row['login']).'</td></tr>
			 	<tr><td> Your Email: </td> <td>  '.$row['email'].'</td></tr> 
			 </tbody> 
		 	</table>';

		break;	   		  	
	}
} 

echo '
	<div  class="panel panel-danger , collapsed"    >
 		<div    class="panel-heading" data-toggle="collapse" data-target="#1demo">CHANGE PASSWORD</div>
  		<div   id="1demo"  class="collapse , panel-body " style="color:red;" > 
			<div class="errors" style="color:red;"> </div><br>
			OLD PASSWORD <input id="oldPassword" type="password" class="form-control" placeholder="Password"><br> 
			NEW PASSWORD <input id="newPassword" type="password" class="form-control" placeholder="Password"> <br>
			REPEAT PASSWORD <input id="RnewPassword" type="password" class="form-control" placeholder="Repeat Password"> <br>
		  	<button class="btn btn-danger" onclick="changePsw()">Change password</button><br><hr>
      	</div> 
	</div> 


	<div class="panel panel-primary , collapsed">
 		<div   class="panel-heading" data-toggle="collapse" data-target="#2demo">CHANGE AVATAR (max. size 2mb!!)</div>
  		<div id="2demo"  class="collapse , panel-body" style="color:red;"> 
		 	<div class= "error"></div>
				<form id="uploadForm" action="pages/changeavatar.php" method="post">
					<input name="userImage" type="file" class="inputFile" /><br/>
					<input type="submit" value="Submit" class="btn btn-success" />
				</form>
      	</div>
	</div> 


		<div class="panel panel-success , collapsed">
     		<div   class="panel-heading" data-toggle="collapse" data-target="#demo">YOUR ADS</div>
  			<div id="demo"  class="collapse , panel-body" style="color:red;"> 
	 			sorry '.$row['login'].' , it\'s under construction
  			</div>
	 	</div> 
	';

}
else {
  echo '<script>  location.hash = "#main";</script>';
}

?>
<!-- to make Equal Height to all elements when any panel is opened , becose it's widening element 
loads EqualHeight function when panel is fully opened-->
<script type="text/javascript">
 $('.collapsed').on('shown.bs.collapse', function() {
  EqualHeight('cmr');
});
 
// Change Password
function changePsw() {
	var oldPassword = $("#oldPassword").val();
	var newPassword = $("#newPassword").val();
	var Rnewpassword = $("#RnewPassword").val();
	
	$.post("pages/changepassword.php",{oldPassword:oldPassword , newPassword:newPassword , Rnewpassword:Rnewpassword  },function(data){
		if (data == '') {
	    	 $.post("pages/loginunset.php" ,function(){$("body").load("body.php");});
	    }
	  	else {
		    var result = JSON.parse(data) ;
		    $(".errors").html(result); 
		    EqualHeight(); // errors stretchs div!
	  	}
	
	}); 
}


// Upload new avatar img
$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "pages/changeavatar.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
				if (data == "") {
					$("body").load("body.php");
				}
				else {
					var xx = JSON.parse(data) ;
   					$(".error").html(xx); 
   				}
		    }
		          
	   });
	}));
});


 // active collor in case of reload or first visit  
	activeColor('.cmr');
</script>






	