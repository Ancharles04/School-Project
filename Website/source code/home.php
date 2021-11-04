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

    <title>Library - Home</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
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
                    <h1 class="h2">Salt Lake City Public Library</h1><br />
                    <div class="well well-lg col-md-4">
                        <input class="input-lg" placeholder="Search for a book" type="text" />
                        <button onclick="search();" style="width: 48px; height: 30px;"><i class="fa fa-search fa-fw"></i></button>
                        <button onclick="addNewItem();"><i class="fa fa-plus fa-fw"></i>Add New Item</button>
                    </div>
                </div>
                <h2 class="h3" style="text-align: center;">What's New</h1><br />
                    <div id="carouselExampleCaptions" class="carousel slide justify-content-md-center" style="text-align: center;" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="height: 600px;">
                                <img src="assets/slide-1.png" class="d-block w-100" alt="Slide 1">
                                <div class="carousel-caption d-none d-md-block">
                                    <!--<h5>First slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>-->
                                </div>
                            </div>
                            <div class="carousel-item" style="height: 600px;">
                                <img src="assets/slide-2.png" class="d-block w-100" alt="Slide 2">
                                <div class="carousel-caption d-none d-md-block">
                                    <!--<h5>Second slide label</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                </div>
                            </div>
                            <div class="carousel-item" style="height: 600px;">
                                <img src="assets/slide-3.png" class="d-block w-100" alt="Slide 3">
                                <div class="carousel-caption d-none d-md-block">
                                    <!--<h5>Third slide label</h5>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>-->
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><br /><br />
                    <h3 style="text-align: center;">About</h3><br />
                    <p>
                        The Public Library System website will grant customers or users access to a
                        variety of educational resources. Users will have the opportunity to create an account
                        and login. Upon login, they will have access to view the item list, add and delete items
                        to the shopping cart. Besides, users are given a choice to enroll in classes.</p>
                    <p>
                        We decided to work on that project because we think about education in the
                        future. We want to help our community by making educational entertaining resources
                        accessible for free for a certain period of time. The objective of the application is to
                        provide people easy access to material that supports and meets the community's
                        needs.
                    </p>
            </main>
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <script type="text/javascript">
        function search() {
            window.location.href = 'item-list.php';
        }

        function addNewItem() {
            window.location.href = 'item-add.php';
        }
    </script>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>