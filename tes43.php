<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamma Interpharm Help Desk</title>
    <link rel="icon" href="gammainterpharm brandin main logo x2.jpg" type="gammainterpharm brandin main logo x2.jpg">
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
            <h1>IT Helpdesk</h1>
            <div>
                <button id="createTicketBtn" class="button">Create Ticket</button>
                <button id="logoutBtn" class="button button-secondary"><i class="fa-solid fa-user"></i> Logout</button>
            </div>
        </div>

        <h1>Welcome!</h1>

        <div class="filter-status">
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

        <div id="activeFilters" class="active-filters"></div>

        <div id="errorMessage" class="error"></div>
        <div id="ticketList"></div>
        <div id="submittedData" class="submitted-data"></div> <!-- Added to display submitted data -->
    </div>

    <div id="modal">
        <div class="modal-content">
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
                <input type="text" id="title" name='title' required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name= 'category'required>
                    <option value="network">Network</option>
                    <option value="hardware">Hardware</option>
                    <option value="software">Software</option>
                    <option value="printer">Printer</option>
                </select>
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
    </div>

    <script>
        class TicketManager {
            constructor() {
                this.tickets = JSON.parse(localStorage.getItem('tickets')) || [];
                this.loadStatusView();
                
                this.initEventListeners();
                this.renderTickets();
                this.setDateTime();
                this.displaySubmittedData(); // Call to display submitted data
            }

            initEventListeners() {
                document.getElementById('createTicketBtn').addEventListener('click', () => {
                    document.getElementById('modal').style.display = 'block';
                    this.setDateTime();
                });

                document.querySelector('.close-modal').addEventListener('click', () => {
                    document.getElementById('modal').style.display = 'none';
                });

                document.getElementById('clearFormBtn').addEventListener('click', () => {
                    this.clearForm();
                });

                document.getElementById('statusFilter').addEventListener('change', () => {
                    this.renderTickets();
                    this.updateActiveFilters();
                });

                document.getElementById('priorityFilter').addEventListener('change', () => {
                    this.renderTickets();
                    this.updateActiveFilters();
                });

                document.getElementById('logoutBtn').addEventListener('click', () => {
                    this.logout();
                });
            }

            setDateTime() {
                const now = new Date();
                const dateTimeString = now.toLocaleString();
                document.getElementById('dateTime').value = dateTimeString;
            }

            renderTickets() {
                const statusFilter = document.getElementById('statusFilter').value;
                const priorityFilter = document.getElementById('priorityFilter').value;

                const filteredTickets = this.tickets.filter(ticket => {
                    const matchesStatus = !statusFilter || ticket.status === statusFilter;
                    const matchesPriority = !priorityFilter || ticket.priority === priorityFilter;
                    return matchesStatus && matchesPriority;
                });

                const ticketList = document.getElementById('ticketList');
                ticketList.innerHTML = '';

                filteredTickets.forEach((ticket, index) => {
                    const ticketElement = document.createElement('div');
                    ticketElement.classList.add('ticket');

                    ticketElement.innerHTML = `
                        <div class="ticket-header">
                            <div class="ticket-title">${ticket.title}</div>
                            <div class="priority ${ticket.priority}">${ticket.priority}</div>
                        </div>
                        <div><strong>Name:</strong> ${ticket.name}</div>
                        <div><strong>Department:</strong> ${ticket.department}</div>
                        <div><strong>Status:</strong> ${ticket.status}</div>
                        <div><strong>Category:</strong> ${ticket.category}</div>
                        <div><strong>Date and Time:</strong> ${ticket.dateTime}</div>
                        <button class="delete-button" onclick="ticketManager.deleteTicket(${index})">Delete</button>
                        <button class="action-button" onclick="ticketManager.acceptTicket(${index})">Accept</button>
                        <button class="action-button reject" onclick="ticketManager.rejectTicket(${index})">Reject</button>
                    `;

                    ticketList.appendChild(ticketElement);
                });
            }

            displaySubmittedData() {
                const submittedData = this.tickets.map(ticket => `
                    <div class="ticket">
                        <div><strong>Name:</strong> ${ticket.name}</div>
                        <div><strong>Department:</strong> ${ticket.department}</div>
                        <div><strong>Title:</strong> ${ticket.title}</div>
                        <div><strong>Category:</strong> ${ticket.category}</div>
                        <div><strong>Priority:</strong> ${ticket.priority}</div>
                        <div><strong>Status:</strong> ${ticket.status}</div>
                        <div><strong>Date and Time:</strong> ${ticket.dateTime}</div>
                    </div>
                `).join('');
                document.getElementById('submittedData').innerHTML = submittedData;
            }

            acceptTicket(index) {
                this.tickets[index].status = 'ACCEPTED';
                localStorage.setItem('tickets', JSON.stringify(this.tickets));
                this.renderTickets();
                this.displaySubmittedData(); // Update displayed data
            }

            rejectTicket(index) {
                this.tickets[index].status = 'REJECTED';
                localStorage.setItem('tickets', JSON.stringify(this.tickets));
                this.renderTickets();
                this.displaySubmittedData(); // Update displayed data
            }

            deleteTicket(index) {
                this.tickets.splice(index, 1);
                localStorage.setItem('tickets', JSON.stringify(this.tickets));
                this.renderTickets();
                this.displaySubmittedData(); // Update displayed data
            }

            clearForm() {
                document.getElementById('ticketForm').reset();
                this.setDateTime();
            }

            clearFilters() {
                document.getElementById('statusFilter').value = '';
                document.getElementById('priorityFilter').value = '';
                this.renderTickets();
                this.updateActiveFilters();
            }

            updateActiveFilters() {
                const activeFilters = [];
                const statusFilter = document.getElementById('statusFilter').value;
                const priorityFilter = document.getElementById('priorityFilter').value;

                if (statusFilter) {
                    activeFilters.push(`<span class="filter-tag">${statusFilter} <span class="remove-filter" onclick="removeStatusFilter()">x</span></span>`);
                }
                if (priorityFilter) {
                    activeFilters.push(`<span class="filter-tag">${priorityFilter} <span class="remove-filter" onclick="removePriorityFilter()">x</span></span>`);
                }

                document.getElementById('activeFilters').innerHTML = activeFilters.join('');
            }

            loadStatusView() {
                const savedStatus = localStorage.getItem('statusFilter');
                const savedPriority = localStorage.getItem('priorityFilter');
                if (savedStatus) {
                    document.getElementById('statusFilter').value = savedStatus;
                }
                if (savedPriority) {
                    document.getElementById('priorityFilter').value = savedPriority;
                }
            }

            saveStatusView() {
                const statusFilter = document.getElementById('statusFilter').value;
                const priorityFilter = document.getElementById('priorityFilter').value;
                localStorage.setItem('statusFilter', statusFilter);
                localStorage.setItem('priorityFilter', priorityFilter);
            }

            logout() {
                localStorage.removeItem('username');
                window.location.href = 'http://localhost:8080/helpdesk/user24.html';
            }

            submitTicket() {
                const name = document.getElementById('name').value;
                const department = document.getElementById('department').value;
                const title = document.getElementById('title').value;
                const category = document.getElementById('category').value;
                const priority = document.getElementById('priority').value;
                const dateTime = document.getElementById('dateTime').value;

                  const newTicket = {
                    name,
                    department,
                    title,
                    category,
                    priority,
                    status: 'NEW',
                    dateTime
                };


                this.tickets.push(newTicket);
                localStorage.setItem('tickets', JSON.stringify(this.tickets));
                this.renderTickets();
                this.displaySubmittedData(); // Update displayed data
                this.clearForm(); // Clear the form after submission
            }



        }

        function removeStatusFilter() {
            document.getElementById('statusFilter').value = '';
            ticketManager.renderTickets();
            ticketManager.updateActiveFilters();
        }

        function removePriorityFilter() {
            document.getElementById('priorityFilter').value = '';
            ticketManager.renderTickets();
            ticketManager.updateActiveFilters();
        }

        const ticketManager = new TicketManager();
    </script>
</body>
</html>
