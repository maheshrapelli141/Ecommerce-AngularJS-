<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 7/1/19
 * Time: 1:49 PM
 */
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
<div class="form-section">
    <div class="form-head">Admin Login</div>
    <div class="form-body">
        <input type="text" name="username" ng-model="useremail" placeholder="Username">
        <input type="password" name="userpassword" ng-model="userpassword" placeholder="Password">
<!--        <button type="button" name="login" class="btn btn-custom-form" value="Login" ng-click="login(useremail,userpassword)">Login</button>-->
        <a href="dashboard.php" class="btn btn-custom-form">Login</a>
    </div>
</div>
<!--Get to admin-->
<div class="gettoadmin-section" title="Go to Admin Section">
    <a class="btn-link" href="../index.php"><span class="getToAdmin glyphicon glyphicon-leaf"></span></a>
</div>
</body>
</html>