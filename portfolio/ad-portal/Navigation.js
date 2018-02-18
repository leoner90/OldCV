<script type="text/javascript">

// обработчик кликов меняет hash
$(document).ready(function(){
  changePage();  //в случаи копирование и вставки ссылки или первого захода на сайт  
  // $("a").on("click", function(){ //срабатывает при клике на a(ссылку)
  //   var link = $(this).attr('href'); //записывает в линк содержимое href из a(ссылки)


  //  if (!link.includes("http")){  //if contains http link do nofing with hash
   //   link = "main";
  //   location.hash = link;    //записывает в hash текущею ссылку
  //  } 
    
  // }); 
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
 
  if ( link.includes("adObserve")) {
    link = "adObserve"; // оставит только models для ссылки а для msql в файле list  хеш останется #links/plavknieki 
  
  }

  else if ( link.includes("lists")) {
    link = "lists";  // оставит только lists для ссылки а для msql в файле list  хеш останется #links/plavknieki 
  }

  else if ( link.includes("models")) {
   link = "models";// оставит только models для ссылки а для msql в файле list  хеш останется #links/plavknieki 
  }


 
 
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
 





