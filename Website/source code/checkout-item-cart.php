<?php
//connection 
require_once 'includes/connection.php';
//$_SESSION['id'];

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO CHECKOUT (COPY_CODE, MEMBER_CODE, CHECK_OUT_DATE, CHECK_DUE_DATE )
SELECT INVENTORY.ITEM_CODE, INVENTORY.MEMBER_CODE, now(), now()+INTERVAL 30 DAY
FROM INVENTORY; UPDATE INVENTORY SET CHECKOUT_CODE=(SELECT CHECKOUT_ID FROM CHECKOUT where INVENTORY.ITEM_CODE=CHECKOUT.COPY_CODE)";



$result=$conn->multi_query($query);

if(!$result) die($conn->error);

$conn->close();

header("Location: item-list.php");
?>