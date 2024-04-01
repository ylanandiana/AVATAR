<?php
include('session_m.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php');
}

// Check if the 'success' parameter is present in the URL
$success = $_GET['success'] ?? false;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Manager Login | CakeBytes Cafe'</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
</head>

<style>
  .msg {
    background-color: yellowgreen;
    border-color: #c3e6cb;
    color: #155724;
    border-radius: 5px;
    padding: 10px;
    margin-top: 20px;
    text-align: center;
  }
</style>
<body>

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

<br>

<div class="container">
    <div class="jumbotron">
      
<?php
  if(isset($_GET["success"])){
      $msg= ($_GET["success"]);
?>
      <div class="msg">
      <?= $msg 
      
      ?>
    </div>
     <?php 
  }

?>


<br>
        <h1>Hello Manager! </h1>
        <p>Manage all your restaurant from here</p>
    </div>
</div>


<br>
<br>
<div class="container">
    <div class="container">
        <div class="col"></div>
    </div>
    <div class="col-xs-3" style="text-align: center;">
        <div class="list-group">
            <a href="myrestaurant.php" class="list-group-item ">My Restaurant</a>
            <a href="view_food_items.php" class="list-group-item ">View Food Items</a>
            <a href="add_food_items.php" class="list-group-item active">Add Food Items</a>
            <a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a>
            <a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="form-area" style="padding: 0px 100px 100px 100px;">
            <form action="add_food_items1.php?success=true" method="POST">
                <br style="clear: both">
                <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Food name" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Your Food Price (INR)" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Your Food Description" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="images_path" name="images_path" placeholder="Your Food Image Path [images/<filename>.<extension>]" required="">
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> ADD FOOD </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
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

