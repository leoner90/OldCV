<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>CV</title>
  <link rel="shortcut icon" type="image/png" href="favicon.ico">
  <!-- meta tag for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google captcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!-- bootstrap css CDN-->
  <link  rel="stylesheet" href="LibrariesAndFrameworks/bootstrap.min.css">
  <!-- My css file -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Awesome icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<!-- Page preloader -->
<div id="page-preloader">
  <div class="spinner"></div>
  <div id="left-preloader"></div>
  <div id="right-preloader"></div>  
</div>
<div class="container-fluid"> 
  <div class="row row-eq-height">
    <!-- LEFT SIDEBAR -->
    <div id="left-sidebar" class="col-xs-1"></div>
    <!-- LEFT MAIN BAR-->
    <div id="left-content-bar" class="col-xs-4 col-sm-3  col-md-2 ">
      <!--  Name and photo section -->
      <div class="row">
        <div class="col-xs-12 left-bar-row-without-bg" >
          <img id="avatarImg" class="img-responsive" src="img/avatar.png" alt="avatar">
          <h1 class="text-center eng-language font-OleoScript name-section"> Leonids Gurockins </h1>  
          <h1 class="text-center rus-language  font-Lobster name-section"> Леонид Гурочкин </h1> 
          <h1 class="text-center lv-language font-Lobster name-section"> Leonīds Guročkins </h1> 
          <div id="curved"></div>
          <div class="text-center font-Lobster">
            <h2 class="eng-language occupation-section"> Junior web developer </h2>
            <h2 class="rus-language occupation-section"> Начинающий веб разработчик </h2>
            <h2 class="lv-language occupation-section"> Jaunākais web izstrādātājs </h2>
          </div>
        </div>
      </div>
      <!-- Info section -->
      <div class="row">
        <div class="col-xs-12 left-bar-row-with-bg">
          <div class="left-bar-info-row"> 
            <span class="glyphicon glyphicon-user"></span> 
            <span class="eng-language" > AGE &nbsp </span>
            <span class="rus-language"> ВОЗРАСТ &nbsp </span>
            <span class="lv-language"> VECUMS &nbsp </span>
            <span id="age"><!-- Throught js function --></span>
          </div>    
          <div class="left-bar-info-row" >   
            <span class="glyphicon glyphicon-envelope"></span> 
            <span class="eng-language "> E-MAIL </span>
            <span class="rus-language "> Э-ПОЧТА </span>
            <span class="lv-language "> E-PASTS </span>
            <button id="pop-up-button" type="button" class="btn-xs btn-info">
              <span class="eng-language"> CONTACT NOW </span>
              <span class="rus-language "> СВЯЗАТЬСЯ </span>
              <span class="lv-language"> SAZINIETIES </span>
            </button>
            <p> <small>leonid.gurockin@gmail.com</small> </p>
          </div> 
          <div class="left-bar-info-row" > 
            <i class="fab fa-skype"></i> 
            <span> SKYPE </span>
            <p> leonid.90 </p>
          </div> 
          <div class="left-bar-info-row" >  
            <span class="glyphicon  glyphicon-phone"></span> 
            <span class="eng-language"> PHONE NUMBER </span>
            <span class="rus-language "> НОМЕР ТЕЛЕФОНА </span>
            <span class="lv-language"> TELEFONA NUMURS </span>
            <p>07591493281</p>
          </div>       
          <div id="address-row"> 
            <span class="glyphicon glyphicon-pushpin"></span> 
            <span class="eng-language"> ADDRESS </span>
            <span class="rus-language"> АДРЕС </span>
            <span class="lv-language"> ADRESE </span>
            <div class="row">
              <div class="col-xs-12 col-sm-7">
                <p id="address-section"> 23 Riddell Court <br> Sheader Drive <br> Salford <br> M5 5BW </p>     
              </div>
              <div class="col-xs-12 col-sm-4">
                <a target="_blank" href="https://www.google.co.uk/maps/search/23+Riddell+Court+m55bw/@53.4830625,-2.3131082,17z/data=!3m1!4b1">
                  <img id="google-img" class="img-responsive"  src="img/google-maps-logo.png" alt="googleImg">
                </a>
              </div> 
              <div class="col-xs-1"></div>   
            </div>   
          </div>     
        </div>
      </div> 
      <!-- Languages section -->
      <div class="row" > 
        <div class="col-xs-12 left-bar-row-without-bg"> 
          <div class="left-row-tittles"> 
            <img  class="img-responsive" src="img/language-icon.png" alt="language-icon">           
            <h4 class="eng-language left-row-tittles-text"> LANGUAGES </h4>
            <h4 class="rus-language left-row-tittles-text"> ЯЗЫКИ </h4>
            <h4 class="lv-language  left-row-tittles-text"> VALODAS </h4>
          </div>      
          <p class="eng-language "> Russian: </p>
          <p class="rus-language "> Русский: </p>
          <p class="lv-language "> Krievu: </p>
          <div class="rating-section rating-50"></div>
          <p class="eng-language"> Latvian: </p>
          <p class="rus-language "> Латышский: </p>
          <p class="lv-language "> Latviešu: </p>   
          <div class="rating-section rating-30"></div>
          <p class="eng-language "> English: </p>
          <p class="rus-language "> Английский: </p>
          <p class="lv-language "> Angļu: </p>    
          <div class="rating-section rating-30"></div>
          <p class="eng-language "> Polish: </p>
          <p class="rus-language "> Польский: </p>
          <p class="lv-language "> Poļu: </p>  
          <div class="rating-section rating-10"></div>    
        </div>
      </div>   
      <!-- Skills section -->
      <div class="row"> 
        <div class="col-xs-12 left-bar-row-with-bg">
          <div class="left-row-tittles"> 
            <img  class="img-responsive" src="img/skills.png" alt="skills-img">           
            <h4 class="eng-language  left-row-tittles-text"> SKILLS </h4>
            <h4 class="rus-language  left-row-tittles-text"> НАВЫКИ </h4>
            <h4 class="lv-language   left-row-tittles-text"> PRASMES </h4>
          </div>  
          <div id="skills-section">   
            <p> HTML / BOOTSTRAP  </p>
            <div class="rating-section rating-40"></div>
            <p>  CSS / SASS </p>
            <div class="rating-section rating-40"></div>
            <p>  JS / JQUERY</p>
            <div class="rating-section rating-30"></div>
            <p> PHP / MSQL </p>
            <div class="rating-section rating-30"></div>
            <p> ANGULAR  </p>
            <div class="rating-section rating-20"></div>
          </div>
        </div>
      </div>
      <!-- PC skills Section -->
      <div class="row" > 
        <div class="col-xs-12 left-bar-row-without-bg">
          <div class="left-row-tittles"> 
            <img  class="img-responsive" src="img/pc-skills-icon.png" alt="language-icon">           
            <h4 class="eng-language  left-row-tittles-text"> PC SKILLS </h4>
            <h4 class="rus-language  left-row-tittles-text"> ПК НАВЫКИ </h4>
            <h4 class="lv-language   left-row-tittles-text"> PC PRASMES</h4>
          </div> 
          <div id="pc-skills-section ">
            <p> Mrs. Office</p>
            <div class="rating-section rating-40"></div>
            <p class="eng-language"> Office devices </p>
            <p class="rus-language"> Офисные устройства</p>
            <p class="lv-language">  Biroja ierīces  </p>     
            <div class="rating-section rating-40"></div>
          </div>
        </div>
      </div> 
    </div>
    <!-- RGIHT MAIN BAR-->
    <div id="right-content-bar" class="col-xs-6 col-sm-7 col-md-8 ">
      <!-- About me section -->
      <div class="row">
        <div id="aboutMe-tittle" class="col right-row-tittles ">  
          <img id="aboutMe-tittle-img" src="img/aboutMe.png" alt="aboutMeImg">
          <h3 class="eng-language right-row-tittles-text">ABOUT ME</h3>
          <h3 class="rus-language right-row-tittles-text">ОБО МНЕ</h3>
          <h3 class="lv-language right-row-tittles-text">PAR MANI</h3>
        </div>
      </div>
      <div class="row">
        <div class="col right-bar-rows">
          <span class="glyphicon glyphicon-user"></span>
          <h5 class="eng-language description-section-title"> About me: </h5>  
          <p class="eng-language">
            Originally i'm from Latvia but right now I live and work in uk (5 years in UK).<br>
            I like programming - it's one of my favorite hobbies , also I like playing volleyball,  playing the guitar and going to gym !
          </p>    
          <h5 class="rus-language  description-section-title"> Обо мне: </h5>
          <p class="rus-language ">
            Изначально я из Латвии, но сейчас я живу и работаю в Великобритании (5 лет в Великобритании).<br>
            Мне нравится программирование - это одно из моих любимых увлечений, также мне нравится играть в волейбол, играть на гитаре и ходить в спортзал!
          </p>      
          <h5 class="lv-language description-section-title"> Par mani: </h5>            
          <p class="lv-language"> 
            Sākotnēji es esmu no Latvijas, bet tagad es dzīvoju un strādāju Lielbritānijā (5 gadi Lielbritānijā).<br>
            Man patīk programmēšana - tas ir viens no maniem mīļākajiem hobijiem, arī man patīk spēlēt volejbolu , spelet ģitāru un iet uz sporta zāli!
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col right-bar-rows">
          <span class="glyphicon glyphicon-user"></span>
          <h5 class="eng-language description-section-title"> Personal qualities:</h5>
          <p class="eng-language">
            Purposeful, cheerful, responsible , sociable , fast learner, willing to learn stress resistance.
          </p>
          <h5 class="rus-language  description-section-title">Личные качества</h5>
          <p class="rus-language "> 
            Целеустремлённый, жизнерадостный, ответственный, общительный, быстро учусь, желание учиться , стрессово устойчивый.
          </p>
          <h5 class="lv-language description-section-title">Personiskās īpašības</h5>
          <p class="lv-language"> 
            Mērķtiecīgs, jautrs, atbildīgs, sabiedrisks, ātri mācos, velme mācīties , izturīgs pret stresu. 
          </p> 
        </div>
      </div>
      <div class="row">
        <div class="col right-bar-rows">
          <span class="glyphicon glyphicon-user"></span> 
          <h5 class="eng-language description-section-title"> All UK documents: </h5>
          <p class="eng-language"> National Insurance , EU Passport , Proof Of Address </p>
          <h5 class="rus-language  description-section-title">Все документы в Великобритании: </h5>
          <p class="rus-language "> Национальное страховка, паспорт ЕС, подтверждение адреса </p>
          <h5 class="lv-language description-section-title"> Visi Lielbritānijas dokumenti: </h5>
          <p class = "lv-language"> Nacionālā apdrošināšana, ES pase, adreses apliecinājums </p>
        </div>  
      </div> 
      <div class="row">
        <div class="col right-bar-rows">  
          <span class="glyphicon glyphicon-user"></span>    
          <h5 class="eng-language description-section-title">  My own car:</h5>
          <p class="eng-language">
            UK "B" category licence ~ 3 years. (Clean)<br>
            A lot of experience of bus driving and parking (unfortunately only B category licence). 
          </p> 
          <h5 class="rus-language  description-section-title">Cобственный автомобиль:</h5>   
          <p class="rus-language ">
            Лицензия UK "B" категория  ~ 3 года. (Чистая)<br>
            Большой опыт вождения и парковки автобусов (к сожалению, только лицензия категории B). 
          </p>         
          <h5 class="lv-language description-section-title">Sava automašīna:</h5>
          <p class="lv-language">
            UK kategorija "B" ~ 3 gadi. (Tīrs) <br>
            Liela pieredze autobusu vadīšanā un parkošana (diemžēl tikai B kategorijas licence).  
          </p>      
        </div>  
      </div>
      <!-- Education Section -->
      <div class="row">
        <div class="col right-row-tittles">  
          <img id="education-tittle-img" src="img/education-icon.png" alt="educationImg"> 
          <h3 class="eng-language right-row-tittles-text">Education</h3> 
          <h3 class="rus-language right-row-tittles-text" >Образование</h3> 
          <h3 class="lv-language right-row-tittles-text" >Izglītība</h3>
          <img id="sort-education-img" data-toggle="tooltip" title="SEQUENCE CHANGE!"  src="img/sort-icon.png" alt="sortEducationImg">
        </div>
      </div>
      <div class="wrapper-for-sorting">
        <div class="row Education">
          <div class="col right-bar-rows">   
            <span class="glyphicon glyphicon-education"></span> 
            <h5 class="eng-language description-section-title"> Self education | 10.2017 - till now</h5> 
            <h5 class="rus-language description-section-title"> Самообразование | 10.2017 - по настоящее время </h5> 
            <h5 class="lv-language  description-section-title"> Pašizglītība | 10.2017 - līdz šim brīdim</h5>   
            <p> Html, Bootstrap, Css, Sass, Git, Js, Ajax, Jquery, Json , Php, Mysql</p>
          </div>
        </div>
        <div class="row  Education">
          <div class="col right-bar-rows"> 
            <span class="glyphicon glyphicon-education"></span>     
            <h5 class="eng-language description-section-title">Riga State Technical School | 2007 – 2011</h5>
            <p class="eng-language"> Middle special education - Accountant </p>  
            <h5 class="rus-language  description-section-title">Рижский Технический Коледж | 2007 – 2011 </h5>
            <p class="rus-language "> Среднее специальное образование - Бухгалтер. </p>      
            <h5 class="lv-language description-section-title"> Rīgas Tehniskā Koledža | 2007 – 2011 </h5>
            <p class="lv-language"> Vidējā speciālās izglītības -  Grāmatvedis. </p> 
          </div>
        </div> 
        <div class="row Education">
          <div class="col right-bar-rows"> 
            <span class="glyphicon glyphicon-education"></span>    
            <h5 class="eng-language description-section-title"> 92 public school | 1998 – 2007 </h5>
            <p class="eng-language">Primary education</p>   
            <h5 class="rus-language  description-section-title" >92 средняя школа | 1998 – 2007 </h5>
            <p class="rus-language ">Начальное образование</p>
            <h5 class="lv-language description-section-title"> 92 vidusskola | 1998 – 2007 </h5>
            <p class="lv-language">Pamatizglītība</p>     
          </div>
        </div>
      </div>
      <!-- Work experience section -->
      <div class="row">
        <div class="col right-row-tittles">  
          <img  id="work-tittle-img" src="img/work-expirience-icon.png" alt="workImg"> 
          <h3 class="eng-language right-row-tittles-text">WORK </h3> 
          <h3 class="rus-language right-row-tittles-text">ОПЫТ РАБОТЫ</h3> 
          <h3 class="lv-language right-row-tittles-text">DARBA PIEREDZE</h3>
          <img id="sort-work-img" data-toggle="tooltip" title="SEQUENCE CHANGE!" src="img/sort-icon.png" alt="sortWorkImg">
        </div>
      </div>
      <div class="wrapper-for-sorting">
        <div class="row work right-bar-rows">
          <div class="col"> 
            <span class="glyphicon glyphicon-briefcase"></span>
            <h5 class="eng-language description-section-title">  
              Diamond Bus North West (Manchester) | 05. 2019 – till now.
            </h5>
            <p class="eng-language"> Bus Shunter (driving / parking)</p> 
            <h5 class="rus-language  description-section-title ">
              Diamond Bus North West (Manchester)  | 05. 2019 – по настоящее время.
            </h5>
            <p class="rus-language"> Подгонщик / Парковщик автобусов </p>
            <h5 class="lv-language description-section-title">
              Diamond Bus North West (Manchester) | 05. 2019 – līdz šim brīdim.
            </h5>                          
            <p class="lv-language" >Autobusu parkotajs.</p> 
            <p><a target="_blank" href="https://www.diamondbuses.com/north-west/">https://www.diamondbuses.com/north-west/</a></p>
          </div>
        </div>
        <div class="row work right-bar-rows">
          <div class="col"> 
            <span class="glyphicon glyphicon-briefcase"></span>
            <h5 class="eng-language description-section-title">  
              NATIONWIDE  | 01. 2018 – 05. 2019  ( Part time , 3 days per week ) .
            </h5>
            <p class="eng-language"> Bus Shunter (driving / parking)- "RATP GROUP" garage (Epsom).</p> 
            <h5 class="rus-language  description-section-title ">
              NATIONWIDE  | 01. 2018 – 05. 2019(неполная занятость 3 дня в неделю).
            </h5>
            <p class="rus-language"> Подгонщик / Парковщик автобусов - гараж "RATP GROUP" (Epsom).</p>
            <h5 class="lv-language description-section-title">
              NATIONWIDE  | 01. 2018 – 05. 2019 (nepilna slodze 3 dienas nedēlā).
            </h5>                          
            <p class="lv-language" >Autobusu parkotajs - "RATP GROUP" garāža (Epsom).</p> 
            <p><a target="_blank" href="http://www.nationwidefm.com">www.nationwidefm.com </a></p>
            <p><a target="_blank" href="http://www.ratpdevlondon.co.uk">www.ratpdevlondon.co.uk</a></p>
          </div>
        </div>
        <div class="row work right-bar-rows">
          <div class="col"> 
            <h5 class="description-section-title">
              <span class="glyphicon glyphicon-briefcase"></span>
              STAGECOACH  | 04. 2017 -10. 2017
            </h5> 
            <p class="eng-language"> Bus Shunter (driving / parking)- Guildford garage.</p> 
            <p class="rus-language"> Подгонщик / Парковщик автобусов - гараж в Guildford .</p> 
            <p class="lv-language"> Autobusu parkotajs - Guildford garāžā. </p> 
            <p><a target="_blank" href="https://www.stagecoachbus.com">www.stagecoachbus.com</a></p>
          </div>
        </div>
        <div class="row work right-bar-rows">
          <div class="col"> 
            <h5 class="description-section-title">
              <span class="glyphicon glyphicon-briefcase"></span>
              NATIONWIDE: | 10. 2013 – 04. 2017 
            </h5>
            <p class="eng-language">
              "Epsom Coaches Group" garage (RATP GROUP now).<br>
              Cleaning : Bus cleaning inside and outside  – 5 months. <br>
              Fueller: Diesel refueling – 1 year 7 months <br>
              Bus Shunter: (driving / parking) - 1 year 6 months 
            </p>
            <p class="rus-language ">
              Гараж "Epsom Coaches Group" (теперь "RATP GROUP").<br>
              Уборка: Чистка автобусов внутри и снаружи - 5 месяцев.<br>
              Заправщик: Заправка дизельным топливом - 1 год 7 месяцев<br>
              Парковщик автобусов: (вождение / парковка) - 1 год 6 месяцев
            </p>     
            <p class="lv-language">
              "Epsom Coaches Group" garāžā (tagad "RATP GROUP").<br>
              Tīrīšana: autobusu tīrīšana iekšpusē un ārpusē - 5 mēneši. <br>
              Uzpildītajs: Dīzeļdegvielas uzpildīšana - 1 gads 7 mēneši. <br>
              Autobusa parkotajs: (braukšana / parkošana) - 1 gads 6 mēneši. 
            </p>       
            <p><a target="_blank" href="http://www.nationwidefm.com">www.nationwidefm.com </a></p>
            <p><a target="_blank" href="http://www.ratpdevlondon.co.uk">www.ratpdevlondon.co.uk</a></p>
            <p><a target="_blank" href="http://online.epsomcoaches.com">www.online.epsomcoaches.com</a></p>
          </div>
        </div>
        <div class="row work right-bar-rows">
          <div class="col"> 
            <h5 class="description-section-title">
              <span class="glyphicon glyphicon-briefcase" ></span>
              APDRUKASBODE: | 12. 2012 – 08. 2013 
            </h5>
            <p class="eng-language">
              Work with customers , selling photo accessories.<br>
              Responsible  for whole shop . 
            </p>
            <p class="rus-language ">
              Работа с клиентами, продажа аксессуаров для фото.<br>
              Ответственный за весь магазин.
            </p>      
            <p class="lv-language">
              Darbs ar klientiem, pārdodot foto aksesuārus.<br>
              Atbildīgs par visu veikalu.
            </p>       
            <p><a target="_blank" href="http://www.1apdrukasbode.lv">www.1apdrukasbode.lv</a></p>
          </div>
        </div>
        <div class="row work right-bar-rows">
          <div class="col"> 
            <span class="glyphicon glyphicon-briefcase"></span>
            <h5 class="eng-language description-section-title">PROGRAMMING  | 08. 2012 - 10. 2012 </h5>
            <p class="eng-language"> Some experience in Html , Css , Javascript.</p>  
            <h5 class="rus-language  description-section-title">ПРОГРАМИРОВАНИЕ  | 08. 2012 - 10. 2012 </h5>
            <p class="rus-language "> Некоторый опыт работы с Html, Css, Javascript.</p>  
            <h5 class="lv-language description-section-title">PROGRAMISTS  | 08. 2012 - 10. 2012 </h5>
            <p class="lv-language" > Daži pieredze Html, Css, Javascript. </p>                 
          </div>
        </div>
        <div class="row work right-bar-rows">
          <div class="col"> 
            <h5 class="description-section-title">
              <span class="glyphicon glyphicon-briefcase"></span>
              SIA KRUZA: | 09. 2011 – 08. 2012 
            </h5>
            <p class="eng-language">
              Work with customers , invoice preparation, regulation of prices.<br>
              Responsible for whole online Store <br>
              (Building material shop.)
            </p>
            <p class="rus-language ">
              Работа с клиентами, подготовка счетов, регулирование цен.<br>
              Ответственный за весь интернет-магазин<br>
              (Магазин строительных материалов.)
            </p>
            <p class="lv-language">
              Darbs ar klientiem, rēķinu sagatavošana, cenu regulēšana.<br>
              Atbildīgs par visu tiešsaistes veikalu <br>
              (Būvmateriālu veikals.)
            </p>       
            <p><a target="_blank" href="http://kruza.lv">www.kruza.lv </a></p>
            <p><a target="_blank" href="http://amurs.lv">www.amurs.lv </a> </p>
          </div>
        </div>
      </div>
      <!-- Portfolio section -->
      <div class="row">
        <div class="col right-row-tittles">  
          <img id="portfolio-tittle-img" src="img/portfolio-icon.png" alt="portfolio-icon">  
          <h3 class="eng-language right-row-tittles-text">PORTFOLIO</h3> 
          <h3 class="rus-language right-row-tittles-text" >ПОРТФОЛИО</h3> 
          <h3 class="lv-language  right-row-tittles-text" >PORTFOLIO</h3>
        </div>
      </div>
      <div class="row , right-bar-rows , row-eq-height , portfolio-section ">
        <div class="col-xs-12 col-sm-2 portfolio-borders"> 
          <a  href="portfolio/sushi/" target="_blank"> 
            <img  class="img-responsive portfolio-img" src="img/sushi.png" alt="portfolioImg">  
          </a>
          <a  href="portfolio/sushi/" target="_blank">
            <span class="eng-language portfolio-links"> Sushi link </span> 
            <span class="rus-language portfolio-links"> Sushi ссылка </span> 
            <span class="lv-language  portfolio-links"> Sushi saite </span> 
          </a> 
        </div>
        <div class="col-xs-12 col-sm-4 vertical-align portfolio-borders">    
          <h4 class="eng-language portfolio-text-tittle"> About:</h4>  
          <p class="eng-language"> 
            Order sushi online <br> 
            Ajax navigation and basket load<br> 
            Autorisation (change avatar) <br> 
            Pay by card or cash <br>
            Card test :<br>
            (4242 4242 4242 4242)(Stripe).
          </p>
          <h4 class="rus-language portfolio-text-tittle"> О Cайте:</h4>
          <p class="rus-language ">
            Заказ суши онлайн<br> 
            Ajax навигация и загрузка корзины<br>
            Авторизация (смена аватара  )<br>
            Оплата картой или наличными<br> 
            Тестовая карта :<br>
            (4242 4242 4242 4242)(Stripe).
          </p>
          <h4 class="lv-language tportfolio-text-tittle"> Par:</h4>
          <p class="lv-language">
            Suši pasūtīšana tiešsaistē <br> 
            Ajax navigācija un grozu ielāde <br> 
            Autorizācija (lietotāja attēla maiņa) <br> 
            Maksājums ar karti vai skaidrā naudā <br> 
            Testa karte :<br>
            (4242 4242 4242 4242)(Stripe).
          </p>
        </div>
        <div class="col-xs-12 col-sm-3 vertical-align portfolio-borders">  
          <h4 class="portfolio-text-tittle"> Pull </h4>
          <p>https://github.com/leoner90/sushi.git</p>
        </div>
        <div class="col-xs-12 col-sm-3 vertical-align download-zip"> 
          <h4 class="eng-language portfolio-text-tittle"> Or:</h4> 
          <p class="eng-language">Download code zip:</p>
          <h4 class="rus-language portfolio-text-tittle"> Или:</h4>
          <p class="rus-language"> Загрузить код zip:</p>
          <h4 class="lv-language portfolio-text-tittle"> Vai:</h4> 
          <p class="lv-language"> lejupielādējiet kodu zip: </p>  
          <a href="../files/sushi.zip" download> sushi.zip</a> 
        </div>
      </div> <!-- end of first portfolio -->
      <div class="row , right-bar-rows , row-eq-height , portfolio-section ">
        <div class="col-xs-12 col-sm-2 portfolio-borders "> 
          <a href="portfolio/carfix/" target="_blank"> 
            <img  class="img-responsive portfolio-img" src="img/carfix.png" alt="portfolioImg">  
          </a>
          <a  href="portfolio/carfix/" target="_blank">
            <span class="eng-language portfolio-links">CarFix link </span> 
            <span class="rus-language portfolio-links">CarFix ссылка </span> 
            <span class="lv-language  portfolio-links"> CarFix saite </span> 
          </a> 
        </div>
        <div class="col-xs-12 col-sm-4 vertical-align portfolio-borders">    
          <h4 class="eng-language portfolio-text-tittle"> About:</h4>  
          <p class="eng-language"> 
            Car repair services.<br> 
            M.O.T. online booking.<br> 
            AngularJs navigation and Animation.
          </p>
          <h4 class="rus-language  portfolio-text-tittle"> О Cайте:</h4>
          <p class="rus-language ">
            Услуги по ремонту автомобилей<br> 
            М.О.Т. онлайн-бронирование<br> 
            AngularJs навигация и Анимация.
          </p>
          <h4 class="lv-language portfolio-text-tittle"> Par:</h4>
          <p class="lv-language">
            Mehānisko transportlīdzekļu remonta pakalpojumi<br> 
            М.О.Т. tiešsaistes rezervēšana<br> 
            AngularJs Navigācija un Animācija.

          </p>
        </div>
        <div class="col-xs-12 col-sm-3 vertical-align portfolio-borders">  
          <h4 class="portfolio-text-tittle">Pull </h4>
           <p>https://github.com/leoner90/carfix.git </p>
        </div>
        <div class="col-xs-12 col-sm-3 vertical-align download-zip"> 
          <h4 class="eng-language portfolio-text-tittle"> Or:</h4> 
          <p class="eng-language"> Download code zip:</p>
          <h4 class="rus-language portfolio-text-tittle"> Или:</h4>
          <p class="rus-language"> Загрузить код zip:</p>
          <h4 class="lv-language portfolio-text-tittle"> Vai:</h4> 
          <p class="lv-language"> lejupielādēt kodu zip: </p>  
          <a href="../files/carfix.zip" download> Carfix.zip</a> 
        </div>
      </div>
    </div>
    <!-- RIGHT SIDEBAR -->
    <div id="right-sidebar" class="col-xs-1">
      <div id="fixed-bar" >
        <div id="download-pdf-container">    
          <a href="files/cv.pdf" download > 
          <img id="download-pdf-img" class="img-responsive"  src="img/pdf-download-icon.png" alt="pdf-icon"> 
          </a>   
        </div> 
        <div class="change-eng-and-rus-language-container"> 
          <img id="rus-language-img" class="img-responsive" src="img/russia-flag.png" alt="LanguageChange"> 
        </div>
        <div class="change-eng-and-rus-language-container"> 
          <img id="eng-language-img" class="img-responsive" src="img/english-flag.png" alt="LanguageChange">
        </div>
        <div id="change-lv-language-container" > 
          <img id="lv-language-img" class="img-responsive" src="img/latvia-flag.png" alt="LanguageChange" >
        </div>
        <div id="scroll-top-container" > 
          <img id="scroll-top-img" class="img-responsive"  src="img/back-to-top.png" alt="Scroll top"> 
        </div> 
      </div>
    </div>
  </div> <!-- end of main row -->
