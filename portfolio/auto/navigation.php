<script type="text/javascript">
//Angular navigation + Angular animation 
app = angular.module('app', ['ngRoute', 'ngAnimate']);
app.config(function($routeProvider, $locationProvider){ 
  $routeProvider
    .when("/", {
       templateUrl : "pages/main.php",
       animation: 'navAnimation' ,
        controller : "callback"
    })  
    //ALL REPAIR PAGE
    .when('/repairs',{
      templateUrl : "pages/repairs/repairs.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    .when('/suspension',{
      templateUrl : "pages/repairs/suspension.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    .when('/engine',{
      templateUrl : "pages/repairs/engine.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    .when('/clutche',{
      templateUrl : "pages/repairs/clutche.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    .when('/steering',{
      templateUrl : "pages/repairs/steering.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    .when('/gearboxes',{
      templateUrl : "pages/repairs/gearboxes.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    //ALL SERVICE PAGE
    .when('/service',{
      templateUrl : "pages/service/service.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 
    .when('/Interim-service',{
      templateUrl : "pages/service/Interim-service.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 
    .when('/Full-service',{
      templateUrl : "pages/service/Full-service.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    //TYRES PAGE
    .when('/tyres',{
      templateUrl : "pages/tyres/tyres.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    //CONTACT PAGE
    .when('/contacts',{
      templateUrl : "pages/contacts.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 

    //IF ERROR
    .otherwise({
      templateUrl : "pages/404.php",
      animation: 'navAnimation' ,
      controller : "callback"
    });
});

//BY THE END OFF ANIMATIONS CALSS SAMEHEIGHT FUNCTION (SAMEHEIGHT.php)
app.controller("callback", function ($scope) {
  setTimeout(function() {$scope.msg = sameHeight();}, 700); //to call after animation transaction shoul have same time +100 
});

//animation
app.controller('ctrl', function($scope, $rootScope){
  $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
    $rootScope.animation = currRoute.animation;
    $(window).scrollTop(0);
  });
});

//sidebar menu navigation
function sidebarMenu(fileName , dirName){
  $("#side-menu").hide(); 
  $("#side-menu").fadeIn(500);
  var sideMenu ="";
  //display whole side menu  
  for (var i = 0; i < fileName.length; i++) {
    sideMenu += "<a href=#/"+fileName[i]+">"+ dirName[i] + "</a> <br>";
  }
  $("#side-menu").html(sideMenu);
}
</script>