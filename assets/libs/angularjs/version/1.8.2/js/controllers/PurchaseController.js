var PurchaseApp = angular.module('PurchaseApp', []);
PurchaseApp.controller('PurchaseController', ['$scope', '$http', '$filter', function ($scope, $http, $filter) {

    $scope.products = [];
    $scope.addData  = [];
    $scope.data     = {};
    $scope.count    = 0;
    $scope.url      = $("#urlmain").val();
    
    $scope.loadData = function () {
        $http.get($scope.url + 'product/all').then(function ($request, $index) {
            $scope.products = $request.data;
        });
    };

    $scope.selectedData = function ($position, $reference) {
        var position = $position;
        var data     = $filter("filter")($scope.products, {
            Rfrnc: $reference
        })[0];
        
        $scope.data = {
            Rfrnc: data.Rfrnc,
            Nm: data.Nm,
            CncptDscrptn: data.CncptDscrptn,
            TypPrdct: data.TypPrdct,
            Qntty: $("#Qntty-" + position).val(),
            UntPrc_Prvdr: $("#UntPrc_Prvdr-" + position).val()
        };

        $scope.addData.push($scope.data);

        /**
         * Close Modal
         */
        $("#ProductsList").modal('hide');
    };

    $scope._addData = function () {

    };
}]); 