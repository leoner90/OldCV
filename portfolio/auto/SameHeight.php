<!--  used because .view (.content) is position absolute and doesn't stretch table!! -->
<script type="text/javascript">

$(window).resize(function() {
  sameHeight();
})

function sameHeight() {
	$(document).ready(function(){   
	  	tallestcolumn = $('.view').height();
	    $('.wrapper').css("height", tallestcolumn);  
	})
}
</script>