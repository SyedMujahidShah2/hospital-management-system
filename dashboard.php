<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
  body {
    background: linear-gradient(120deg, #f0f4ff, #e8f0ff);
    font-family: 'Segoe UI', sans-serif;
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


  /* Navbar */
  .navbar {
    background: linear-gradient(90deg, #4e73df, #6f42c1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  }
  .navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
  }
  .navbar .dropdown-menu {
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
  }
  .notification-bell {
    position: relative;
  }
  .notification-dot {
    position: absolute;
    top: 4px;
    right: 6px;
    width: 8px;
    height: 8px;
    background: red;
    border-radius: 50%;
  }

  /* Page Heading */
  .dashboard-header {
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
  }

  /* Stat Cards */
  .stat-card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    display: flex;
    align-items: center;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.05);
    transition: 0.3s;
  }
  .stat-card:hover {
    transform: translateY(-5px);
  }
  .stat-icon {
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: white;
    border-radius: 50%;
    font-size: 28px;
    padding: 15px;
    margin-right: 15px;
  }
  .stat-number {
    font-size: 1.5rem;
    font-weight: bold;
  }
  .stat-label {
    font-size: 0.9rem;
    color: gray;
  }

  /* Dashboard Feature Cards */
  .feature-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.05);
    transition: 0.3s;
  }
  .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
  }
  .feature-icon {
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: white;
    border-radius: 50%;
    font-size: 35px;
    padding: 18px;
    margin-bottom: 15px;
  }
  .btn-primary {
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    border: none;
    border-radius: 50px;
    padding: 8px 20px;
    font-weight: 500;
  }
  .btn-primary:hover {
    opacity: 0.9;
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
          <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="book-appointment.php"><i class="fas fa-calendar-plus"></i> Book Appointment</a></li>
          <li class="nav-item"><a class="nav-link" href="doctors.html"><i class="fas fa-user-md"></i> Doctors</a></li>
          <li class="nav-item"><a class="nav-link" href="reports.html"><i class="fas fa-file-medical"></i> Reports</a></li>
          <li class="nav-item"><a class="nav-link " href="view-appointments.php"><i class="fas fa-calendar-check"></i> My Appointments</a></li>
         
        
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

<!-- Header -->
<div class="container mt-4">
  <div class="dashboard-header">
    <h2>Welcome, Stella </h2>
    <p>Your health dashboard at a glance</p>
  </div>
</div>

<!-- Stats Row -->
<div class="container mt-4">
  <div class="row g-4">
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
        <div>
          <?php
          include 'config.php';
          $countQuery = "SELECT COUNT(*) AS total FROM appoints";
          $countResult = mysqli_query($conn, $countQuery);
          $countRow = mysqli_fetch_assoc($countResult);
          ?>
          <div class="stat-number"><?php echo $countRow['total']; ?></div>
          <div class="stat-label">Upcoming Appointments</div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-user-md"></i></div>
        <div>
          <div class="stat-number">3</div>
          <div class="stat-label">Available Doctors</div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-file-medical"></i></div>
        <div>
          <div class="stat-number">2</div>
          <div class="stat-label">Reports Ready</div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Feature Cards -->
<div class="container mt-5">
  <div class="row g-4">
    <div class="col-md-3">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-calendar-check"></i></div>
        <h5>Book Appointment</h5>
        <p class="text-muted">Schedule your appointment quickly</p>
        <a href="book-appointment.php" class="btn btn-primary mt-2">Book Now</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-user-md"></i></div>
        <h5>View Doctors</h5>
        <p class="text-muted">Browse available specialists</p>
        <a href="doctors.html" class="btn btn-primary mt-2">View</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-file-medical"></i></div>
        <h5>My Reports</h5>
        <p class="text-muted">Check your medical records</p>
        <a href="reports.html" class="btn btn-primary mt-2">Check</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-clipboard-list"></i></div>
        <h5>My Appointments</h5>
        <p class="text-muted">View your appointment history</p>
        <a href="view-appointments.php" class="btn btn-primary mt-2">View</a>
      </div>
    </div>
  </div>
</div>

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
