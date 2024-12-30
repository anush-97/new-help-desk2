<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamma_helpdesk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// SQL query to fetch tickets
$sql = "SELECT name, department, title, category, priority, status, dateTime FROM tickets"; // Adjust table name as needed
$result = $conn->query($sql);

$tickets = [];
if ($result->num_rows > 0) {
    // Fetch all tickets
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
}

// Return the tickets as JSON
echo json_encode($tickets);

// Close the connection
$conn->close();
?>