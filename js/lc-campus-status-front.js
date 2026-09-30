// Creates a new app with AngularFire module
var app = angular.module("app", ["ngResource", "firebase"]);

app.controller("lcStatusCtrl", ["$scope", "$http", "$firebaseObject", "$timeout",
 function($scope, $http, $firebaseObject, $timeout) {

   var databaseRef = firebase.database().ref();
   syncObject = $firebaseObject(databaseRef);
  
     syncObject.$bindTo($scope, 'notify');
                 
   }
]);
