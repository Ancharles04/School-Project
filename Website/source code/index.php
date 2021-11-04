<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: home.php");
}

if ((isset($_POST['submit'])) && (isset($_POST['email'])) && (isset($_POST['pwd']))) {
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $salt1 = 'qm&h*';
    $salt2 = 'pg!@';
    $token = hash('ripemd128', "$salt1$password$salt2");
    require_once('includes/connection.php');
    $db = new LibraryDBConnection();
    $stmt = $db->conn->prepare('SELECT MEMBER_ID as ID, EMAIL FROM MEMBER WHERE EMAIL = :email AND PASSWORD = :password');
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $token, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $_SESSION['id'] = $result->ID;
        $_SESSION['email'] = $result->EMAIL;
        $db->__destruct();
        header("Location: home.php");
    }
    $stmt = $db->conn->prepare('SELECT EMPLOYEE_ID as ID, EMAIL, IS_ADMIN FROM EMPLOYEE WHERE EMAIL = :email AND PASSWORD = :password');
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $token, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $_SESSION['id'] = $result->ID;
        $_SESSION['email'] = $result->EMAIL;
        $_SESSION['role'] = $result->IS_ADMIN;
        $db->__destruct();
        header("Location: home.php");
    }
    header("Location: index.php?error=incorrect");
}
?>

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
    if ($_GET['error'] == 'incorrect') {
    ?>
        <div id="login-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Incorrect credentials!</strong> Check your email or password!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <img src="./assets/logo.png" class="rounded mx-auto d-block login-logo" alt="Library Logo" title="Library Logo">
    <form id="login-form" class="login-form" method="POST" action="index.php">
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="50" placeholder="u1332769@utah.edu" required>
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" maxlength="32" name="pwd" placeholder="********" required>
            </div>
        </div>
        <div class="form-row justify-content-md-center">
            <button type="submit" name="submit" class="btn btn-custom-default btn-lg btn-block login-btn">Login</button><br />
        </div>
        <div class="form-row justify-content-md-center">
            <button type="button" name="signup" onclick="librarysignup();" class="btn btn-custom-default btn-lg btn-block login-btn">Sign Up</button>
        </div>
    </form>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script type='text/javascript'>
        function librarysignup() {
            window.location.href = 'signup.php';
        }
    </script>

</body>

</html>