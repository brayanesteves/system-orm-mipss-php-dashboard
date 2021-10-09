var PurchaseApp = angular.module('PurchaseApp', []);
PurchaseApp.controller('PurchaseController', ['$scope', '$http', function ($scope, $http) {

    $scope.products = [];
    $scope.count    = 0;
    $scope.url      = $("#urlmain").val();
    
    $scope.loadData = function () {
        $http.get($scope.url + 'product/all').then(function ($request, $index) {
            $scope.products = $request.data;
        });
    };
}]); 