var PurchaseApp = angular.module('PurchaseApp', []);
PurchaseApp.controller('PurchaseController', ['$scope', '$http', function ($scope, $http) {

    $scope.products = [];
    $scope.url      = $("#urlmain").val();
    
    $http.get($scope.url + 'product/all').then(function ($request) {
        $scope.products = $request.data;
    });
}]); 