<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Library - Add Item</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Menu -->
            <?php include_once('includes/side-menu.php');
            if (!isset($_SESSION['role'])) {
                header("Location: unauthorized.php");
            } ?>

            <main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Add New Item</h5>
                    </div>
                    <div class="card-body">
                        <form class="card-add-form" action="periodical-add.php" method="post">
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-4">
                                    <label for="code">Item Code</label>
                                    <input type="text" class="form-control" id="itemcode" name="itemcode" maxlength="50">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" maxlength="50">
                                    <label for="type">Publish Date</label>
                                    <input type="date" class="form-control" id="date" name="date" maxlength="50">
                                    <label for="value">Issue Number</label>
                                    <input type="text" class="form-control" id="num" name="num">
                                    <label for="points">Media Type</label>
                                    <input type="text" class="form-control" id="type" name="type" maxlength="50"><br>
                                    <input type="submit" value="Add Item">
                                    <a href="periodicals-list.php"> <button type="button">Go back </button> </a>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>


    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
<?php
require_once 'includes/connection.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_POST['itemcode'])) {
    $itemcode = $_POST['itemcode'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $num = $_POST['num'];
    $type =  $_POST['type'];
    $query = "INSERT INTO PERIODICAL(ITEM_CODE,NAME,PUBLISH_DATE,ISSUE_NUMBER,MEDIA_TYPE)
                        values($itemcode,'$name','$date','$num','$type')";

    $result = $conn->query($query);
    echo "<script type='text/javascript'>window.location.href='item-list.php'</script>";
}

$conn->close();

?>