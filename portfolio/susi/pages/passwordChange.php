<div class="errors" style="color:red;"> </div><br>
OLD PASSWORD <input id="oldPassword" type="password" class="form-control" placeholder="Password"><br> 
NEW PASSWORD <input id="newPassword" type="password" class="form-control" placeholder="Password"> <br>
REPEAT PASSWORD:<input id="Rnewpassword" type="password" class="form-control" placeholder="Repeat Password" >
<button class="btn btn-danger" onclick="changePsw()" style="width:75%; border-radius:20px; margin-top:20px;">Change password</button><br><hr>

 
<script type="text/javascript">
function changePsw() {
	var oldPassword = $("#oldPassword").val();
	var newPassword = $("#newPassword").val();
	var Rnewpassword = $("#Rnewpassword").val();
	$.post("pages/passwordChangephp.php",{oldPassword:oldPassword , newPassword:newPassword , Rnewpassword:Rnewpassword  },function(data){
		if (data == '') {
			logout();
			bodyReload();
	    }
	  	else {
		    var result = JSON.parse(data) ;
		    $(".errors").html(result); 
	  	}
	}); 
}
</script>