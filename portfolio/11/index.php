<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>SUŠI BAR</title>
  <!--  meta tag for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--   Jqery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- bootstrap css CDN-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>





 <script type="text/javascript">
   MyApp.directive('pageReady', function() {
  return function(scope, element, attrs) {
    scope.ready = false;

    element.bind('done', function() {
      scope.$apply(function() {
        scope.ready = true;
      });
    });

  };
});
We trigger the 'done' event when the animation completes:

MyApp.animation('.page-animation', function() {
  return {

    // Enter
    enter: function(element, done) {
      TweenMax.fromTo(
        element,
        2,
        {
          css: {
            transform: 'translateY(-100%)'
          }
        },
        {
          css: {
            transform: 'translateY(0%)'
          },
          ease: Expo.easeOut,
          onComplete: function() {
            // Trigger done on the element, which our directive will pick up
            var event = new CustomEvent('done');
            element[0].dispatchEvent(event);
            done();
          }
        }
      );

      return function(is_cancelled) {
        if ( is_cancelled ) {
          TweenMax.set(
            element,
            {
              css: {
                transform: 'translateY(0%)'
              }
            }
          );
        }
      };
    }

  };
});
In our controller we can now watch for the scope.ready to be true:

MyApp.controller('homeController', function($scope) {
  $scope.state = "Home page transitioning..";

  $scope.$watch('ready', function() {
    if ( $scope.ready ) {
      $scope.state = "Home page ready!"
    }
  });
});
 </script>
</body>
</html>
 
 
