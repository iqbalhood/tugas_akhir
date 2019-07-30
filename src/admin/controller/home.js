app.controller('HomeCtrl', function ($scope, $cookies) {
    
    
    var favoriteCookie = $cookies.get('cookieval');
    $scope.userid = favoriteCookie;
    console.log(favoriteCookie);


   



});