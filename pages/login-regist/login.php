<?php
// Assuming your database connection credentials
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "presentodb";

// Create a connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check if the user exists in the database
$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    // Successful login
    // You can set sessions or cookies to manage user sessions here
    header('Location: ../../index.php'); // Corrected redirection
    exit();
} else {
    // Failed login
    echo "Invalid email or password.";
}

// Close the database connection
$conn->close();
?>
