<script type="text/javascript">

// onload navigation loading
$(document).ready(function(){
  changePage(); 
})

//on hash change call changePage function
$(window).on('hashchange', function() { 
  changePage(); //при смене  хэша тоесть при клики на ссылку
})

//get page name from hash and load it into .main-content
function changePage() {
  var link = location.hash.replace(/[^a-zA-Z0-9]/g, ""); //delete odd simvols and #
  if (link=='' ){ //if hash empty then redirect to main page(first visit for example)
      link = "main";
  } 
 
  if ( link.includes("adObserve")) {
    link = "adObserve"; //will leave only adObserve for the link to find file  , but hash will remains how it was for db manipulation in future
  }

  else if ( link.includes("lists")) {
    link = "lists";  //will leave only lists for the link to find file  , but hash will remains how it was for db manipulation in future
  }

  else if ( link.includes("models")) {
   link = "models";//      //will leave only models for the link to find file  , but hash will remains how it was for db manipulation in future
  }
 
  //get file by file name and load it into .main-content
  $.get('pages/'+ link + '.php', function(data) { 
     $('.main-content').hide().html(data).show(0);
     $(window).scrollTop(0);
     EqualHeight();
  })
  
  //If page not exist (if error)
  .fail(function() {
    $.get('pages/404.php', function(data)  { 
      $('.main-content').hide().html(data).show(0);
      $(window).scrollTop(0);
      EqualHeight();
    })
  })
}

</script>
 





