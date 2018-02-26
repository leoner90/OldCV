 <?php 
session_start();
//if logged in!
if (isset($_SESSION['login'] )) {
	//CONNECT TO DB SELECT AND DISPLAY USER INFO
	echo '<div class="tittle"> ACCOUNT SETTINGS  </div>';
	$id = $_SESSION['id'];
	include 'bdConnect.php'; 
	$dbname = "users";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT *  FROM usersforadportal WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($row['login'] == $_SESSION['login'] ) {	
		// to bypass image caching and change if you select a different avatar, but do not reload the picture if it has not changed
		if (!isset($_SESSION['random'])) {
			$_SESSION['random'] = 1;
		}

		//Avatar image by default
		if(!file_exists('../img/avatars/'.md5($_SESSION['login']).'.png')) {
		  echo '<a href="#cmr" onclick="activeColor(\'.cmr\')" ><img style="height:200px; width:100%;padding:1px;>" class="img-responsive" src="img/avatars/default.png"></a>';
		} 

		//Avatar image if exist!
		 else {echo '<a href="#cmr" onclick="activeColor(\'.cmr\')" ><img style="height:200px; width:100%;padding:1px;>" class="img-responsive" src="img/avatars/'.md5($_SESSION['login']).'.png?'.$_SESSION['random'].'"></a>';
		}

		//Account information
		echo '
		<table class="table table-bordered" style="background-color:#1f1e1e;  ">
			<tbody>
				<tr><td> Your Login: </td> <td> '.strtoupper($row['login']).'</td></tr>
			 	<tr><td> Your Email: </td> <td>  '.$row['email'].'</td></tr> 
			 </tbody> 
	 	</table>';   		  	
	}
	 
		//Change password panel
	echo '
		<div  class="panel panel-danger , collapsed"    >
	 		<div class="panel-heading" data-toggle="collapse" data-target="#1demo">CHANGE PASSWORD</div>
	  		<div id="1demo"  class="collapse , panel-body " style="color:red;" > 
				<div class="errors" style="color:red;"> </div><br>
				OLD PASSWORD <input id="oldPassword" type="password" class="form-control" placeholder="Password"><br> 
				NEW PASSWORD <input id="newPassword" type="password" class="form-control" placeholder="Password"> <br>
				REPEAT PASSWORD <input id="RnewPassword" type="password" class="form-control" placeholder="Repeat Password"> <br>
			  	<button class="btn btn-danger" onclick="changePsw()">Change password</button><br><hr>
	      	</div> 
		</div>';

		//Change Avatar panel
	echo '	
		<div class="panel panel-primary , collapsed">
	 		<div   class="panel-heading" data-toggle="collapse" data-target="#2demo">CHANGE AVATAR (max. size 2mb!!)</div>
	  		<div id="2demo"  class="collapse , panel-body" style="color:red;"> 
			 	<div class= "error"></div>
					<form id="uploadForm" action="pages/changeavatar.php" method="post">
						<input name="userImage" type="file" class="inputFile" /><br/>
						<input type="submit" value="Submit" class="btn btn-success" />
					</form>
	      	</div>
		</div>'; 

		//History of Advert which user has posted
	echo '
		<div class="panel panel-success , collapsed">
	     	<div   class="panel-heading" data-toggle="collapse" data-target="#demo">YOUR ADS</div>
		  	<div id="demo"  class="collapse , panel-body" style="color:red;">';
				$array  = explode('%',$row['history']); //разбивает историю на строчки
				for ($i=0; $i < sizeof($array); $i++) {  //разбивает строчку на id login etc.
					$info[$i] = explode("/", $array[$i]);
					$advertId[$i] =  @$info[$i][0]; // @ or show about not exist but it exist explode problem! to do!!
					$dbnames[$i] =  @$info[$i][1]; 
					$tableName[$i] = @$info[$i][2];
					$login[$i] = @$info[$i][3];
				}
				for ($i=0; $i < sizeof($advertId) - 1   ; $i++) { //start from fist becose first line in db is empty becouse of explode!! to do!
					$conn = new mysqli($servername, $username, $serverpassword , $dbnames[$i]);
					$sql = "SELECT *  FROM $tableName[$i] WHERE id='$advertId[$i]'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$locationHref = 'location.href =\'#lists/'.$tableName[$i].'/'.$dbnames[$i].'/adObserve/id='.$advertId[$i].'\'';
					echo '
					<table  class="table , table-responsive" style="word-break: break-all;">
						<tbody>
							<tr style="cursor:pointer;">
								<td onclick="'.$locationHref.'"class="col-xs-2"><img class="img-responsive"  src="pages/'.$row['img'].'"  style="height:80px;"></td>
								<td onclick="'.$locationHref.'" class="col-xs-6">'.substr($row['tittle'],0,30).'.....</td>
								<td onclick="'.$locationHref.'" class="col-xs-2">'.$row['price'].' &#163; </td>
								<td class="col-xs-2">
									<button class="btn-danger" onclick="deleteAdvert(\''.$dbnames[$i].'\',\''.$tableName[$i].'\',\''.$advertId[$i].'\',\''.$login[$i].'\')"> 
										DELETE
									</button>
								</td>
							</tr>
						</tbody>
					</table>';
				}									
	echo '	
			</div>
		</div> '; 
}

//if not logged in!
else {
  echo '<script>  location.hash = "#main";</script>';
}
?>

<script type="text/javascript">
// to make Equal Height to all elements when any panel is opened , becose it's widening element loads EqualHeight function when panel is fully opened
 $('.collapsed').on('shown.bs.collapse', function() {
  EqualHeight('cmr');
});
 
// Change Password
function changePsw() {
	event.preventDefault();
	var oldPassword = $("#oldPassword").val();
	var newPassword = $("#newPassword").val();
	var Rnewpassword = $("#RnewPassword").val();
	$.post("pages/changepassword.php",{oldPassword:oldPassword , newPassword:newPassword , Rnewpassword:Rnewpassword  },function(data){
		if (data == '') {
	    	 logout();
	    }
	  	else {
		    var result = JSON.parse(data) ;
		    $(".errors").html(result); 
		    EqualHeight(); // errors stretchs div!
	  	}
	})
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
					var result = JSON.parse(data);
   					$(".error").html(result); 
   				}
		    }       
	    })
	}))
})

//Advert deleting!
function deleteAdvert(db,table,id , login) {
	event.preventDefault();
	$.post("pages/deleteAd.php",{db:db , table:table , id:id , login:login  },function(data){
		if (data == '') {
	    	 $("body").load("body.php");
	    }	

	    else { // if try to change transmission id number in browser
	    	var result = JSON.parse(data);
   			alert(result);  // ERROR:You are not authorized to do this!
	    } 
	  
	})
}

// active collor in case of reload or first visit  
	activeColor('.cmr');
</script>	