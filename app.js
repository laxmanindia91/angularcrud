var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "main.html",
        controller: maincontroller,
    })
    .when("/red", {
        templateUrl : "red.html",
        controller: redcontroller,
    })
    .when("/green", {
        templateUrl : "green.html",
        controller: greencontroller,
    })
    .when("/blue", {
        templateUrl : "blue.html",
        controller: bluecontroller,
    });
});
app.controller('maincontroller',function($scope){
	$scope.message= "This is home page";
});

app.controller('redcontroller',function($scope){
	$scope.message= "This is red page";
});

app.controller('greecontroller',function($scope){
	$scope.message= "This is green page";
});

app.controller('bluecontroller',function($scope){
	$scope.message= "This is blue page";
});