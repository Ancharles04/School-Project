<?php
//connection 
require_once 'includes/connection.php';
//$_SESSION['id'];

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


$itemcode = $_GET['itemcode'];

$query = "DELETE FROM INVENTORY where item_code='$itemcode' ";



$result=$conn->query($query);

if(!$result) die($conn->error);

$conn->close();

header("Location: shopping-cart.php");
?>