<?php
// Database credentials
$host = "localhost";
$user = "root";
$password = ""; // default password for root in XAMPP is empty
$database = "akhepura";

// Create DB connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$name = $_POST['template-contactform-name'];
$email = $_POST['template-contactform-email'];
$phone = $_POST['template-contactform-phone'];
$event_location = $_POST['event-loc'];
$event_date = $_POST['date'];
$service = $_POST['services'];
$message = $_POST['template-contactform-message'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO submissions (name, email, phone, event_location, event_date, service, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $phone, $event_location, $event_date, $service, $message);

// Execute
if ($stmt->execute()) {
    echo "Appointment request submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close
$stmt->close();
$conn->close();
?>
