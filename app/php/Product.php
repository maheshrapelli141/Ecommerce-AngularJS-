<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 31/12/18
 * Time: 1:08 PM
 */
require_once('DB.php');

class Product extends DB
{

    public function addProduct($newName, $newDescription,$newImage){
        $sql = "INSERT INTO products(name,description,image) VALUES('$newName','$newDescription','$newImage')";
        return $this->executeQuery($sql);
    }

    public function getProduct($productID){
        $sql = "SELECT * FROM products WHERE product_id=$productID";
        return $this->selectQuery($sql);
    }

    public function removeProduct($productID){
        $sql = "DELETE * FROM products WHERE product_id=$productID";
        return $this->executeQuery($sql);
    }

    public function getAllProducts(){
        $sql = "SELECT * FROM products";
        return $this->selectQuery($sql);
    }

    public function updateProduct($productID , $productName, $productCost ,$productSell , $productStock, $productDescription){
        $sql = "UPDATE products SET name='$productName',cost_price=$productCost, selling_price=$productSell,stock=$productStock,description='$productDescription' WHERE product_id=$productID;";
        return $this->executeQuery($sql);
    }

    public function updateImage($image,$productID){
        $sql = "UPDATE products SET image = '$image' WHERE product_id = $productID;";
        return $this->executeQuery($sql);
    }
}