<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/bootstrap.min.js"></script><!-- Bootstrap Framework -->
        <script type="text/javascript" src="js/plugins.js"></script><!-- jQuery Plugins -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
        <script type="text/javascript" src="addons/superfish_responsive/superfish_menu.js"></script><!-- Superfish Menu -->
        <script type="text/javascript" src="js/kalypso_script.js"></script><!-- custom scripts file -->
        <script src="angularjs/myApp.js"></script>
        <script src="angularjs/ImageController.js"></script>
        
<!--        <script>
  var app = angular.module('myImages', []);
  app.controller('myImageCtrl', function($scope) {
      $scope.firstName= "John";
      $scope.lastName= "Doe";  
  });
  
  app.controller('mySecondImageCtrl', function($scope,$http) {
      
     $http.get("http://localhost/SRPhotography/api/images.php?ImageID=1")
             .success(function(response) {$scope.images = response;});
  });
  theImageID = 1;
    
        </script>-->

    </head>
    <body>
        <div ng-app="myApp.controllers" >

            <div ng-controller="ImageItemCtrl">
                First Name: <input type="text" ng-model="images.imageID"><br>
                Last Name: <input type="text" ng-model="images.imageName"><br>
            </div>
        

        <div ng-controller="AllImagesCtrl">
            <ul>
                <li ng-repeat="image in images">
                    {{ image.imageID + ', ' + image.imageName }}
                </li>
            </ul>

        </div>
</div>

    </body>
</html>
