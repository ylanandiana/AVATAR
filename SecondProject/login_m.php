<?php
session_start(); 
$error = ''; 

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Establish Connection with Server by including connection.php
        require_once 'connection.php';
        $conn = Connect();

        // SQL query to fetch information of registered users and find user match.
        $query = "SELECT username, password FROM manager WHERE username=? LIMIT 1";

        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User exists, now verify the password
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['login_user1'] = $username; // Initializing Session
                header("location: myrestaurant.php"); // Redirecting To Other Page
                exit();
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "User not found";
        }

        // Close Statement and Connection
        $stmt->close();
        $conn->close();
    }
}
?>
