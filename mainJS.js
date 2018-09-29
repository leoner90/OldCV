//Can't be done through css , because of "display inline-block" ,
//jquery save "display property" in cache and restore it later!
$('.lv-language , .rus-language').hide(0);
//PAGE ONLOAD FUNCTIONS
$(window).on('load', function() {
  get_age();
  preloader(500,500,500);
  check_cookie();
  $('#footer').delay(1000).animate({opacity: '1'}, 1500);
})
//PAGE PRELOADER
function preloader(fade_out_time , delay_time , hide_time){ 
  $('.spinner').fadeOut(fade_out_time);
  $('#left-preloader').delay(delay_time).animate({left: '-50%'}, hide_time);
  $('#right-preloader').delay(delay_time).animate({right: '-50%'}, hide_time , function(){
    $('#left-preloader').css({'left': '0'});
    $('#right-preloader').css({'right': '0'});
    $('#page-preloader').hide();
  })
  $(window).scrollTop(0);
}
//COOKIE CHECK
function check_cookie(){
  //onload change language 
  var language = get_cookie('language');
  if (language == ''){
    language = '.eng-language';
  }
  change_language(language);
  // onload sorting education & work
  var education_sorting = get_cookie('.Education');
  if (education_sorting == 'sorted'){
    sorting('.Education');
  }
  var work_sorting = get_cookie('.work');
  if (work_sorting == 'sorted'){
    sorting('.work');
  }
  //onload - was or wasn't cookie agreed
  var cookie_agreed = get_cookie('cookies');
  if (cookie_agreed == 'agreed'){
      $('#cookies-msg').html('&#169; 2018');  
  }
}
//COOKIES AGREED ONCLICK FUNCTION
$( "#cookies-btn" ).click(function() {
  $('#cookies-msg').hide('slow',function(){
    $('#cookies-msg').html('&#169; 2018').show('slow');
  })
  set_cookie('cookies' ,'agreed');
})
// SET COOKIES
function set_cookie(name , value){
  var date = new Date;
  date.setDate(date.getDate() + 1); // today + 1 day
  document.cookie = name + '=' + value + ';' + ';path=/; expires=' + date.toUTCString();
}
//CHECK WAS OR WASN'T COOKIE SET
function get_cookie(name){
  var name = name + '=';
  var decodedCookie = decodeURIComponent(document.cookie);
  // breaks up into array cells every time it encounters ';' symbol in line
  var splitedCookie = decodedCookie.split(';'); 
  for(var i = 0; i < splitedCookie.length ; i++) {
    var c = splitedCookie[i];
    //removing spaces
    while (c.charAt(0) == ' '){ // checks the first character if it is empty
      c = c.substring(1);  // then removes it and checks again
    }
   // if the index name in this cell of the array = 0 then // if not then repeat, if nothing finds that return ""
    if (c.indexOf(name) == 0){
      // return a string where the entry point is the end of the length name and the end point is the length c of this array cell
      return c.substring(name.length, c.length); 
    } 
  }
  return ''; 
}
//GET CLASSNAME FROM LANGUAGE-IMG TO CHANGE LANGUAGE FUNCTION
$( "#rus-language-img , #eng-language-img , #lv-language-img" ).click(function() {
  var classname = '.' + this.id.replace('-img','');
  $('.spinner ,#page-preloader').show(0);
  preloader(750,750,500);
  change_language(classname);
  set_cookie('language' , classname);
})
//CHANGE LANGUAGE FUNCTION
function change_language(language) {
  $('.eng-language , .lv-language , .rus-language').hide(0);
  $(language).show(0);
}
//SCROLL TOP BY IMG CLICKING
$( "#scroll-top-img" ).click(function() {
  $(window).scrollTop(0);
})
// SET ID AND ONCLICK EVENT , ALSO SET 1 SEK DELAY BEFORE SECOND USE , TO AVOID STYLE JUMPING
set_id_and_sorting_event('#sort-education-img');
set_id_and_sorting_event('#sort-work-img');
function set_id_and_sorting_event (id){
  $(id).on({ 'click' : 
    function(){  
      if (id == '#sort-work-img'){
        sorting('.work');
      }
      else {
        sorting('.Education');  
      } 
      $(id).off('click');
      setTimeout(function(){ set_id_and_sorting_event(id); }, 1000);    
    } 
  })
}
//SORT & UNSORT EDUCATION AND WORK PARTITIONS
function sorting(sortItem){
  var length = $( "div"+sortItem ).length;
  for (var i = 1; i <= length; i++){
    $(sortItem+":last-child ").animate({opacity:'0'}, 0).insertBefore(sortItem+':nth-child('+i+')').animate({opacity: '1'}, 1000);
  }
  //set cookies for sorting
  $(sortItem).toggleClass('sorted');
  if ($(sortItem).is('.sorted') ){
    set_cookie(sortItem , 'sorted');
  }
  else {
    document.cookie = sortItem+'=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  }
}
// GET AGE FUNCTION
function get_age(){
  var birthday = {date:20, month:10, year:1990};
  var d = new Date();
  var year = d.getFullYear();
  var month = d.getMonth() +1;
  var day = d.getDate();
  var age = year - birthday['year'];
  if (month < birthday['month']){
     $('#age').text(age - 1);  
  }
  else if ((month ==  birthday['month']) &&  (day <  birthday['date'])){ 
    $('#age').text(age - 1); 
  }
  else { 
    $('#age').text(age); 
  }
}

// POP UP PARTITION-->
//EMAIL POP-UP SHOW FUNCTION
$( "#pop-up-button" ).click(function() {
   $('#email-PopUp').show(200 , function(){
    scale_captcha();
  })
})
//EMAIL POP-UP HIDE (by x button)
$( "#x-button" ).click(function() {
   $('#email-PopUp').hide(250);
})
//EMAIL POP-UP HIDE (by esc button)
$(document).keyup(function(e){
  if (e.keyCode === 27 ){
    $('#email-PopUp').hide(250);
  } 
})
//REMOVE ERROR STYLE CLASS ON FOCUS
$('.email , #email-msg ').focus(function(){
  $(this).removeClass('field-err');
});
// SEND AND CHECK MAIL FUNCTION
$('#send-mail-btn' ).click(function(event){
  event.preventDefault();
  var count_down;
  $('#PopUp-content').css('opacity','0');
  $('.spinner').fadeIn(100);
  $('#msg-err , #email-err , #captcha-err').css('visibility' , 'hidden');
  $('#timing-err , #success-msg').hide();
  var email = $('.email').val(); 
  var message = $('#email-msg').val();
  $.post('sendMail.php',{email:email , message:message ,captcha: grecaptcha.getResponse() },function(data){ 
    // in case of success  
    if (data === ''){  
      $('#success-msg').show(0).delay(4000).fadeOut(5000);
      $('#email-PopUp').scrollTop(0);
      $('.email , #email-msg').val(''); 
      grecaptcha.reset();
    }
    // in case of errors
    else { 
      var errors = JSON.parse(data);
      $('#email-PopUp').scrollTop(0);
      grecaptcha.reset();
      if (errors.includes('e-mail-Err')){  
        $('.email').addClass('field-err'); 
        $('#email-err').css('visibility' , 'visible');
      }
      if ( errors.includes('message-Err')){  
        $('#email-msg').addClass('field-err'); 
        $('#msg-err').css('visibility' , 'visible');
      }
      if ( errors.includes('captcha-Err')){  
        $('#captcha-err').css('visibility' , 'visible');     
      }
      if ( errors.includes('timing-Err')){  
        $('#timing-err').show(0);
        time_left = errors[errors.length - 1]; // last error if exist is time left till send next msg
        $('#time-left').html(time_left + ' Seconds Left');
        $('#send-mail-btn').attr("disabled", "disabled");
        count_down = setInterval(function() {
          time_left-- ;
          $('#time-left').show().html(time_left + ' Seconds Left');
          if (time_left <= 0) {
            clearInterval(count_down);
            $('#timing-err').slideUp();
            $('#send-mail-btn').removeAttr("disabled");  
            $('#time-left').slideUp();
          }
        }, 1000);
      }
    }         
  })
  // unset interval count down, if exist! (work only with some event handler)
  $(document).ajaxStart(function(){
    window.clearInterval(count_down);
  });
  // preloader for email pop up
  $(document).ajaxComplete(function() {
    $('.spinner').fadeOut(250);
    $('#PopUp-content').delay(250).animate({opacity: '1'}, 250);
  })
})
//CALCULATE THE SCALE OF CAPTCHA AND ITS CONTAINER FOR CORRECT WIDTH
function scale_captcha(elementWidth){
  var reCaptchaWidth = 304;
  var containerWidth = $('.container-for-g-recaptcha').width();
  if(reCaptchaWidth > containerWidth) {
    // calculate the scale
    var captchaScale = containerWidth / reCaptchaWidth;
    // apply the transformation
    $('.g-recaptcha').css({
      'transform':'scale('+captchaScale+')'
    })
  }
  //delete empty string after scaling
  var myheight = $('#captchaHeightAfterScale')[0].getBoundingClientRect().height;
  $( '.container-for-g-recaptcha' ).height(myheight);
  mywidth = $('.container-for-g-recaptcha')[0].getBoundingClientRect().width;
  $('#captcha-err').width(mywidth);
}
// CALL SCALE CAPTCHA FUNCTION ON WINDOW RESIZE
$(window).resize(function(){ scale_captcha();})