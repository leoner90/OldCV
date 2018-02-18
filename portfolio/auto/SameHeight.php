<script type="text/javascript">

$(window).resize(function() {
  sameHeight();
})

function sameHeight() {
  $(document).ready(function(){   
   tallestcolumn = $('.view').height();
   $('.wrapper').css("height", tallestcolumn);  
})}
 </script>