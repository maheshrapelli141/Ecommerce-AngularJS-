<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 4/1/19
 * Time: 12:25 PM
 */
/*$data               = file_get_contents("php://input");
$dataJsonDecode     = json_decode($data);

echo $dataJsonDecode->perform;*/

require_once('php/Product.php');
require_once('php/Orders.php');
$order = new Orders();
//$order->removeOrder(1);
//$order->addOrder(1,1,1);
$orders = $order->getAllOrders(1);

?>

Hello