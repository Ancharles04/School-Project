
<?php
//connection 
require_once 'includes/connection.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "DELETE from MEMBER where MEMBER_ID=$id";
	echo $query;
	$result = $conn->query($query);
	echo "<script type='text/javascript'>window.location.href='customer-list.php'</script>";
}
