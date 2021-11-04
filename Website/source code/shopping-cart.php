<html>

<head>
	<title>Library - Check Out</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>
	<?php include_once('includes/navbar.php'); ?>

	<div class="container-fluid">
		<div class="row">
			<!-- Side Menu -->
			<?php include_once('includes/side-menu.php'); ?>

			<main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">

				<div id="services" class="container-fluid text-center" style="background-color: #FFFFFF">
					<h2>CHECK OUT</h2>

					<table class="table">
						<thead>
							<tr>
								<th>Items</th>
							</tr>
						</thead>
						<?php
						require_once 'includes/connection.php';
						$conn = new mysqli($hn, $un, $pw, $db);
						if ($conn->connect_error) die($conn->connect_error);
						$query = "SELECT * FROM INVENTORY, BOOK where (BOOK.ITEM_CODE = INVENTORY.ITEM_CODE)";
						$result = $conn->query($query);
						if (!$result) die($conn->error);
						$rows = $result->num_rows;

						for ($j = 0; $j < $rows; $j++) {
							$result->data_seek($j);
							$row = $result->fetch_array(MYSQLI_NUM);

							echo <<<_END
											<tr>
											<th><img src='assets/book.jpg' style="width:128px;height:128px;"></img><th>
											Title: $row[6]
											Arthur: $row[7]
											Year: $row[9]</th>											
											</tr>
											<th>
											<button onclick="removeItem($row[1]);" type="botton" img src='assets/delete.png'>Click to delete this item</button>
											</th>
											
										_END;
						}
						$conn->close();
						?>
					</table>
					<button type="button" class="btn btn-secondary" onclick="addItems();">Add More Items</button>
					<button type="button" class="btn btn-primary" onclick="checkout();">Checkout</button><br />


					<script type="text/javascript">
						function addItems() {
							window.location.href = 'item-list.php';
						}

						function checkout() {

							window.location.href = 'checkout-item-cart.php';
							if (confirm('Do you want to confirm this order?')) {
								alert('Success! Your order has been placed!');
							}
						}

						function removeItem(itemcode) {

							window.location.href = 'delete-item-cart.php?itemcode=' + itemcode;
							alert('The item has been deleted!');
						}
					</script>
</body>

</html>