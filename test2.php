<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT Helpdesk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
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
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>IT Helpdesk</h1>
      <button id="createTicketBtn" class="button">Create Ticket</button>
    </div>

    <div class="filter-status">
      <div class="filters">
        <select id="statusFilter">
          <option value="">All Status</option>
          <option value="NEW">New</option>
          <option value="ASSIGNED">Assigned</option>
          <option value="IN_PROGRESS">In Progress</option>
        </select>

        <select id="priorityFilter">
          <option value="">All Priorities</option>
          <option value="LOW">Low</option>
          <option value="MEDIUM">Medium</option>
          <option value="HIGH">High</option>
        </select>

        <button id="clearStatusBtn" class="button">Clear Status</button>
        <button id="clearFiltersBtn" class="button">Clear All Filters</button>
        <button id="clearAllStatusBtn" class="button">All Status Clear</button>
      </div>
    </div>

    <div id="activeFilters" class="active-filters"></div>

    <div id="errorMessage" class="error"></div>
    <div id="ticketList"></div>
  </div>

  <div id="modal">
    <div class="modal-content">
      <span class="close-modal">&times;</span>
      <h2>Create New Ticket</h2>
      <form id="ticketForm">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" required>
        </div>
        <div class="form-group">
          <label for="department">Department</label>
          <input type="text" id="department" required>
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select id="category">
            <option value="network">Network</option>
            <option value="hardware">Hardware</option>
            <option value="software">Software</option>
            <option value="printer">Printer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Priority</label>
          <select id="priority">
            <option value="LOW">Low</option>
            <option value="MEDIUM">Medium</option>
            <option value="HIGH">High</option>
          </select>
        </div>
        <div class="ticket-form-buttons">
          <button type="button" id="clearFormBtn" class="button button-secondary">Clear</button>
          <button type="submit" class="button">Submit Ticket</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    class TicketManager {
      constructor() {
        this.tickets = JSON.parse(localStorage.getItem('tickets')) || [];
        this.initEventListeners();
        this.renderTickets();
      }

      initEventListeners() {
        document.getElementById('createTicketBtn').addEventListener('click', () => {
          document.getElementById('modal').style.display = 'block';
        });

        document.querySelector('.close-modal').addEventListener('click', () => {
          document.getElementById('modal').style.display = 'none';
        });

        document.getElementById('ticketForm').addEventListener('submit', (e) => {
          e.preventDefault();
          this.createTicket();
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

        document.getElementById('clearStatusBtn').addEventListener('click', () => {
          this.clearStatus();
        });

        document.getElementById('clearFiltersBtn').addEventListener('click', () => {
          this.clearFilters();
        });

        document.getElementById('clearAllStatusBtn').addEventListener('click', () => {
          this.clearAllStatusFilters();
        });
      }

      createTicket() {
        const name = document.getElementById('name').value;
        const department = document.getElementById('department').value;
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const category = document.getElementById('category').value;
        const priority = document.getElementById('priority').value;

        const ticket = {
          name,
          department,
          title,
          description,
          category,
          priority,
          status: 'NEW',
        };

        this.tickets.push(ticket);
        localStorage.setItem('tickets', JSON.stringify(this.tickets));

        document.getElementById('modal').style.display = 'none';
        this.renderTickets();
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

        filteredTickets.forEach(ticket => {
          const ticketElement = document.createElement('div');
          ticketElement.classList.add('ticket');

          ticketElement.innerHTML = `
            <div class="ticket-header">
              <div class="ticket-title">${ticket.title}</div>
              <div class="priority ${ticket.priority}">${ticket.priority}</div>
            </div>
            <div><strong>Name:</strong> ${ticket.name}</div>
            <div><strong>Department:</strong> ${ticket.department}</div>
            <div><strong>Description:</strong> ${ticket.description}</div>
            <div><strong>Status:</strong> ${ticket.status}</div>
            <div><strong>Category:</strong> ${ticket.category}</div>
          `;

          ticketList.appendChild(ticketElement);
        });
      }

      clearForm() {
        document.getElementById('ticketForm').reset();
      }

      clearStatus() {
        document.getElementById('statusFilter').value = '';
        this.renderTickets();
      }

      clearFilters() {
        document.getElementById('statusFilter').value = '';
        document.getElementById('priorityFilter').value = '';
        this.renderTickets();
      }

      clearAllStatusFilters() {
        document.getElementById('statusFilter').value = '';
        document.getElementById('priorityFilter').value = '';
        this.renderTickets();
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
    }

    new TicketManager();
  </script>
</body>
</html>
