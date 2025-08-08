<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "akhepura";

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Corrected input names
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $location = $_POST['location'] ?? '';
    $date = $_POST['preferred_date'] ?? '';
    $service = $_POST['service'] ?? '';
    $message = $_POST['message'] ?? '';

    $sql = "INSERT INTO service_requests (name, email, phone, location, preferred_date, service, message)
            VALUES ('$name', '$email', '$phone', '$location', '$date', '$service', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.html after successful submission
        header("Location: index-2.html");
        exit(); // Always call exit after header redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
} else {
    echo "Please submit the form from the form page.";
}
?>
