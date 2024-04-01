<?php
session_start(); // Start the session
$errors = array();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password_repeat'];

    // Validation checks
    if (empty($fullname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $errors[] = "All fields are required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
        $errors[] = "Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character";
    }
    if ($password !== $passwordRepeat) {
        $errors[] = "Passwords do not match";
    }

    // If no errors, proceed with insertion
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert data into the database
        require_once "connection.php";
        $conn = Connect();
        
        // Check if email already exists
        $checkQuery = "SELECT * FROM CUSTOMER WHERE email = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        
        // Check if email already exists
        if ($checkResult->num_rows > 0) {
            $errors[] = "Email already exists";
        } else {
            // Check if username already exists
            $checkUsernameQuery = "SELECT * FROM CUSTOMER WHERE username = ?";
            $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
            $checkUsernameStmt->bind_param("s", $username);
            $checkUsernameStmt->execute();
            $checkUsernameResult = $checkUsernameStmt->get_result();

            if ($checkUsernameResult->num_rows > 0) {
                $errors[] = "Username already exists";
            } else {
                // Proceed with insertion
                // Insert user data into the database
                $insertQuery = "INSERT INTO CUSTOMER (fullname, username, email, contact, address, password) VALUES (?, ?, ?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertQuery);
                $insertStmt->bind_param("ssssss", $fullname, $username, $email, $contact, $address, $hashedPassword);
                $insertStmt->execute();
                $insertStmt->close();
                
                // Close database connection
                $conn->close();
                
                // Redirect to login page
                header("Location: customer_registered_success.php");
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Guest Sign Up | CakeBytes Cafe'</title>
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

    <div class="container">
    <div class="jumbotron">
        <h1>Hi Guest, <br> Welcome to <span class="edit"> Dream Cafe' </span></h1>
        <br>
        <p>Get started by creating your account</p>
    </div>
</div>
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>

                    <li class="nav-item"><a class="nav-link" href="reservation.php">Make a Reservation</a></li>
                    <li class="nav-item"><a class="nav-link" href="customerlogin.php">Guest Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


<div class="container" style="margin-top:150px">
    <div class="jumbotron">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Sign Up</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php if(isset($fullname)) echo htmlspecialchars($fullname); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($username)) echo htmlspecialchars($username); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)) echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number:</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php if(isset($contact)) echo htmlspecialchars($contact); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($address)) echo htmlspecialchars($address); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <li>It must be a minimum of 8 characters long.</li>
                        <li>It should include at least one uppercase letter.</li>
                        <li>It should include at least one lowercase letter.</li>
                        <li>It should include at least one number.</li>
                        <li>It should include at least one special character.</li>
                    </div>
                    <div class="form-group">
                        <label for="password_repeat">Repeat Password:</label>
                        <input type="password" class="form-control" id="password_repeat" name="password_repeat">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <?php
                    if (!empty($errors)) {
                        echo '<div class="alert alert-danger" role="alert">';
                        foreach ($errors as $error) {
                            echo '<p>' . $error . '</p>';
                        }
                        echo '</div>';
                    }
                    ?>
                </form>
            </div>
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

<!-- Scroll to Top Button -->
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
