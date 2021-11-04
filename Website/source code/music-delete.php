<?php
if(!isset($_SESSION['role'])){
    header("Location: unauthorized.php");
}
require_once 'includes/connection.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "DELETE FROM MUSIC where MUSIC_ID='$id' ";										
    $result=$conn->query($query);
    if(!$result) die($conn->error);


    header("Location:music-list.php");
}
$conn->close();
