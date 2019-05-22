<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 1/1/19
 * Time: 12:10 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../php/Product.php');
require_once('../php/User.php');
require_once('../php/SessionManager.php');
require_once('../php/Orders.php');
require_once('../php/DB.php');

$db = new DB();
$products = new Product();
$user = new User();
$sessionmanager = new SessionManager();
$orders = new Orders();

$data               = file_get_contents("php://input");
$dataJsonDecode     = json_decode($data);
$output = new \stdClass();

if(isset($_GET['getProducts'])){
    $output->result = $products->getAllProducts();
//    $output->result = $cart->getCartProducts(1);
}

if(isset($_GET['updateProduct'])){
    if($products->updateProduct($dataJsonDecode->productID,$dataJsonDecode->productName,$dataJsonDecode->productCost,$dataJsonDecode->productSell,$dataJsonDecode->productStock,$dataJsonDecode->productDescription))
        $output->status = 1;
    else
        $output->status = 0;
}

if(isset($_GET['uploadImage'])){
    if(isset($_FILES["image"]["name"]) && isset($_POST['productID'])) {
        $image = basename($_FILES["image"]["name"]);
        $target_dir = "lib/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
           if($products->updateImage($image,$_POST['productID']))
                $output->status = 1;
            else
                $output->status = 0;
        }
    }
    else {
        $output->status = "Empty Image File ";
    }
}
if(isset($_GET['addProduct'])){

}

//output (status / result)
if(isset($output->status))
        echo $output->status;
if(isset($output->result)) {
    $temp = $output->result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($temp);
}
?>

