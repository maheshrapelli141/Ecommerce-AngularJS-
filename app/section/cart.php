<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 6/1/19
 * Time: 5:07 PM
 */
?>

<div class="cart-box-outer" ng-style="cartViewStyle">
    <div class="cart-box">
        <div id="cart-section">
            <button class="btn-link btn-lg btn-closeCart" ng-click="showCart()"><span class="glyphicon glyphicon-remove-circle"></span></button>
            <h3>My Cart</h3>
            <div ng-if="list.length == 0" class="alert alert-info">No items in cart</div>
            <ul ng-repeat="products in list" class="list-group">
                <li class="list-group-item"><img src="{{products.image}}" height="50px" width="50px">  {{products.name}}<button class="btn-link btn-removeCartItem" ng-click="removeCartItem(products.cart_id,$index)"><span class="glyphicon glyphicon-remove-circle"></span></button></li>
            </ul>
            <button class="btn btn-primary btn-checkout" ng-click="checkout(list)">Checkout</button>
        </div>
    </div>
</div>