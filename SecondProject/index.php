<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home | CakeBytes Cafe'</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
</head>
<body   style="background-color: #ffc0cb;">
    <button onclick="topFunction()" id="myBtn" name="Go to top" style="display: none;">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo1.png" alt="CakeBytes Logo" class="mr-2"> CakeBytes Cafe'
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                    aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservation.php">Make a Reservation</a></li>
                </ul>
                <!-- User Session Links -->
                <?php if(isset($_SESSION['login_user1'])) { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout_m.php">Log Out</a></li>
                    </ul>
                <?php } elseif (isset($_SESSION['login_user2'])) { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="foodlist.php">Food Zone</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Cart (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : '0'; ?>)</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout_u.php">Log Out</a></li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="signupDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span> Sign Up
                            </a>
                            <div class="dropdown-menu" aria-labelledby="signupDropdown">
                                <a class="dropdown-item" href="customersignup.php">User Sign-up</a>
                                <a class="dropdown-item" href="managersignup.php">Manager Sign-up</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-log-in"></span> Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="loginDropdown">
                                <a class="dropdown-item" href="customerlogin.php">User Login</a>
                                <a class="dropdown-item" href="managerlogin.php">Manager Login</a>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>


<!-- Hero Section -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
        <h1 class="display-4" style="font-family:solid">Welcome to CakeBytes Cafe'</h1>
            <!-- Add your GIF here -->
            <img src="images/dish.gif" alt="Dishes Highlight" class="img-fluid">
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="col-md-12 text-center">
    <h1 class="display-4">Categories</h1>
</div>
<br>

<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
   
</ol>

    <!-- Carousel inner content -->
    <div class="carousel-inner">
    <div class="carousel-item active">
        <!-- Croissant -->
        <img class="d-block w-100" src="categories/shakes.jpg" alt="Shakes">
        <div class="carousel-caption text-dark bg-light">
            <h5>Shakes</h5>
            <!-- Add description or link if needed -->
        </div>
    </div>
    <div class="carousel-item">
        <!-- Danish Pastry -->
        <img class="d-block w-100" src="categories/icecreams.jpg" alt="IceCreams" style="background:transparent">
        <div class="carousel-caption text-dark bg-light" >
            <h5>Ice Cream</h5>
            
            <!-- Add description or link if needed -->
        </div>
    </div>
    <!-- Add more carousel items for additional pastries -->
    <div class="carousel-item">
        <!-- Macaron -->
        <img class="d-block w-100" src="categories/fresh-croissants.jpg" alt="Fresh Croissants">
        <div class="carousel-caption text-dark bg-light">
            <h5>Fresh Croissants</h5>
            <!-- Add description or link if needed -->
        </div>
    </div>
    <div class="carousel-item">
        <!-- Muffin -->
        <img class="d-block w-100" src="categories/cupcakes.jpg" alt="Cupcakes">
        <div class="carousel-caption text-dark bg-light">
            <h5>Cupcakes</h5>
            <!-- Add description or link if needed -->
        </div>
    </div>
    <div class="carousel-item">
        <!-- Tart -->
        <img class="d-block w-100" src="categories/generated-cake-picture.jpg" alt="Cakes">
        <div class="carousel-caption text-dark bg-light">
            <h5>Cakes</h5>
            <!-- Add description or link if needed -->
        </div>
    </div>
</div>


    <!-- Carousel controls -->
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


    <!-- Reviews Section -->
   

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Customer Reviews</h2>
            <div class="card-deck">
                <!-- Review Card 1 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ashly Batulan</h5>
                        <p class="card-text">"Great desserts and cozy atmosphere! The staff is friendly and attentive. I highly recommend the Strawberry shakes!"</p>
                        <div class="rating">
                            <!-- Add stars here -->
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>

                <!-- Review Card 2 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">John Paul</h5>
                        <p class="card-text">"CakeBytes Cafe' never disappoints! Their breakfast menu is fantastic, and the coffee is always brewed to perfection. A must-visit for brunch lovers!"</p>
                        <div class="rating">
                            <!-- Add stars here -->
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                    </div>
                </div>

                <!-- Review Card 3 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Val Lery</h5>
                        <p class="card-text">"Excellent service and delicious food! The cakes are a must-try, especially the red velvet. Can't wait to visit again!"</p>
                        <div class="rating">
                            <!-- Add stars here -->
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
            <a class="btn btn-lg btn-pastry" href="customerlogin.php" role="button">Order Now</a>

            </div>
        </div>
    </div>

    <!-- Footer -->

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <span class="text-muted">© <?php echo date("Y"); ?> CakeBytes Cafe'</span>
        </div>
    </footer>

    <!-- JavaScript code -->
    <script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<!-- Add Bootstrap JavaScript and jQuery library references -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>