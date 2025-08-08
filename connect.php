<?php
$servername = "localhost"; // Server Name (Agar same machine pe chal raha hai toh "localhost")
$username = "root"; // Aapka MySQL username (By default "root" hota hai)
$password = ""; // MySQL password (Agar aapne set nahi kiya toh blank chhodein)
$dbname = "tour_booking"; // Aapka database ka naam

// MySQLi object-oriented connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>