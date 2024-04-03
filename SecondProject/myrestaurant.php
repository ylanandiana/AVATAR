<?php
include('session_m.php');

if(!isset($login_session)){
    header('Location: managerlogin.php'); // Redirecting To Home Page
}

?>

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

    <div class="container">
        <h1 class="text-center">Restaurant Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inventory</h5>
                        <p class="card-text">Manage your restaurant's inventory.</p>
                        <a href="view_food_items.php" class="btn btn-primary">View Inventory</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Item</h5>
                        <p class="card-text">Add a new item to your inventory.</p>
                        <a href="add_food_items.php" class="btn btn-primary">Add Item</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Item</h5>
                        <p class="card-text">Edit existing inventory items.</p>
                        <a href="edit_food_items.php" class="btn btn-primary">Edit Item</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add Restaurant Form -->
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Restaurant</h5>
                        <form action="myrestaurant1.php" method="post">
                            <div class="form-group">
                                <label for="name">Restaurant Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number:</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Restaurant</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript and Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
