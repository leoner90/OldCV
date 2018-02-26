<!-- send dbname to returnModel.php to get back list of models certain  car brend and display it in #result-->
<script type="text/javascript">
	var dbname =  location.hash.replace('models', '');
	var dbname =  dbname.replace('#', '');		
	$.post("pages/returnModel.php",{dbname:dbname},function(data){ var result = JSON.parse(data) ;
 		$("#result").html(result); 
 	}); 
 	$(".tittle").html(dbname.toUpperCase() + ' MODELS'); 
</script>

<div class="tittle"></div>
<span id="result"></span>
<div class="tittleEnd"> </div>

<!-- active collor in case of reload or first visit -->
<script type="text/javascript">
	activeColor('.cars')
</script>