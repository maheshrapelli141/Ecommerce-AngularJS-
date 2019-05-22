<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 4/1/19
 * Time: 11:19 AM
 */
?>
<div class="form-section">
    <div class="form-head">Login</div>
    <div class="form-body">
    <input type="text" name="username" ng-model="useremail" placeholder="Username">
    <input type="password" name="userpassword" ng-model="userpassword" placeholder="Password">
    <button type="button" name="login" class="btn btn-custom-form" value="Login" ng-click="login(useremail,userpassword)">Login</button>
    </div>
</div>