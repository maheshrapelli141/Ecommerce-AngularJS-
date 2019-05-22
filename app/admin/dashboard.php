<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 7/1/19
 * Time: 2:32 PM
 */
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--<link rel="stylesheet" href="lib/css/bootstrap.css">-->
    <link rel="stylesheet" href="../lib/css/animate.css">
    <link rel="stylesheet" href="lib/css/style.css">
    <link rel="stylesheet" href="lib/css/">
    <link rel="stylesheet" href="lib/css/responsive.css">
    <link rel="stylesheet" href="../lib/css/bootstrap-theme.css">


</head>
<body ng-app="adminApp" ng-controller="adminController">
<div class="main-container">
    <div class="navbar-sidenav"  ng-class='{ div:true , sidenav_close : closeClass }'>
            <button type="button" class="sidenav-toggle" ng-click="navToggle()">
                <span class="glyphicon glyphicon-remove-circle"></span>
            </button>
        <div id="user-view">
            <img src="lib/images/user.png" height="60px" width="60px" class="img-user-badge"><br>
            <span class="green-dot"></span>Administrator
            <br><br>
            <div class="btn-group btn-group-justified">
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-primary btn-sm">Edit Profile</button>
                </div>
                <div class="btn-group">
                    <a type="button" class="btn btn-primary btn-sm" href="index.php">Logout</a>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li><a href="#/!">Dashboard</a></li>
            <li><a href="#!orders">Orders</a></li>
            <li><a href="#!products">Products</a></li>
            <li><a href="#!users">Users</a></li>
        </ul>
    </div>
    <div class="body-section" ng-class="closeClass ? 'body_section_full':'body_section_shrink'">
        <div ng-view></div>
    </div>

    <!--snackbar-->
    <div class="snackbar" ng-show="snackbar">
        <strong>Status : </strong> {{status}}
    </div>

</div>




<!--<script src="lib/js/require.js"></script>-->
<!--<script src="lib/js/charts/chart.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.js"></script>
<script src="../lib/js/jquery.js"></script>
<script src="../lib/js/angular.js"></script>
<script src="../lib/js/angular-route.js"></script>
<script src="lib/js/angular-chart.js"></script>
<script src="../lib/js/bootstrap.js"></script>
<!--<script src="lib/js/morris.js"></script>-->
<script src="lib/js/main.js"></script>
<script src="lib/js/test.js"></script>
</body>
</html>