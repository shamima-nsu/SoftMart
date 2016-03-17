var app = angular.module('kettle', ['ngResource'],  
 function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});