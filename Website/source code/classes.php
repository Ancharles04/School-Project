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

  <title>Library - Classes</title>
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

  <?php include_once('includes/navbar.php'); ?>

  <div class="container-fluid">
    <div class="row">
      <!-- Side Menu -->
      <?php include_once('includes/side-menu.php'); ?>
      <main role="main" class="col-md-10 bg-faded py-3 flex-grow-1" style="height: 100%;">
        <h2 style="text-align:center">Classes</h2>
        <div style="float: right;">
          <button onclick="addNewClass();"><i class="fa fa-plus fa-fw"></i>Add New Class</button>
        </div><br /><br />
        <hr /><br />
        <div class="row">
          <?php
          require_once('includes/connection.php');
          $db = new LibraryDBConnection();
          $stmt = $db->conn->prepare('SELECT * FROM CLASS WHERE STATUS = :status ORDER BY CLASS_DATE DESC');
          $stmt->bindValue(':status', true, PDO::PARAM_BOOL);
          $stmt->execute();
          $classes = array();
          if ($stmt->rowCount() > 0) {
            $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
          $stmt = $db->conn->prepare('SELECT * FROM CLASS_MEMBERS WHERE MEMBER_CODE = :memberCode');
          $stmt->bindValue(':memberCode', true, PDO::PARAM_INT);
          $stmt->execute();
          $db->__destruct();
          foreach ($classes as $class) { ?>
            <div class="card col-md-3"><br>
              <img src="<?php echo $class['IMAGE_URL']; ?>" style="width:100%; height: 250px;" class="img-fluid img-thumbnail"><br />
              <p><strong><?php echo $class['TITLE']; ?></strong></p>
              <p><?php echo $class['DESCRIPTION']; ?></p>
              <p>Age Group: <?php echo $class['AGE_GROUP']; ?> | Duration: <?php echo $class['DURATION']; ?></p>
              <p>Start Date: <?php echo $class['CLASS_DATE']; ?> at <?php echo $class['CLASS_TIME']; ?></p>
              <p>Address: <?php echo $class['ADDRESS']; ?></p>
              <hr />
              <p>
                <button id="btn<?php echo $class['CLASS_ID']; ?>" class="btn btn-success" onclick="enroll(<?php echo $class['CLASS_ID']; ?>,<?php echo $_SESSION['id']; ?>);">Enroll now!</button>
              </p>
              <p><i>Fee: $<?php echo $class['CLASS_FEE']; ?></i></p>
            </div><br>
          <?php } ?>
        </div>
      </main>
      <?php include_once('includes/footer.php'); ?>
    </div>
  </div>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script type="text/javascript">
    function enroll(classid, userid) {
      $.post("enroll-class.php", {
        classid: classid,
        userid: userid
      }).done(function(data) {
        alert(data);
        $("#btn" + classid).attr("disabled", "disabled");
      });
    }

    function addNewClass() {
      window.location.href = 'classes-add.php';
    }
  </script>

</body>

</html>