<html>

<head>
	<title>Library - Item List</title>
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
	<!-- Navbar -->
	<?php include_once('includes/navbar.php'); ?>

	<div class="container-fluid">
		<div class="row">
			<!-- Side Menu -->
			<?php include_once('includes/side-menu.php'); ?>

			<main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">
				<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
					<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
						<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
					</div>
					<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
						<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
					</div>
				</div>
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Salt Lake City Public Library</h1>
					<div class="well well-lg col-md-4">
						<input class="input-lg" placeholder="Search for a book" type="text" />
						<button onclick="search();" style="width: 48px; height: 30px;"><i class="fa fa-search fa-fw"></i></button>
						<button onclick="addNewItem();"><i class="fa fa-plus fa-fw"></i>Add New Item</button>
					</div>
				</div>
				<div class="container">

									<?php
									//connection 
									require_once 'includes/connection.php';
									$conn = new mysqli($hn, $un, $pw, $db);
									if($conn->connect_error) die($conn->connect_error);
										$query = "SELECT * FROM PERIODICAL ORDER BY PERIODICAL_ID DESC";										
										$result=$conn->query($query);
										if(!$result) die($conn->error);
										$rows = $result->num_rows; 

									for($j=0; $j<$rows; $j++)
									{
										$result->data_seek($j); 
										$row = $result->fetch_array(MYSQLI_NUM);
										
										echo <<<_END
										<div class="row" style="margin-top: 48px;">
											<div class="col-sm-4">
												<img src="assets/logo.png" style="width:300px" class="rounded" data-toggle="modal" data-target="#bookinfo$j"> </img>
											</div>
											<div class="col-sm-4">
											<div class="card"  style="height:210px;">
														<div class= "card-body">
												<a href ="item-details.php?id=$row[0]"></a></td>
													$row[2] <br>
													$row[3]<br>
													<a href="#" data-toggle="modal" data-target="#bookinfo$j"> <span class="glyphicon glyphicon-ok"></span>
													<br><br>
													View Details
													</a>
													<br><br>
													<span class="glyphicon glyphicon-ok" style="color: gray;">Place Hold</span>																								
													<a href="#" data-toggle="modal" data-target="#availability"> <span class="glyphicon glyphicon-ok"></span>
														Check for Availability
													</a>
													</div>			
																																		
													
													<a data-toggle="modal" data-target="#bookinfo$j"></a>
														<div class="modal fade" id="bookinfo$j" role="dialog">
															<div class="modal-dialog">
																<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-header">
																		<a href="periodical-update.php?id=$row[0]">Update Item </a> 
																		<a href="periodical-delete.php?id=$row[0]" onclick="deleteItem();">Delete Item </a>
																	</div>
																	<div class="modal-body">
																		<img src="assets/logo.png" style="width:40%" class="rounded"> </a> </img>
																		<p>Author Name: $row[2] <br>
																		  Publish Date:$row[3]<br>
																		  Issue_Number:$row[4] <br>
																		   Media Type:$row[5]</p>
																		
																	<div class="modal-footer">
																		<button type="button" class="btn btn-primary" data-dismiss="modal">Go Back</button>
																		<button onclick="addCart();" type="button" class="btn btn-primary" data-dismiss="modal">Add to Cart </button>
																		<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="viewCart();">View Cart </button>
																		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div>
														</div>
														
														</tbody>
														</table>
												</div>
												</div>
												</div>
												</div>				
														
													
										_END;	
									}

									$conn->close();
									?>				
						
												
											<a data-toggle="modal" data-target="#availability"></a>
											<div class="modal fade" id="availability" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header justify-content-md-center">
															<h5>AVAILABILITY</h5>
														</div>
														<table class="table table-condensed">
															<thead>
																<tr>
																	<th>SHELF LOCATION</th>
																	<th>STATUS</th>
																	<th>FORMAT</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Level2</td>
																	<td>Available</td>
																	<td>Periodical</td>
																</tr>
																<tr>
															</tbody>
														</table>
														<div class="modal-footer justify-content-md-center">
															<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
						
			</main>
			<?php include_once('includes/footer.php'); ?>
		</div>
	</div>

	<script type="text/javascript">
		function deleteItem() {
			if (confirm("Do you want to delete this item?")) {
				window.location.href = 'item-list.php';
			}
		}

		function viewCart() {
			window.location.href = 'shopping-cart.php';
		}

		function placeHold() {
			if (confirm("Would you like to place a hold in this item?")) {
				window.location.href = 'item-list.php';
				alert('A holding has been placed to this item')
			}
		}

		function addCart() {
			alert('The item has been added to your cart!');
		}

		function addNewItem() {
			window.location.href = 'periodical-add.php';
		}

		function search() {
			window.location.href = 'item-list.php';
		}
	</script>

</body>

</html>