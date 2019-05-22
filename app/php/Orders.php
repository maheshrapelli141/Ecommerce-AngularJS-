<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 7/1/19
 * Time: 11:50 AM
 */
require_once('DB.php');

class Orders extends DB
{
    public function addOrder($cartID, $productID,$userID){
        $sql = "INSERT INTO orders(cart_id,product_id,user_id,date_of_order) VALUES($cartID,$productID,$userID,now());";
        return $this->executeQuery($sql);
    }

    public function removeOrderByCartID($cartID){
        $sql = "DELETE FROM orders WHERE cart_id=$cartID";
        return $this->executeQuery($sql);
    }

    public function removeOrderByOrderID($orderID){
        $sql = "DELETE FROM orders WHERE order_id=$orderID";
        return $this->executeQuery($sql);
    }

    public function getAllOrders($cartID){
        $sql = "SELECT * FROM orders WHERE cart_id=$cartID";
        return $this->selectQuery($sql);
    }

    public function getOrder($orderID){
        $sql = "SELECT * FROM orders WHERE order_id=$orderID";
        return $this->selectQuery($sql);
    }

    public function getUserOrders($userID){
        $sql = "SELECT * FROM products WHERE product_id  IN (SELECT product_id FROM orders WHERE user_id=$userID);";
        return $this->selectQuery($sql);
    }
}