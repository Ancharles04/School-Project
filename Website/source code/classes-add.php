<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Library - Add Classes</title>
  <link href="./css/style.css" rel="stylesheet" type="text/css" />
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;

    }

    .title {
      color: grey;
      font-size: 18px;
    }

    button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #4CAF50;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }
  </style>
</head>

<body>

  <?php
  include_once('includes/navbar.php');
  if (!isset($_SESSION['role'])) {
    header("Location: unauthorized.php");
  }
  ?>


  <div class="container-fluid">
    <div class="row">
      <!-- Side Menu -->
      <?php include_once('includes/side-menu.php'); ?>

      <main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">
        <h2 style="text-align:center">Add New Class</h2>
        <hr /><br />
        <form class="class-add-form" method="POST" action="classes-add.php">
          <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" maxlength="50" placeholder="PHP Classes" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="desc">Description</label>
              <input type="text" class="form-control" id="desc" name="desc" maxlength="200" placeholder="Learn how to code in PHP with MySQL!" required>
            </div>
          </div>
          <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
              <label for="date">Date</label>
              <input type="date" placeholder="YYYY-MM-DD" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" id="date" name="date" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" maxlength="50" placeholder="1234 S Main St" required>
            </div>
          </div>
          <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
              <label for="age">Age Group</label>
              <input type="text" class="form-control" id="age" name="age" maxlength="50" placeholder="18-60" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="duration">Duration</label>
              <input type="text" class="form-control" id="duration" name="duration" maxlength="50" placeholder="1 month" required>
            </div>
          </div>
          <div class="form-row justify-content-md-center">
            <div class="col-md-3 mb-3">
              <label for="time">Time</label>
              <input type="time" class="form-control" id="time" name="time" maxlength="50" placeholder="08:00" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="fee">Fee</label>
              <input type="number" class="form-control" id="fee" name="fee" maxlength="10" placeholder="$0" required>
            </div>
          </div>
          <div class="form-row justify-content-md-center">
            <div class="col-md-6 mb-6">
              <label for="url">Image URL</label>
              <input type="text" class="form-control" id="url" name="url" maxlength="200" placeholder="https://link.com/image.png" required>
            </div>
          </div>
          <div class="form-row justify-content-md-center">
            <button type="submit" value="submit" name="submit" class="btn btn-danger btn-lg btn-block btn-card-register">Save</button>
          </div>
        </form>
      </main>
      <?php include_once('includes/footer.php'); ?>
    </div>
  </div>

  <?php
  require_once('includes/connection.php');
  if ((isset($_POST['title'])) && (isset($_POST['submit']))) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $duration = $_POST['duration'];
    $time = $_POST['time'];
    $fee = $_POST['fee'];
    $url = $_POST['url'];
    $db = new LibraryDBConnection();
    $query = "INSERT INTO CLASS(TITLE, DESCRIPTION, CLASS_DATE, ADDRESS, AGE_GROUP, DURATION, CLASS_TIME, STATUS, CLASS_FEE, IMAGE_URL) 
              VALUES('$title', '$desc', '$date', '$address', '$age', '$duration', '$time', 1, $fee, '$url')";
    echo $query;
    $db->conn->exec($query);
    echo "<script type='text/javascript'>alert('Success, the class has beeen registered!');</script>";
  } ?>
</body>

</html>