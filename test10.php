

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamma Interpharm Help Desk</title>
    <link rel="icon" href="gammainterpharm brandin main logo x2.jpg" type="gammainterpharm brandin main logo x2.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url("gammainterpharm brandin main logo x2.jpg");
            background-color: #FFFFFF;
            height: 40%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-size: 300px 200px;
        }
        .container {
            max-width: 850px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgb(255, 255, 255);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .header img {
            height: 60px;
            margin-right: 70px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button-secondary {
            background-color: #6c757d;
            color: white;
        }
        .button-secondary:hover {
            background-color: #545b62;
        }
        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
            flex-wrap: wrap;
        }
        .ticket {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .priority {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 3px;
        }
        .priority.HIGH {
            background-color: #ffdddd;
            color: #d9534f;
        }
        .priority.MEDIUM {
            background-color: #fff5cc;
            color: #f0ad4e;
        }
        .priority.LOW {
            background-color: #ddffdd;
            color: #5cb85c;
        }
        #modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
        }
        .close-modal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-modal:hover {
            color: black;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, 
        .form-group select, 
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .ticket-form-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .filter-status {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .active-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
        .filter-tag {
            background-color: #f1f1f1;
            padding: 5px 10px;
            border-radius: 3px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .filter-tag .remove-filter {
            cursor: pointer;
            color: red;
            font-weight: bold;
        }
        .delete-button {
            background-color: #d9534f;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .delete-button:hover {
            background-color: #c9302c;
        }
        .action-button {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 5px;
        }
        .action-button.reject {
            background-color: #dc3545;
        }
        .action-button:hover {
            background-color: #218838;
        }
        .action-button.reject:hover {
            background-color: #c82333;
        }




          /* Basic styles for the modal */
        #modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close-modal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .model-container{
            background-color: white !important;
        }

        .close-modal:hover,
        .close-modal:focus {
            color: black;
            text-decoration: none;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .ticket-form-buttons {
            display: flex;
            justify-content: space-between;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .button-secondary {
            background-color: #f0f0f0;
            color: #333;
        }

        .button-secondary:hover {
            background-color: #ddd;
        }

        .button {
            background-color: #007BFF;
            color: white;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>

        function showSuccessAlert() {
            // Display a success alert when the button is clicked
            alert("submitted successfully!");
        }
    </script>



</head>
<body>

<form action="new_ticket.php" method="POST" onsubmit="showSuccessAlert(); ticketManager.submitTicket(); return false;">

    <div class="container">
        <div class="header">
            <img src="gammainterpharm brandin main logo x2.jpg" alt="Logo">
            <h1 class="text-center">IT Helpdesk</h1>
            <div>
                <button id="createTicketBtn" class="button">Create Ticket</button>
                <button id="logoutBtn" class="button button-secondary"><i class="fa-solid fa-user"></i> Logout</button>
            </div>
        </div>

        <h1 id="welcomeMessage" class="text-left">Welcome!</h1>

       <!--  <div class="filter-status">
            <div class="filters">
                <select id="statusFilter" onchange="saveStatusView()">
                    <option value="">All Status</option>
                    <option value="NEW">New</option>
                    <option value="ASSIGNED">Assigned</option>
                    <option value="IN_PROGRESS">In Progress</option>
                </select>

                <select id="priorityFilter" onchange="saveStatusView()">
                    <option value="">All Priorities</option>
                    <option value="LOW">Low</option>
                    <option value="MEDIUM">Medium</option>
                    <option value="HIGH">High</option>
                </select>
            </div>
        </div>
 -->
        <div id="activeFilters" class="active-filters"></div>

        <div id="errorMessage" class="error"></div>
        <div id="ticketList"></div>
        <div id="submittedData" class="submitted-data"></div> <!-- Added to display submitted data -->
    </div>

    <div id="modal">
        <div class="modal-content model-container" >
            <span class="close-modal">&times;</span>
            <h2>Create New Ticket</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name='username' required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select id="department"  name='department'required>
                    <option value="">Select Department</option>
                    <option value="Account">Account</option>
                    <option value="Logistic">Logistic</option>
                    <option value="Events">Events</option>
                    <option value="IT">IT</option>
                    <option value="Reg">Reg</option>
                    <option value="HR">HR</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Receptions Dept">Receptions Dept</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <select id="title" name= 'title'required>
                    <option value="DGM">DGM</option>
                    <option value="Manager">Manager</option>
                    <option value="Assistant Manager">Assistant Manager</option>
                    <option value="Executive">Executive</option>
                    <option value="Executive Assistant">Executive Assistant</option>
                    <option value="Senior Executive Assistant">Senior Executive Assistant</option>
                    <option value="Junior Executive Assistant">Junior Executive Assistant</option>
                    <option value="Assistant">Assistant</option>
                    <option value="Office Assistant">Office Assistant</option>
                    <!--<option value="printer">Printer</option>-->
                </select>

               <!-- <input type="text" id="title" name='title' required>-->
            </div>
            <div class="form-group">
                <label for="category">Description</label>
                <textarea type="text" id="category" name='category' required></textarea>
               <!--  <select id="category" name= 'category'required>
                    <option value="network">Network</option>
                    <option value="hardware">Hardware</option>
                    <option value="software">Software</option>
                    <option value="printer">Printer</option>
                </select> -->
            </div>
          
            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name = 'priority' required>
                    <option value="LOW">Low</option>
                    <option value="MEDIUM">Medium</option>
                    <option value="HIGH">High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateTime">Date and Time</label>
                <input type="text" id="dateTime" value="" name= 'dateTime' readonly>
            </div>
            <div class="ticket-form-buttons">
                <button type="button" id="clearFormBtn" class="button button-secondary">Clear</button>
                <button type="submit" class="button">Submit Ticket</button>
            </div>
        </div>
       <div>
    </div>
    </div>

</form>

<?php 
include_once('fetch_tickets.php'); 
?>

<?php 
include_once('admin-all-tickets.php'); 
?>




   



<!-- save user -->
 <script> document.addEventListener('DOMContentLoaded', () => {
    const loggedInUser = JSON.parse(localStorage.getItem('user'));
    const welcomeMessage = document.getElementById('welcomeMessage');
    
    
    if (loggedInUser && loggedInUser.name) {
       welcomeMessage.textContent = `Welcome, ${loggedInUser.name}`;
    } else {
        welcomeMessage.textContent = 'Welcome!';
    }
});</script>


<!-- logout -->
<script type="text/javascript">
    document.getElementById('logoutBtn').addEventListener('click', function () {

        console.log("test")
    // Function to clear cookies
    function clearCookies() {
        const cookies = document.cookie.split(";"); // Get all cookies
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i];
            const eqPos = cookie.indexOf("=");
            const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        }
    }

    // Clear cookies
    clearCookies();

    // Clear localStorage
    localStorage.removeItem('user');

    // Redirect to login page
    window.location.href = 'http://localhost:8080/helpdesk/user24.html'; // Update with the actual login page URL
});

</script>


<script>
        // JavaScript to handle modal behavior
        const modal = document.getElementById("modal");
        const createTicketBtn = document.getElementById("createTicketBtn");
        const closeModal = document.querySelector(".close-modal");

        // Show modal when button is clicked
        createTicketBtn.addEventListener("click", () => {
            modal.style.display = "block";
        });

        // Hide modal when close icon is clicked
        closeModal.addEventListener("click", () => {
            modal.style.display = "none";
        });

        // Hide modal when clicking outside the modal content
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

        // Clear form inputs
        const clearFormBtn = document.getElementById("clearFormBtn");
        clearFormBtn.addEventListener("click", () => {
            document.querySelectorAll(".form-group input, .form-group select").forEach(input => input.value = "");
        });

        // Set current date and time in the Date and Time field
        document.getElementById("dateTime").value = new Date().toLocaleString();
    </script>


</body>
</html>
