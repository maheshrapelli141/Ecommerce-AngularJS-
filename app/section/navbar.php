<?php require_once('../php/SessionManager.php');
$seesionManager = new SessionManager();
?>
<nav class="navbar navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#/!">Home</a></li>
                <li><a href="#!product">Products</a></li>
                <li><a href="#!about">About</a></li>
                <li><a href="#!contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(!$seesionManager->isSessionOn()){ ?>
                <li id="signup"><a href="#!signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li id="login"><a href="#!login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } else { ?>
                <li><button class="btn-custom-link" id="cart" ng-click="showCart()"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</button></li>
                <li><button class="btn-custom-link" ng-click="logout()"><span class="glyphicon glyphicon-user"></span> Logout</button></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>