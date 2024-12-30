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

// Check if the required POST data exists
if (isset($_POST['username'], $_POST['department'], $_POST['title'], $_POST['category'], $_POST['priority'], $_POST['dateTime']) && isset($_COOKIE['userId'])) {
    // Get the ticket data from the POST request
    $Name = $_POST['username'];
    $Department = $_POST['department'];
    $Title = $_POST['title'];
    $Category = $_POST['category'];
    $Priority = $_POST['priority'];
    $DateTime = $_POST['dateTime'];
    $status = 'NEW'; // default status
    $userId = $_COOKIE['userId']; // Retrieve userId from the cookie

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO new_ticket (userId, Name, Department, Title, Category, Priority, Date_Time, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("isssssss", $userId, $Name, $Department, $Title, $Category, $Priority, $DateTime, $status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New ticket created successfully";
        header("Location: http://localhost:8080/helpdesk/test10.php");

        // Function to display an alert message
        function function_alert($message) {
            echo "<script>alert('$message');</script>";
        }

        // Call the function to show a success alert
        function_alert("Ticket created successfully!");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: Missing required form data or userId cookie.";
}

$conn->close();
?>
