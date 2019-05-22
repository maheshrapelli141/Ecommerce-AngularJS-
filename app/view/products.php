<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 3/1/19
 * Time: 12:15 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../php/Product.php');
require_once('../php/SessionManager.php');

$sessionManager = new SessionManager();
$products = new Product();
$productsList = $products->getAllProducts();
?>
<div class="container">
    <div class="row">
        <?php while($eachProduct = mysqli_fetch_array($productsList)){  ?>
            <div class="col-sm-3">
                <div class="card">
                    <img src="uploads/<?php echo $eachProduct['image']; ?>" height="100" width="100">
                    <h3><?php echo $eachProduct['name']; ?></h3>
                    <p><?php echo $eachProduct['description']; ?></p>
                    <?php if(isset($_SESSION['email'])){ ?>
                    <button class="btn btn-default btn-addtocart" ng-click="addToCart(<?php echo $eachProduct['product_id']; ?>)">Add to Cart</button>
                    <?php } else { ?>
                    <a class="btn btn-default" id="login-first" value="<?php echo $eachProduct['product_id']; ?>" href="#!login">Login First</a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>