
<script type="text/javascript">
  
$(window).resize(function() {
  EqualHeight();
})

function  EqualHeight(){ 
	$(document).ready(function(){
		if ( $(document).width() > 768) {  
		  $('.content-wrapper > div').each(function(){ // reset div height value to minimum to avoid lon free space after resizing
	          $(this).css("min-height", "auto");                
	  	  })	 

		  tallestcolumn = 0;
	      $('.content-wrapper').each(
	        function(){ 
	          $(this).css("min-height", '100%');

	          if($(this).height() > tallestcolumn){
	              tallestcolumn = $(this).height();
	                
	            }
	        }
	      )
		  		
		    $('.content-wrapper > div').each(
	        function(){
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