</div> <!-- end of container fluid -->
<!-- FOOTER -->
<footer id="footer">
  <div id="cookies-msg" class="table-vertical-align">
    <span class="eng-language"> COOKIES IN USE ! </span> 
    <span class="rus-language "> МЫ ИСПОЛЬЗУЕМ ФАЙЛЫ COOKIE</span> 
    <span class="lv-language"> MĒS IZMANTOJAM SĪKDATNES </span> 
    <button id="cookies-btn" class="btn-success btn-xs"> OK</button>
  </div>
</footer>
 <!-- POP UP / SEND MAIL FORM-->
<div id="email-PopUp" >
  <div id="PopUp-wrapper">
    <div id="x-button" class="text-right">X</div>
    <div class="spinner"></div>
    <div id="PopUp-content">
      <h4 class="eng-language  send-mail-tittle"> SEND EMAIL </h4>
      <h4 class="rus-language  send-mail-tittle "> ОТПРАВИТЬ EMAIL </h4>
      <h4 class="lv-language   send-mail-tittle"> SŪTĪT E-PASTU </h4>
      <div id="success-msg">
        <img id="success-img" src="img/success-msg.png" alt="Error">
        <span class="eng-language"> MAIL SENDED ! </span>
        <span class="rus-language"> СООБЩЕНИЕ ОТПРАВЛЕНО! </span>
        <span class="lv-language"> E-PASTS NOSŪTĪTS! </span>
      </div>
      <form>
        <div id="timing-err">
          <img id="timing-err-img" src="img/timingErr.png">
          <span class="eng-language"> Not more than one e-mail per minute! </span>
          <span class="rus-language"> Не более одного письма в минуту! </span>
          <span class="lv-language"> Ne vairāk kā viens e-pasts minūtē! </span>
          
        </div>
        <div id="email-err">
          <img class="err-img" src="img/err.png" alt="Error">
          <span class="eng-language"> E-MAIL IS INCORRECT! </span> 
          <span class="rus-language"> НЕПРАВЕЛЬНАЯ Э-ПОЧТА! </span> 
          <span class="lv-language"> E-PASTS NAV PAREIZ! </span>
        </div> 
        <input type="text" class="form-control  email" placeholder="Your email" tabindex="1" autofocus> 
        <div id="msg-err">
          <img class="err-img" src="img/err.png" alt="Error">
          <span class="eng-language">MESSAGE CAN'T BY EMPTY !</span> 
          <span class="rus-language">СООБЩЕНИЕ НЕ МОЖЕТ БЫТЬ ПУСТЫМ !</span> 
          <span class="lv-language">ZIŅOJUMS NEVAR BŪT TUKŠS!</span>
        </div> 
        <textarea  id="email-msg" class="form-control" placeholder="Write something.."  tabindex="2" ></textarea>      
        <div id="captcha-err">
          <img class="err-img" src="img/err.png" alt="Error">
          <span class="eng-language"> YOU FAILED THE TEST! </span>
          <span class="rus-language"> ВЫ ПРОВАЛИЛИ ТЕСТ! </span>
          <span class="lv-language"> JUS NAV IZTURĒJUŠI TESTU!  </span>
        </div> 
        <div class="container-for-g-recaptcha">
           <div data-theme="dark" id="captchaHeightAfterScale" data-size="compact " class="g-recaptcha" data-sitekey="6LcApK0UAAAAAKRpiva-19tK780nQng25vWZ1GKT"></div> 
        </div>      
        <button id="send-mail-btn" class="btn , btn-success , btn-lg" tabindex="3"> 
          <span class="eng-language">SUBMIT</span>
          <span class="rus-language">ОТПРАВИТЬ</span>
          <span class="lv-language">SŪTĪT</span>
        </button>    
        <p id="time-left"></p>
      </form>
    </div>       
  </div>
</div>
<!-- Jqery -->
<script src="LibrariesAndFrameworks/jquery-3.3.1.min.js"></script>
<!-- bootstrap js -->
<script src="LibrariesAndFrameworks/bootstrap.min.js"></script>
<!-- My js file -->
<script src="mainJS.js"></script>
</body>
</html>