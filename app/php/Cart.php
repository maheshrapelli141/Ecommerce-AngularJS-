<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 31/12/18
 * Time: 11:23 AM
 */

require_once('DB.php');

class Cart extends DB
{
    public function addToCart($userID,$productID){
        $sql = "INSERT INTO cart(user_id,product_id) VALUES('$userID','$productID')";
        return  $this->executeQuery($sql);
    }

    public  function removeFromCart($cartID){
        $sql = "DELETE FROM cart WHERE cart_id=$cartID";
        return $this->executeQuery($sql);
    }

    public function getCartProducts($userID){
        $sql = "SELECT p.product_id,p.name, p.description,c.cart_id,p.image FROM cart c NATURAL JOIN products p WHERE c.user_id=$userID;";
        return $this->selectQuery($sql);
    }
}