var app = angular.module("adminApp", ["ngRoute","chart.js"]);
app.config(function($routeProvider,ChartJsProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "view/welcome.php"
        })
        .when("/products", {
            templateUrl : "view/products.php"
        })
        .when("/orders", {
            templateUrl : "view/orders.php"
        })
        .when("/users", {
            templateUrl : "view/users.php"
        });
    ChartJsProvider.setOptions({ colors : [ '#803690', '#00ADF9', '#DCDCDC', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360'] });

    ChartJsProvider.setOptions('bubble', {
        tooltips: { enabled: false }
    });
});

app.directive('ngFiles', ['$parse', function ($parse) {

    function fn_link(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, { $files: event.target.files });
        });
    }
    return {
        link: fn_link
    };
} ])

//main
app.controller("adminController",['$scope','$http','$location','$window','$timeout','$compile',function ($scope,$http,$location,$window,$timeout,$compile) {
    $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

    $scope.closeClass = false;
    $scope.navToggle = function () {
        if($scope.closeClass) {
            $scope.closeClass = false;
        }
        else {
            $scope.closeClass = true;
        }
    };

    $scope.labels = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    $scope.series = ['Series A'];
    $scope.data = [
        [650, 590, 800, 810, 560, 550, 400]
    ];
    $scope.onClick = function (points, evt) {
        console.log(points, evt);
    };
    $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }];
    $scope.options = {
        scales: {
            yAxes: [
                {
                    id: 'y-axis-1',
                    type: 'linear',
                    display: true,
                    position: 'left'
                }
            ]
        }
    };

    $scope.labels1 = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    $scope.series1 = ['Series A'];
    $scope.data1 = [
        [650, 590, 800, 810, 560, 550, 400,100,500,200,300,600]
    ];
    $scope.onClick1 = function (points, evt) {
        console.log(points, evt);
    };
    $scope.datasetOverride1 = [{ yAxisID: 'y-axis-1' }];
    $scope.options1 = {
        scales: {
            yAxes: [
                {
                    id: 'y-axis-1',
                    type: 'linear',
                    display: true,
                    position: 'left'
                }
            ]
        }
    };

    $scope.labels3 = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
    $scope.data3 = [300, 500, 100, 40, 120];

    //snackbar open-close
    $scope.snackbar = false;
    $scope.showSnackbar = function (status) {
        $scope.status = status;
        $scope.snackbar = true;
        $timeout(function () {
            $scope.snackbar = false;
        },3000);
    };


    $scope.loadProducts = function () {

        $http({
            method : 'POST',
            url : 'php_lib.php?getProducts=true',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response , status, headers ,config) {
            //success code;
            // $scope.status = "Status = "+response.data;
                $scope.list = angular.fromJson(response.data);
                // $scope.showSnackbar("Error :"+$scope.list);
        },function myError(response) {
            $scope.showSnackbar("Error :"+response.statusText);
        });
    };

    $scope.updateProduct = function (id , name , cost_price,selling_price,stock,description) {
          $scope.product = {
            productID : id,
            productName : name,
            productCost : cost_price,
            productSell : selling_price,
            productStock : stock,
            productDescription : description
          };
        $http({
            method : 'POST',
            url : 'php_lib.php?updateProduct=true',
            data : $scope.product,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response , status, headers ,config) {
            //success code;
            // $scope.status = "Status = "+response.data;
            if(response.data==1) {
                // $scope.status = response.data;$scope.clear();
                $scope.loadProducts();
                $scope.showSnackbar("Success");
            }
            else
                $scope.showSnackbar(response.data);
            $scope.editMode = false;
        },function myError(response) {
            $scope.showSnackbar("Error :"+response.statusText);
        });
    };

    $scope.productFieldShow = function () {
        $scope.editMode = true;
    };

    $scope.productFieldToggle = function(){
        if($scope.editMode)
            $scope.editMode = false;
        else
            $scope.editMode = true;
    };

    $scope.editProduct = function (id , name , cost_price, selling_price,stock,description,image) {
        $scope.productFieldShow();
        /*$scope.productID = id;
        $scope.productName = name;
        $scope.productCost = cost_price;
        $scope.productSell = selling_price;
        $scope.productStock =stock;
        $scope.productDescription = description;
        $scope.productImage = image;*/

        $scope.currentProduct = {
            productID : id,
            productName : name,
            productCost : cost_price,
            productSell : selling_price,
            productStock : stock,
            productDescription : description,
            productImage : image
        };

    };

    $scope.reseteditProduct = function () {
        $scope.productID = "";
        $scope.productName = "";
        $scope.productCost = "";
        $scope.productSell = "";
        $scope.productStock = "";
        $scope.productDescription = "";
        $scope.productImage = "";

    };

    $scope.uploadImage = function(files) {
        if($window.confirm("Are you sure to update image ?")) {
            $scope.$apply(function ($scope) {
                $scope.files = files.files;
            });
            $http({
                url: "php_lib.php?uploadImage=true",//or your add enquiry services
                method: "POST",
                processData: false,
                headers: {'Content-Type': undefined},
                data: $scope.formdata,
                transformRequest: function (data) {
                    var formData = new FormData();
                    var file = $scope.files[0];
                    console.log(file);
                    formData.append("image", file); //pass the key name by which we will recive the file
                    formData.append("productID", $scope.productID);

                    /*angular.forEach(data, function (value, key) {
                        formData.append(key, value);
                    });*/

                    return formData;
                },
            }).then(function (response, status, headers, config) {
                //success code;
                // $scope.status = "Status = "+response.data;
                if (response.data == 1) {
                    // $scope.status = response.data;
                    $scope.loadProducts();
                    $scope.showSnackbar("Success");
                } else
                    $scope.showSnackbar("Server Error :" + response.data);
                $scope.editMode = false;
            }, function myError(response) {
                $scope.showSnackbar("Error :" + response.statusText + " - Message : " + response.message);
            });
        }
    };

    $scope.addNewProduct = function() {
        $scope.reseteditProduct();
        $scope.productFieldToggle();
    };

    $scope.addProduct = function () {
        $http({
            method : 'POST',
            url : 'php_lib.php?addProduct=true',
            data : $scope.product,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response , status, headers ,config) {
            //success code;
            // $scope.status = "Status = "+response.data;
            if(response.data==1) {
                // $scope.status = response.data;$scope.clear();
                $scope.loadProducts();
                $scope.showSnackbar("Success");
            }
            else
                $scope.showSnackbar(response.data);
            $scope.editMode = false;
        },function myError(response) {
            $scope.showSnackbar("Error :"+response.statusText);
        });
    };

    $scope.uploadNewImage = function () {

    };


}]);
