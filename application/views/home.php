<!DOCTYPE html>
<html> 
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/bootstrap-lightbox.min.css'); ?>">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
        <!--<script src="<?php //echo base_url('assets/js/bootstrap-lightbox.min.js');?>"></script>-->
       
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
    </head>
    
    <body>
        <div id="header">
            <div id="title">
                UW Facilities
            </div>
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#">About</a></li>
              <li role="presentation"><a href="#">Profile</a></li>
              <li role="presentation"><a href="#">Home</a></li>
            </ul>
        </div>

        <div id="container" ng-app ng-controller="facCtrl">
            <input type="text" ng-model="id" />
            <a href="#" ng-click="get(id)">GET</a>
            <div ng-repeat="item in items">
                {{item.id}}<br />
                {{item.title}}<br />
                {{item.Action}}<br />
                
            </div>
        </div>

        <script type="text/javascript">
            var host = "http://localhost";
            function facCtrl($scope, $http){
                $scope.items = {};
                $scope.get = function(id){
                    $http.get(host + '/index.php/get/' + id).success(function(data) { 
                        $scope.items = data;
                    });
                }
            }
        </script>
    </body>
</html>