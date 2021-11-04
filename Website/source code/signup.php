<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Library - Login</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>


    <?php
    require_once 'includes/connection.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    ?>
    <img src="./assets/logo.png" class="rounded mx-auto d-block login-logo" alt="Library Logo" title="Library Logo">
    <form action="signup.php" method="post" class="login-form">
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="col-md-3 mb-3">
                <label for="lastname">Last Name</label>
                <input class="form-control" type="text" name="lastname">
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="phone ">Phone </label>
                <input class="form-control" type="text" name="phone">
            </div>
            <div class="col-md-3 mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email">
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="street">Street</label>
                <input class="form-control" type="text" name="street">
            </div>
            <div class="col-md-3 mb-3">
                <label for="city">City</label>
                <input class="form-control" type="text" name="city">
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="state">State</label>
                <input class="form-control" type="text" name="state">
            </div>
            <div class="col-md-3 mb-3">
                <label for="zip">Zip Code</label>
                <input class="form-control" type="text" name="zip">
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="col-md-3 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <button type="submit" name="submit" class="btn btn-custom-default btn-lg btn-block login-btn">Sign Up</button><br />
        </div>

        </div>
    </form>
    <?php
    if (
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['phone']) &&
        isset($_POST['email']) &&
        isset($_POST['street']) &&
        isset($_POST['city']) &&
        isset($_POST['state']) &&
        isset($_POST['zip']) &&
        isset($_POST['username']) &&
        isset($_POST['password'])
    ) {
        $firstname = get_post($conn, 'firstname');
        $lastname = get_post($conn, 'lastname');
        $phone = get_post($conn, 'phone');
        $email = get_post($conn, 'email');
        $street = get_post($conn, 'street');
        $city = get_post($conn, 'city');
        $state = get_post($conn, 'state');
        $zip = get_post($conn, 'zip');
        $username = get_post($conn, 'username');
        $password = get_post($conn, 'password');
        $salt1 = 'qm&h*';
        $salt2 = 'pg!@';
        $token = hash('ripemd128', "$salt1$password$salt2");

        $query = "INSERT INTO MEMBER (FIRST_NAME, LAST_NAME, PHONE, EMAIL, STREET, CITY, STATE, ZIP, START_DATE, USERNAME, PASSWORD) VALUES " .
            "('$firstname','$lastname','$phone','$email','$street','$city','$state','$zip',now(),'$username','$token')";
        $result = $conn->query($query);
        header("Location:index.php");
    }
    $conn->close();


    function get_post($conn, $var)
    {
        return $conn->real_escape_string($_POST[$var]);
    }
    ?>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html