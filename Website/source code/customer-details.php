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

    <title>Library - Customer Details</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include_once('includes/navbar.php');
    if (!isset($_SESSION['role'])) {
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
                        <h5 class="card-title">Customer Details</h5>
                        <?php
                        //connection 
                        require_once 'includes/connection.php';
                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die($conn->connect_error);
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * from MEMBER where MEMBER_ID=$id";
                            $result = $conn->query($query);
                            if (!$result) die($conn->error);
                            $rows = $result->num_rows;
                            for ($j = 0; $j < $rows; $j++) {
                                $result->data_seek($j);
                                $row = $result->fetch_array(MYSQLI_NUM);
                                echo <<<_END
                                <div class="card-body">
                                <div class="row">
                                <div class="col-12">
                                <table class="table table-image">
                            <thead>
                            <tr>
                                <th><span>Member_ID </span></th>
                                <th><span>First_Name </span></th>
                                <th><span>Last_Name</span></th>
                                <th><span>Phone</span></th>
                                <th><span>Email</span></th>
                                <th><span>Street</span></th>
                                <th><span>City</span></th>
                                <th><span>State</span></th>
                                <th><span>Zip</span></th>
                                <th><span>Start Date</span></th>
                                <th><span>User_Name</span></th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td>$row[0]</a></td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                            <td>$row[5]</td>
                            <td>$row[6]</td>
                            <td>$row[7]</td>
                            <td>$row[8]</td>
                            <td>$row[9]</td>
                            <td>$row[10]</td>
                            </tr>
                            </tbody>
                            </table>
                            <br/><a href='customer-list.php'>Go Back</a>
                        _END;
                            }
                        }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>