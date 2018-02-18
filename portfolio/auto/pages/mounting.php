<!-- SIDEBAR NAVIGATION -->
<script>
	var x = document.getElementById("side-menu");
	x.style.display="none";
	$(document).ready(function(){  
	    $("#side-menu").fadeIn(1000);
	 });

	var sideMenu ="";
	var fileName = ["1", "404", "2"];  //file name in directory
	var dirName = ["1", "404", "2"]; // name to display in the menu
	//display whole side menu  
	for (var i = 0; i < fileName.length; i++) {
		sideMenu = sideMenu +"<a href=#/"+fileName[i]+">"+ dirName[i] + "</a> <br>";
	}
	x.innerHTML=sideMenu;
</script>
<!-- END OF SIDEBAR NAVIGATION -->
MOUNTING


