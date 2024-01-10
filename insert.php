<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create a new connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Prepare and bind a SQL statement
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Execute the statement
if ($stmt->execute()) {
  // Display a success message
  echo "Thank you for your feedback";
} else {
  // Display an error message
  echo "Something went wrong: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
