<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 29/12/18
 * Time: 9:31 PM
 */

class DB
{
    var $db;
    public function __construct()
    {
        $this->getConnect();
    }

    public function getConnect(){
        $db = mysqli_connect("localhost","root","9960Mahesh","practice");
        return $db;
    }

    public function selectQuery($sql){
        $result = mysqli_query($this->getConnect(),$sql);
        return $result;
    }

    public function executeQuery($sql){
        $result = mysqli_query($this->getConnect(),$sql);
        if($result)
            return true;
        else
            return false;
    }

    public function fetch_products($db){
        $sql = "SELECT * FROM products";
        $result = mysqli_query($db,$sql);
        return $result;
    }


}