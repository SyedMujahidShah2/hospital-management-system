<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>

body {
      background: linear-gradient(120deg, #f0f4ff, #e8f0ff);
      font-family: 'Segoe UI', sans-serif;
    }


    /* Navbar Gradient */
    .navbar {
    background: linear-gradient(90deg, #4e73df, #6f42c1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  }
    .navbar-gradient .nav-link {
      color: rgba(255, 255, 255, 0.85);
      font-weight: 500;
      transition: color 0.2s ease-in-out;
    }
    .navbar-gradient .nav-link:hover,
    .navbar-gradient .nav-link.active {
      color: #fff;
    }
    .navbar-brand {
      font-weight: bold;
      color: white !important;
    }

    /* Heading Gradient */
    .gradient-text {
      background: linear-gradient(90deg, #4e73df, #6f42c1);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: bold;
    }

    /* Table Styling */
    .table thead {
      background: linear-gradient(90deg, #4e73df, #6f42c1);
      color: white;
    }
    .table-hover tbody tr:hover {
      background-color: rgba(78, 115, 223, 0.05);
    }

    .table th {
      background: linear-gradient(135deg, #4e73df, #6f42c1);  !important;
      color: white;
    }
    /* Action Buttons */
    .action-buttons {
      text-align: center;
      white-space: nowrap;
    }
    .action-buttons a {
      display: inline-block;
      padding: 6px 14px;
      font-size: 14px;
      font-weight: 500;
      color: #fff;
      border-radius: 6px;
      text-decoration: none;
      transition: all 0.2s ease-in-out;
    }
    .btn-update {
      background-color: #f0ad4e;
      margin-right: 5px;
    }
    .btn-update:hover {
      background-color: #ec971f;
    }
    .btn-delete {
      background-color: #d9534f;
    }
    .btn-delete:hover {
      background-color: #c9302c;
    }

    /* Navbar link default style */
.navbar-nav .nav-link {
  color: rgba(255,255,255,0.8);
  font-weight: 400;
  transition: all 0.2s ease-in-out;
}

/* Hover effect */
.navbar-nav .nav-link:hover {
  color: #fff;
  font-weight: 700;
}

/* Active link */
.navbar-nav .nav-link.active {
  color: #fff;
  font-weight: 700;
}

  </style>
</head>
<body>

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand fw-bold" href="dashboard.html"><i class="fas fa-hospital"></i> HospitalMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="book-appointment.php"><i class="fas fa-calendar-plus"></i> Book Appointment</a></li>
          <li class="nav-item"><a class="nav-link" href="doctors.html"><i class="fas fa-user-md"></i> Doctors</a></li>
          <li class="nav-item"><a class="nav-link" href="reports.html"><i class="fas fa-file-medical"></i> Reports</a></li>
          <li class="nav-item"><a class="nav-link " href="view-appointments.php"><i class="fas fa-calendar-check"></i> My Appointments</a></li>
          <li class="nav-item"><a class="nav-link active" href="edit-appoint.php"><i class="fas fa-edit"></i> Edit Appointments</a></li>
         
        
          <!-- Profile Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
              <i class="fas fa-user-circle"></i> Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-bell"></i> Notifications</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Appointments Table -->
  <div class="container mt-4">
    <h2 class="mb-4 gradient-text"><i class="fas fa-edit me-2"></i>Edit Appointments</h2>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Doctor</th>
          <th>Date</th>
          <th>Time</th>
          <th style="width: 200px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        $query = "SELECT * FROM appoints";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo htmlspecialchars($row['doctor']); ?></td>
            <td><?php echo htmlspecialchars($row['date']); ?></td>
            <td><?php echo date("h:i A", strtotime($row['time'])); ?></td>
            <td class="action-buttons">
              <a href="update.php?sno=<?php echo $row['sno']; ?>" class="btn-update">Update</a>
              <a href="delete.php?sno=<?php echo $row['sno']; ?>" class="btn-delete"
                 onclick="return confirm('Are you sure you want to delete this appointment?');">
                 Delete
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
  link.addEventListener('click', function() {
    document.querySelectorAll('.navbar-nav .nav-link').forEach(l => l.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>

</body>
</html>
