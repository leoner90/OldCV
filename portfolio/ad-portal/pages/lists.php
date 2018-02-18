<div class="tittle"> </div> 
<div id="result"></div>

<div class="text-center">
	<ul class="pagination">
	  <li><a href="#lists/birmingham/alldistricts">1</a></li>
	  <li><a href="#lists/birmingham/alldistricts">2</a></li>
	  <li><a href="#lists/birmingham/alldistricts">3</a></li>
	</ul>
</div>

<script type="text/javascript">
var dbname    = location.hash.split("/").pop();
var start_pos = location.hash.indexOf('/') + 1;
var end_pos	  = location.hash.indexOf('/',start_pos);
var tableName = location.hash.substring(start_pos,end_pos);
$('.tittle').html(tableName.toUpperCase());
$.post("pages/11.php",{tableName:tableName , dbname:dbname},function(data){ 
	var result = JSON.parse(data) ;
	$("#result").html(result); 
	  EqualHeight();
	tableSameHeight();
}); 

$(window).resize(function() {
	tableSameHeight();
})


function tableSameHeight(){
	var x = 0;
	var tallestcolumn = 0;
	vAlign = 0;
	

	$('.table-row > div').each(function(){ // reset div height value to minimum to avoid lon free space after resizing
		$(this).css("min-height", "auto");   //reset
	})  

	$('.table-img ').css("min-height", "auto");   //reset
	$('.table-text  , .table-price').css("line-height", vAlign);   //reset line height to zero

	$('.table-row').each(function(){ 
		if($(this).height() > tallestcolumn){
		    tallestcolumn = $(this).height(); 
		}
	})
	      
    $('.table-row > div').each(function(){
	    $(this).css("min-height", tallestcolumn);               
	})

	$('.table-img ').css("min-height", tallestcolumn); 

	//Text vertical align
	  vAlign = $('.table-row').height() + 'px'; 
	 $('.table-text  , .table-price').css("line-height", vAlign);  
}



// <!-- active collor in case of reload or first visit --> 
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