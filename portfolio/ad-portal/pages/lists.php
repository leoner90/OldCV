<div class="tittle"> </div> 
<div id="result"></div>

<!-- Get db and table name  from href and send them to getList.php whitch return a table with  adverts  and load into #result-->
<script type="text/javascript">
var dbname    = location.hash.split("/").pop();
var start_pos = location.hash.indexOf('/') + 1;
var end_pos	  = location.hash.indexOf('/',start_pos);
var tableName = location.hash.substring(start_pos,end_pos);
$('.tittle').html(tableName.toUpperCase());
$.post("pages/getList.php",{tableName:tableName , dbname:dbname},function(data){ 
	var result = JSON.parse(data) ;
	$("#result").html(result); 
	EqualHeight();
}); 

// <!-- active collor depending on dbname in case of reload or first visit --> 
if (dbname == 'alldistricts') {
	activeColor('.flats');
}
else if (dbname == 'jobs') {
	activeColor('.vacancies');
}
else {
	activeColor('.cars');
}
</script>