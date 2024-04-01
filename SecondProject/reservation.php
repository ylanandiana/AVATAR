<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['login_user2'])) {
    // Redirect the user to the login page
    header("Location: customerlogin.php");
    exit; // Stop further execution of the script
}

include_once 'connection.php'; // Include the file containing the Connect() function

// Define variables to store messages
$message = $error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_SESSION['login_user2']; // Assuming this is the username of the logged-in user
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $guest_name = $_POST['guest_name']; // New field for the guest's name

    // Establish database connection
    $conn = Connect();

    // Prepare SQL statement to insert reservation data
    $stmt = $conn->prepare("INSERT INTO reservations (username, guest_name, reservation_date, reservation_time, number_of_guests) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssi", $username, $guest_name, $reservation_date, $reservation_time, $number_of_guests);

    // Execute statement
    if ($stmt->execute()) {
        $message = "Reservation successfully added!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reservation.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Make a Reservation</h2>
                <?php if(isset($message)) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div>
                <?php } ?>
                <?php if(isset($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
                <?php } ?>
                <form method="post">
                    <div class="form-group">
                        <label for="guest_name">Your Name:</label>
                        <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                    </div>
                    <div class="form-group">
                        <label for="reservation_date">Reservation Date:</label>
                        <input type="date" class="form-control" id="reservation_date" name="reservation_date" required>
                    </div>
                    <div class="form-group">
                        <label for="reservation_time">Reservation Time:</label>
                        <input type="time" class="form-control" id="reservation_time" name="reservation_time" required>
                    </div>
                    <div class="form-group">
                        <label for="number_of_guests">Number of Guests:</label>
                        <input type="number" class="form-control" id="number_of_guests" name="number_of_guests" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
</body>

</html>
