<?php
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "gamma_helpdesk"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ticket_id is set in POST request
if (isset($_POST['ticket_id'])) {
    $ticket_id = intval($_POST['ticket_id']); // Get the ticket ID and convert to integer

    // Prepare the SQL statement to prevent SQL injection
    $sql = "DELETE FROM new_ticket WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ticket_id); // Bind the ticket ID as an integer

    // Execute the statement
    if ($stmt->execute()) {
        // Return a success message
        echo json_encode(["status" => "success", "message" => "Ticket deleted successfully."]);
    } else {
        // Return an error message
        echo json_encode(["status" => "error", "message" => "Error deleting ticket: " . $conn->error]);
    }

    $stmt->close();
} else {
    // Return an error message if ticket_id is not set
    echo json_encode(["status" => "error", "message" => "No ticket ID provided."]);
}

$conn->close();
?>