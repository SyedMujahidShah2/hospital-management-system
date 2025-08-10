<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(120deg, #f0f4ff, #e8f0ff);
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background: linear-gradient(135deg, #4e73df, #6f42c1); 
       }
    .table-container {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .table th {
      background: linear-gradient(135deg, #4e73df, #6f42c1);  !important;
      color: white;
    }
    .table-hover tbody tr:hover {
      background-color: #f1f5ff;
    }
    .page-title {
      font-weight: 600;
      color: #4e73df;
      display: flex;
      align-items: center;
      gap: 10px;
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
          <li class="nav-item"><a class="nav-link active" href="view-appointments.php"><i class="fas fa-calendar-check"></i> My Appointments</a></li>
          <li class="nav-item"><a class="nav-link" href="edit-appoint.php"><i class="fas fa-edit"></i> Edit Appointments</a></li>
        
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
    <h2 class="page-title"><i class="fas fa-calendar-check"></i> My Appointments</h2>
    <div class="table-container mt-3">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
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
              <td><?php echo $row['doctor']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td><?php echo date("h:i A", strtotime($row['time'])); ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body><script>
document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
  link.addEventListener('click', function() {
    document.querySelectorAll('.navbar-nav .nav-link').forEach(l => l.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>

</html>
