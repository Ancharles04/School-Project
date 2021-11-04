<?php
require_once('check-session.php');
if ((isset($_GET["action"])) && $_GET["action"] == "logout") {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #810100">
    <a class="navbar-brand" href="home.php">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown active" style="margin-right: 12px;">
                <a class="nav-link" href="home.php">About</a>
            </li>
            <li class="nav-item dropdown active" style="margin-right: 12px;">
                <a class="nav-link" href="classes.php">Classes</a>
            </li>
            <li class="nav-item dropdown active" style="margin-right: 12px;">
                <a class="nav-link" href="customer-list.php">Customer</a>
            </li>
            <li class="nav-item dropdown active" style="margin-right: 12px;">
                <a class="nav-link" href="shopping-cart.php">View Cart</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="home.php?action=logout">Sign Out</a>
            </li>
        </ul>
    </div>
</nav>