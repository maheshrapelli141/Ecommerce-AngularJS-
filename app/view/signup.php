<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 4/1/19
 * Time: 11:19 AM
 */
?>
<div class="form-section">
    <div class="form-head">Signup</div>
    <div class="form-body">
    <input type="text" name="username" ng-model="username" placeholder="Username">
    <input type="text" name="useremail" ng-model="useremail" placeholder="Email">
    <input type="password" name="userpassword" ng-model="userpassword" placeholder="Password"><br>
    <button type="button" name="signup" class="btn btn-custom-form" value="Sign Up" ng-click="register(username,useremail,userpassword)">Sign Up</button>
</div>
</div>
