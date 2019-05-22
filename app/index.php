<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('php/SessionManager.php');
require_once('php/User.php');
require_once('php/DB.php');
require_once('php/Product.php');
require_once('php/Cart.php');
require_once('php/Orders.php');

$sessionManager = new SessionManager();
$products = new Product();
$cart = new Cart();
$user = new User();
$order = new Orders();

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="lib/css/bootstrap.css">-->
<link rel="stylesheet" href="lib/css/animate.css">
<link rel="stylesheet" href="lib/css/style.css">
<link rel="stylesheet" href="lib/css/bootstrap-theme.css">


<body ng-app="myApp" ng-controller="myController">
<div ng-include="'section/navbar.php'"></div>
<div class="container" id="main-container">
    <div ng-view></div>
</div>

<?php if($sessionManager->isSessionOn()){ ?>
<div ng-include="'section/cart.php'"></div>
<?php } ?>

<!--snackbar-->
<div class="snackbar" ng-show="snackbar">
    <strong>Status : </strong> {{status}}
</div>

<!--Get to admin-->
<div class="gettoadmin-section" title="Go to Admin Section">
    <a class="btn-link" href="admin/index.php"><span class="getToAdmin glyphicon glyphicon-leaf"></span></a>
</div>
<script src="lib/js/angular.js"></script>
<script src="lib/js/angular-route.js"></script>
<script src="lib/js/jquery.js"></script>
<script src="lib/js/bootstrap.js"></script>
<script src="lib/js/main.js"></script>
</body>
</html>
