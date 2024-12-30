<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <style>
        .ticket {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }
        .ticket-actions {
            margin-top: 10px;
        }
    </style>
</head>
<body>

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

// Check if the userRole cookie is set and equals 1
if (isset($_COOKIE['userRole']) && $_COOKIE['userRole'] == 1) {
    echo '<div class="container mt-5">';
    echo '<h1 class="mb-5">Ticket Management</h1>';

    echo '<div id="message"></div>'; // Placeholder for messages

    // Fetch all tickets within one month
   $sql = "SELECT id, Name, Department, Title, Category, Priority, Date_Time, status 
        FROM new_ticket 
        WHERE STR_TO_DATE(Date_Time, '%m/%d/%Y, %h:%i:%s %p') >= NOW() - INTERVAL 1 MONTH
        ORDER BY STR_TO_DATE(Date_Time, '%m/%d/%Y, %h:%i:%s %p') DESC";

    $result = $conn->query($sql);

    // Check if any tickets were found
    if ($result->num_rows > 0) {
        // Output the ticket data
        while ($row = $result->fetch_assoc()) {
            echo "<div class='ticket w-75 mx-auto mt-4' id='ticket-".$row['id']."'>";
            echo "<div><strong>Name:</strong> " . htmlspecialchars($row['Name']) . "</div>";
            echo "<div><strong>Department:</strong> " . htmlspecialchars($row['Department']) . "</div>";
            echo "<div><strong>Title:</strong> " . htmlspecialchars($row['Title']) . "</div>";
            echo "<div><strong>Category:</strong> " . htmlspecialchars($row['Category']) . "</div>";
            echo "<div><strong>Priority:</strong> " . htmlspecialchars($row['Priority']) . "</div>";
            echo "<div><strong>Status:</strong> <span class='ticket-status'>" . htmlspecialchars($row['status']) . "</span></div>";
            echo "<div><strong>Date and Time:</strong> " . htmlspecialchars($row['Date_Time']) . "</div>";

            // Add buttons for Delete, Accept, and Reject
            echo "<div class='ticket-actions'>";
            echo "<button class='btn btn-danger delete-ticket' data-id='" . htmlspecialchars($row['id']) . "'>Delete</button>";
            echo "<button class='btn btn-success accept-btn' data-id='" . htmlspecialchars($row['id']) . "'>Accept</button>";
            echo "<button class='btn btn-warning'>Reject</button>";
            echo "</div>"; // Close ticket-actions div
            echo "</div>"; // Close ticket div
        }
    } else {
        echo "<div class='alert alert-info'>No tickets found within the last month.</div>";
    }

    echo '</div>'; // Close container div
} else {
    // If userRole is not 1, show an access denied message
    // echo '<div class="container mt-5">';
    // echo '<div class="alert alert-danger">Access denied: You do not have the required permissions.</div>';
    // echo '</div>'; // Close container div
}

$conn->close();
?>

<script>
$(document).ready(function() {
    // Handle delete button click
    $('.delete-ticket').click(function() {
        var ticketId = $(this).data('id');
        var ticketDiv = $('#ticket-' + ticketId); // Get the ticket div to remove

        // AJAX request to `delete_ticket.php`
        $.ajax({
            type: "POST",
            url: "delete_ticket.php",
            data: { ticket_id: ticketId },
            success: function(response) {
                // Assuming the response is a success message
                $('#message').html("<div class='alert alert-success'>Ticket deleted successfully.</div>");
                ticketDiv.remove(); // Remove the ticket from the UI
            },
            error: function(xhr, status, error) {
                // Handle error response
                $('#message').html("<div class='alert alert-danger'>Error deleting ticket: " + xhr.responseText + "</div>");
            }
        });
    });

    // Handle accept button click
    $('.accept-btn').click(function() {
        var ticketId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: 'accept_ticket.php',
            data: { ticket_id: ticketId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                    // Update the status in real-time
                    $('#ticket-' + ticketId).find('.ticket-status').text('ACCEPT');
                } else {
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function() {
                $('#message').html('<div class="alert alert-danger">An error occurred while processing your request.</div>');
            }
        });
    });
});
</script>

</body>
</html>