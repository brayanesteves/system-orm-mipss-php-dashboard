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

    $scope.RemoveData = function(index, data) {
        $scope.addData.splice(index, 1);
    }

    $scope.selectedData = function ($position, $reference) {
        var position = $position;
        var data     = $filter("filter")($scope.products, {
            Rfrnc: $reference
        })[0]; 
        
        var add = true;

        /**
         * If this is the first time a data is added
         */
        if($scope.addData.length == 0) {
            $scope._addData(data, position);
            add = false;
        } else {
            angular.forEach($scope.addData, function(value, key) {
                /**
                 * If the data that is being added exists
                 */
                if(value["Rfrnc"] == $reference) {
                    value.Qntty        = parseInt(value.Qntty) + parseInt($("#Qntty-" + position).val());
                    value.UntPrc_Prvdr = parseFloat(value.UntPrc_Prvdr) + parseFloat($("#UntPrc_Prvdr-" + position).val());
                    add                = false;
                }
            });
        }

        if(add) {
            $scope._addData(data, position);
        }

        /**
         * Close Modal
         */
        $("#ProductsList").modal('hide');
    };

    $scope._addData = function (data_, position) {
        $scope.data = {
            Rfrnc: data_.Rfrnc,
            Nm: data_.Nm,
            CncptDscrptn: data_.CncptDscrptn,
            TypPrdct: data_.TypPrdct,
            Qntty: $("#Qntty-" + position).val(),
            UntPrc_Prvdr: $("#UntPrc_Prvdr-" + position).val()
        };

        $scope.addData.push($scope.data);

        $scope.getTotalQntty = function () {
            var total = 0;
            angular.forEach($scope.addData, function(value, key) {                
                total = total + parseInt(value.Qntty);                   
               
            });

            return total;
        };

        $scope.getTotalUntPrc_Prvdr = function () {
            var total = 0;
            angular.forEach($scope.addData, function(value, key) {                
                total = total + parseFloat(value.UntPrc_Prvdr);                
            });
            return total;
        };

        $scope.getTotal = function () {
            var total = 0;
            angular.forEach($scope.addData, function(value, key) {                
                total = total + parseInt(value.Qntty) * parseFloat(value.UntPrc_Prvdr);                
            });
            return total;
        };
    };
}]); 