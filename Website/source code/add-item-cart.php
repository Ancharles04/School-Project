<?php
//connection 
require_once 'includes/connection.php';
//$_SESSION['id'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$itemid = $_GET['itemid'];
$userid = $_GET['userid'];
$query = "INSERT INTO INVENTORY(ITEM_CODE, MEMBER_CODE) VALUES ($itemid, $userid)";
$result = $conn->query($query);

if (!$result) die($conn->error);

$conn->close();

header("Location: shopping-cart.php");
