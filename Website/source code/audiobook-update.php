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
    <?php include_once('includes/navbar.php');
    if(!isset($_SESSION['role'])){
        header("Location: unauthorized.php");
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Menu -->
            <?php include_once('includes/side-menu.php'); ?>

            <main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Update Item</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        require_once 'includes/connection.php';

                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die($conn->connect_error);
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $query = "SELECT * FROM AUDIOBOOK where ISBN=$id ";

                            $result = $conn->query($query);
                            if (!$result) die($conn->error);

                            $rows = $result->num_rows;

                            for ($j = 0; $j < $rows; ++$j) {
                                $result->data_seek($j);
                                $row = $result->fetch_array(MYSQLI_NUM);
                                echo <<<_END
                                    <form class="card-add-form" action ="audiobook-update.php" method="post">
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                            <input type="hidden" class="form-control" id="id" name="id" maxlength="50" placeholder="Type the title" required value='$row[0]'>
                                                <label for="code">Item_Code</label>
                                                <input type="text" class="form-control" id="itemcode" name="itemcode" maxlength="50" placeholder="Type the title" required value='$row[1]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                            <label for="code">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" maxlength="50" placeholder="Type the code" required value='$row[2]'>
                                                <label for="name">Author</label>
                                                <input type="text" class="form-control" id="author" name="author" maxlength="50" placeholder="Type the author" required value='$row[3]'>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <label for="type">Publisher</label>
                                                <input type="text" class="form-control" id="publisher" name="publisher" maxlength="50" placeholder="Type the publisher" required value='$row[4]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="value">Publish Date</label>
                                                <input type="date" class="form-control" id="publish-date" name="publish-date" required value='$row[5]'>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <label for="points">Genre</label>
                                                <input type="text" class="form-control" id="genre" name="genre" maxlength="50" placeholder="Type the genre" required value='$row[6]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="points">Media Type</label>
                                                <input type="text" class="form-control" id="type" name="type" maxlength="50" placeholder="Give the type" required value='$row[7]'>
                                            
                                            </div>
                                            
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <input type="submit" value="Update" name="Update">
                                        </div>
                                    </form>
                                    _END;
                            }
                        }
                        if (isset($_POST['Update'])) {

                            $id = $_POST['id'];
                            $itemcode = $_POST['itemcode'];
                            $title = $_POST['title'];
                            $author = $_POST['author'];
                            $publisher = $_POST['publisher'];
                            $date = $_POST['publish-date'];
                            $genre =  $_POST['genre'];
                            $type = $_POST['type'];

                            $query = "UPDATE audiobook set ITEM_CODE='$itemcode',TITLE='$title', AUTHOR_NAME='$author',PUBLISHER='$publisher',PUBLISH_DATE='$date',GENRE='$genre',MEDIA_TYPE='$type'
                                where ISBN='$id' ";

                            $result = $conn->query($query);
                            echo $result;
                            if (!$result) die($conn->error);
                            header("Location:audiobook-list.php");
                        }
                        $conn->close();

                        ?>

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