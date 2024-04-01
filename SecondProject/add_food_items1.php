<?php

include('session_m.php');

if(!isset($login_session)){
    header('Location: managerlogin.php'); 
    exit(); // Stop execution to prevent further code execution
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$description = $conn->real_escape_string($_POST['description']);
$images_path = $conn->real_escape_string($_POST['images_path']);

// Storing Session
$user_check = $_SESSION['login_user1'];
$R_IDsql = "SELECT RESTAURANTS.R_ID FROM RESTAURANTS, MANAGER WHERE RESTAURANTS.M_ID='$user_check'";
$R_IDresult = mysqli_query($conn, $R_IDsql);

// Check if the query executed successfully and returned a result
if (!$R_IDresult || mysqli_num_rows($R_IDresult) == 0) {
    // Handle the case where no result is returned from the query
    echo "Error: Unable to fetch R_ID from the RESTAURANTS table.";
    exit(); // Stop execution
}

// Fetch R_ID from the result set
$R_IDrs = mysqli_fetch_array($R_IDresult, MYSQLI_BOTH);
$R_ID = $R_IDrs['R_ID'];

// Prepare INSERT query
$query = "INSERT INTO FOOD(name, price, description, R_ID, images_path) 
          VALUES ('$name', '$price', '$description', '$R_ID', '$images_path')";

// Execute query and handle errors
if ($conn->query($query) === TRUE) {
    // Redirect to success page if insertion is successful
    header('Location: add_food_items.php?success= Food item successfully added!');
    exit(); // Stop execution to prevent further code execution
} else {
    // Handle the case where the query execution failed
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dream Cafe'</title>
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
<div class="jumbotron">
 <h1>Oops...!!! </h1>
 <p>Kindly enter your Restaurant details before adding food items.</p>
 <p><a href="myrestaurant.php"> Click Me </a></p>

</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
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
<script src="https://cdn.ajsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
