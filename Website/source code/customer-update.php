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

    <title>Library - Update Customer</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include_once('includes/navbar.php');
    if (!isset($_SESSION['role'])) {
        header("Location: unauthorized.php");
    } ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Menu -->
            <?php include_once('includes/side-menu.php'); ?>

            <main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Update User</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        //connection 
                        require_once 'includes/connection.php';
                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die($conn->connect_error);
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $query = "SELECT * from MEMBER where MEMBER_ID=$id ";

                            $result = $conn->query($query);
                            if (!$result) die($conn->error);

                            $rows = $result->num_rows;

                            for ($j = 0; $j < $rows; ++$j) {
                                $result->data_seek($j);
                                $row = $result->fetch_array(MYSQLI_NUM);
                                echo <<<_END
                                    <form class="card-add-form" action="customer-update.php" method="post">
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <input type="hidden" class="form-control" id="id" name="id" value='$row[0]'>        
                                                <label for="code">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" value='$row[1]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                            <label for="code">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" value='$row[2]'>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <label for="name">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value='$row[3]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="type">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value='$row[4]'>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <label for="value">Street</label>
                                                <input type="text" class="form-control" id="street" name="street" value='$row[5]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="points">City</label>
                                                <input type="text" class="form-control" id="city" name="city"value='$row[6]' >
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <label for="points">State</label>
                                                <input type="text" class="form-control" id="state" name="state" value='$row[7]'>
                                            </div>
                                            <div class="col-md-4 ">
                                            <label for="points">Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip" value='$row[8]'>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <div class="col-md-4 mb-4">
                                                <label for="points">Start Date</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date" value='$row[9]'>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                            <label for="points">Username</label>
                                                <input type="text" class="form-control" id="user_name" name="user_name" value='$row[10]'>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                        <div class="col-md-4 mb-4">
                                            <label for="points">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" maxlength="100" required>
                                        </div>
                                        </div>
                                        <div class="form-row justify-content-md-center">
                                            <input class="btn btn-danger" type="submit" name="Update" value="Update">      
                                        </div>

                                    </form>
                                    
                                    _END;
                            }
                        }
                        if (isset($_POST['Update'])) {
                            $id = $_POST['id'];
                            $first_name = $_POST['first_name'];
                            $lastname = $_POST['last_name'];
                            $phone = $_POST['phone'];
                            $email =  $_POST['email'];
                            $street = $_POST['street'];
                            $city = $_POST['city'];
                            $state = $_POST['state'];
                            $zip = $_POST['zip'];
                            $start_date = $_POST['start_date'];
                            $user_name = $_POST['user_name'];
                            $password = $_POST['password'];
                            $salt1 = 'qm&h*';
                            $salt2 = 'pg!@';
                            $token = hash('ripemd128', "$salt1$password$salt2");
                            $query = "UPDATE MEMBER SET FIRST_NAME='$first_name', LAST_NAME='$lastname', PHONE='$phone', EMAIL='$email', 
                            STREET='$street', CITY='$city', STATE='$state', ZIP='$zip', START_DATE='$start_date', USERNAME='$user_name', PASSWORD='$token'
                            WHERE MEMBER_ID = " . $id . ";";
                            $result = $conn->query($query);
                            $conn->close();
                            echo "<script type='text/javascript'>window.location.href='customer-list.php'</script>";
                        }
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