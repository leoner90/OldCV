<script type="text/javascript">
 //ON RESIZE MAKE  EQUAL HEIGHT FOR MAIN ELEMENTS
$(window).resize(function() {
  EqualHeight();
})

 //FUNCTION COUNT TALLEST BLOCK HEIGHT AND MAKE  EQUAL HEIGHT FOR MAIN ELEMENTS .LEFT SIDEBAR  , .MAIN CONTENT AND .RIGHT SIDEBAR
function  EqualHeight(){ 
	$(document).ready(function(){
		if ( $(document).width() > 768) {  
			$('.content-wrapper > div').each(function(){ // reset div height value to minimum to avoid long free space after resizing
	        	$(this).css("min-height", "auto");                
	  	  	})	 

		  	tallestcolumn = 0;
	     	$('.content-wrapper').each(function(){ 
	        	$(this).css("min-height", '100%');
	          	if($(this).height() > tallestcolumn){
	          	tallestcolumn = $(this).height();       
	          }
	        })
		  		
		    $('.content-wrapper > div').each(function(){
	        	$(this).css("min-height", tallestcolumn);               
	        })
		}

		else {
			 $('.content-wrapper > div ').each( function(){
			 	$(this).css("min-height", "auto");
			 })
		}
	})
}
</script>