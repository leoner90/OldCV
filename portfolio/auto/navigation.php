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
    .when('/service',{
      templateUrl : "pages/service.php",
      animation: 'navAnimation' ,
      controller : "callback"

    }) 
     .when('/fix',{
      templateUrl : "pages/fix.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 
      .when('/mounting',{
      templateUrl : "pages/mounting.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 
      .when('/contacts',{
      templateUrl : "pages/contacts.php",
      animation: 'navAnimation' ,
      controller : "callback"
    }) 
    .otherwise({
      templateUrl : "pages/404.php",
      animation: 'navAnimation' ,
      controller : "callback"
    });
	});

app.controller("callback", function ($scope) {
  setTimeout(function() {$scope.msg = sameHeight();}, 550); //to call after animation transaction shoul have same time + 50
});

	app.controller('ctrl', function($scope, $rootScope){
	  $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
		  $rootScope.animation = currRoute.animation;
     
	  });
	});
// END OF Angular navigation + Angular animation 

</script>