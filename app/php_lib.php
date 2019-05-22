<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 1/1/19
 * Time: 12:10 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('php/Cart.php');
require_once('php/User.php');
require_once('php/SessionManager.php');
require_once('php/Orders.php');

$cart = new Cart();
$user = new User();
$sessionmanager = new SessionManager();
$orders = new Orders();

$data               = file_get_contents("php://input");
$dataJsonDecode     = json_decode($data);
$output = new \stdClass();

if(isset($_GET['addToCart'])){
    if(isset($_SESSION['email'])){
        if($cart->addToCart($sessionmanager->getUserID(),$dataJsonDecode->productID))
            $output->status = 1;
        else
            $output->status = 0;
    }
}
if(isset($_GET['removeFromCart'])){
    if($cart->removeFromCart($dataJsonDecode->cartID))
        $output->status = 1;
    else
        $output->status = 0;
}
if(isset($_GET['getCartData'])){
    $output->result = $cart->getCartProducts($sessionmanager->getUserID());
//    $output->result = $cart->getCartProducts(1);
}
if(isset($_GET['login'])){
    if($user->loginCheck($dataJsonDecode->email,$dataJsonDecode->password)){
        $result = $user->getUserByEmail($dataJsonDecode->email);
        $sessionmanager->createSession($result['user_id'],$result['username'],$result['email']);
        $output->status = 1;
    }
    else
        $output->status = 0;
}
if(isset($_GET['logout'])){
    if($sessionmanager->destroySession())
        $output->status = 1;
    else
        $output->status = 0;
}
if(isset($_GET['register'])){
    if($user->addUser($dataJsonDecode->username,$dataJsonDecode->email,$dataJsonDecode->password)){
        $output->status = 1;
    } else {
        $output->status = 0;
    }

}
if(isset($_GET['checkout'])){
    /*foreach ($dataJsonDecode as $order){
        $cartID = $order['cart_id'];
        $productID = $order['product_id'];
        $userID = $sessionmanager->getUserID();
        $orders->addOrder($cartID,$productID,$userID);
    }
    $output->status=1;*/
    foreach ($dataJsonDecode as $order) {
        for($i=0;$i<sizeof($order);$i++){
            $cartID = $order[$i]->cart_id;
            $productID = $order[$i]->product_id;
            $userID = $sessionmanager->getUserID();
            $orders->addOrder($cartID,$productID,$userID);
        }
        $output->status=1;
    }
}
if(isset($output->status))
        echo $output->status;
if(isset($output->result)) {
    $temp = $output->result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($temp);
}
?>

