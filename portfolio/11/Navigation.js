<script type="text/javascript">

// обработчик кликов меняет hash
$(document).ready(function(){
  changePage();  //в случаи копирование и вставки ссылки или первого захода на сайт  
})


//смена контента  (срабатывает при смене хэша hashchange event )
$(window).on('hashchange', function() { 
changePage(); //при смене  хэша тоесть при клики на ссылку

})

function changePage() {
 
  var link = location.hash.replace(/[^a-zA-Z0-9]/g, ""); //delete all simvols
  if (link=='' ){ //if hash empty then redirect to main page(first visit for example)
      link = "main";
  } 
  
  $.get('pages/'+ link + '.php', function(data) { 
   $('.content').hide().html(data).show(0);
    $(window).scrollTop(0);

  //add active class for menu link
  $("li").removeClass("active");
  $("li").css('textShadow','');
  $("."+link).addClass('active');
  $("."+link).css('textShadow','2px 2px red');

  })
  
  //If page not exist (if error)
  .fail(function() {
    $.get('pages/404.php', function(data)  { 
     $('.text-content').hide().html(data).show(0);
     $(window).scrollTop(0);
  
    })
  })
}
</script>
 


 
 
 


