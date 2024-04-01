<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}
?>

<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cart | Dream Cafe'</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
  </head>


<body>

<button onclick="topFunction()" id="myBtn" name="Go to top" style="display: none;">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Replace 'path_to_your_logo.png' with the actual path to your logo image -->
        <a class="navbar-brand" href="index.php">
            <img src="images/logo1.png" alt="CakeBytes Logo" class="mr-2"> CakeBytes Cafe'
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
            aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservation.php">Make a Reservation</a></li>
                </ul>

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


    
<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
        
      </div>
      
    </div>
    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="40%">Food Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="15%">Order Total</th>
<th width="5%">Action</th>
</tr>
</thead>


<?php  

$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr>
<td><?php echo $values["food_name"]; ?></td>
<td><?php echo $values["food_quantity"] ?></td>
<td>&#8377; <?php echo $values["food_price"]; ?></td>
<td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
</tr>
<?php 
$total = $total + ($values["food_quantity"] * $values["food_price"]);
}
?>
<tr>
<td colspan="3" align="right">Total</td>
<td align="right">&#8377; <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
<?php
  echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button></a>';
?>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="foodlist.php">order now.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>


<?php


if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'R_ID' => $_POST["hidden_RID"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Products already added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'R_ID' => $_POST["hidden_RID"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["food_id"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Food has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}


?>
<?php

?>
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

<!-- Add Bootstrap JavaScript and jQuery library references -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>