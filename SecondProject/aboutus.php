<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | CakeBytes Cafe'</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
</head>

<style>

.dessert-header {
        font-family: 'Sacramento', cursive;
        font-size: 2.5rem;
        margin-bottom: 20px; /* Add some spacing below the heading */
        letter-spacing: 1.5px; /* Adjust letter spacing */
        text-align: center; /* Center the text */
    }

    .dessert-description {
        font-family: 'Open Sans', sans-serif;
        font-size: 1.2rem;
        line-height: 1.5; /* Set line height for better readability */
        letter-spacing: 1px; /* Adjust letter spacing */
        text-align: center; /* Center the text */
    }
    
    .dessert-theme {
    background-color: #ffeecc; /* Creamy background color */
    padding: 50px 20px; /* Padding for spacing */
    min-height: 100vh; /* Set the minimum height to cover the entire viewport */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.tagline {
    font-family: 'Pacifico', cursive; /* Cursive font for tagline */
    font-size: 48px; /* Larger font size for tagline */
    color: #ff7f50; /* Coral color for tagline text */
    margin-bottom: 20px; /* Bottom margin for spacing */
}

h1 {
    font-family: 'Roboto Slab', serif; /* Serif font for main heading */
    font-size: 64px; /* Larger font size for main heading */
    color: #8b4513; /* Saddle Brown color for main heading text */
    margin-bottom: 30px; /* Bottom margin for spacing */
}

h2.dessert-description {
    font-family: 'Open Sans', sans-serif;
    font-size: 1.2rem;
    line-height: 1.5;
    letter-spacing: 1px;
    text-align: center;
    margin-bottom: 10px; /* Reduce bottom margin for spacing */
}

.dessert-image {
    width: 80%; /* Adjust the width as needed */
    max-width: 600px; /* Set a maximum width to maintain quality */
    height: auto; /* Maintain aspect ratio */
    display: block; /* Center the image */
    margin: 0 auto; /* Center the image horizontally */
}
 </style>

<body>

<button onclick="topFunction()" id="myBtn" name="Go to top" style="display: none;">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </button>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo1.png" alt="CakeBytes Logo" class="mr-2"> CakeBytes Cafe'
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="aboutus.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservation.php">Make a Reservation</a></li>
                </ul>
                <!-- User Session Links -->
                <?php if(isset($_SESSION['login_user1']) || isset($_SESSION['login_user2'])) { ?>
                    <ul class="navbar-nav ml-auto">
                        <?php if(isset($_SESSION['login_user1'])) { ?>
                            <li class="nav-item"><a class="nav-link" href="#">Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
                            <li class="nav-item"><a class="nav-link" href="logout_m.php">Log Out</a></li>
                        <?php } elseif (isset($_SESSION['login_user2'])) { ?>
                            <li class="nav-item"><a class="nav-link" href="#">Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="foodlist.php">Food Zone</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">Cart (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : '0'; ?>)</a></li>
                            <li class="nav-item"><a class="nav-link" href="logout_u.php">Log Out</a></li>
                        <?php } ?>
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
    <br>
    <br>
    

    <!-- Header Section -->
 
    <div class="wide text-center dessert-theme">
    <!-- Add your image here -->
    <img src="images/dish.gif" alt="Dessert Image" class="img-fluid dessert-image">

    <br>
    <br>
    
    <div class="tagline"><strong>Indulge in Sweet Delights!</strong></div>
    <div class="tagline">Dreamy Desserts</div>
    
    <div class="wide text-center dessert-theme">
        <h2 class="dessert-header">Welcome to our Online Dessert Paradise!</h2>
        <br>
        <h2 class="dessert-description">Escape into a world of delectable treats where every bite tells a story. Experience the joy of sweetness as you explore our mouthwatering selection of desserts. With our easy-to-use platform, satisfy your cravings with just a few clicks. Dive into the enchanting descriptions, tempting visuals, and delightful reviews to find your perfect dessert match!</h2>
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
