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

// Check if the userRole cookie is set and equals 0
if (isset($_COOKIE['userRole']) && $_COOKIE['userRole'] == 0) {
    // Check if the userId cookie is set
    if (isset($_COOKIE['userId'])) {
        $userId = $_COOKIE['userId']; // Get userId from the cookie

        // Fetch tickets for this user within one month
    $sql = "SELECT Name, Department, Title, Category, Priority, Date_Time, status 
        FROM new_ticket 
        WHERE userId = ? 
        AND STR_TO_DATE(Date_Time, '%m/%d/%Y, %h:%i:%s %p') >= NOW() - INTERVAL 1 MONTH
       ORDER BY STR_TO_DATE(Date_Time, '%m/%d/%Y, %h:%i:%s %p') DESC";


        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("i", $userId); // Bind the userId as an integer

        // Execute the statement
        $stmt->execute();

        // Store the result
        $result = $stmt->get_result();

        // Check if any tickets were found
        if ($result->num_rows > 0) {
            // Output the ticket data
            while ($row = $result->fetch_assoc()) {
                echo "<div class='ticket'>";
                echo "<div><strong>Name:</strong> " . htmlspecialchars($row['Name']) . "</div>";
                echo "<div><strong>Department:</strong> " . htmlspecialchars($row['Department']) . "</div>";
                echo "<div><strong>Title:</strong> " . htmlspecialchars($row['Title']) . "</div>";
                echo "<div><strong>Category:</strong> " . htmlspecialchars($row['Category']) . "</div>";
                echo "<div><strong>Priority:</strong> " . htmlspecialchars($row['Priority']) . "</div>";
                echo "<div><strong>Status:</strong> " . htmlspecialchars($row['status']) . "</div>";
                echo "<div><strong>Date and Time:</strong> " . htmlspecialchars($row['Date_Time']) . "</div>";
                echo "</div>"; // Close ticket div
            }
        } else {
            echo "No tickets found for this user within the last month.";
        }

        $stmt->close();
    } else {
        echo "User is not logged in or userId cookie is missing.";
    }
} else {
    // echo "ALL RECIEVED TICKTES";
}

$conn->close();
?>
