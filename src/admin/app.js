var app = angular.module('myApp', ["ngRoute", "ngCookies","cp.ngConfirm",]);
app.controller('BodyCtrl', function($scope,$cookies) {
  $scope.firstName = "John";
  $scope.lastName = "Doe";

});

app.config(function($routeProvider) {
    $routeProvider
    .when("/home", {
        templateUrl : "dashboard.html",
        controller  : "HomeCtrl",
    })
 
    .when("/pengguna", {
        templateUrl : "pengguna.html",
        controller  : "PenggunaCtrl",
    })
    .otherwise({
        templateUrl : "dashboard.html",
        controller  : "HomeCtrl",
    });
});