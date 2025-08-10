<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'h_m_s');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$success = false;
$error = "";

// Handle form submission
if (isset($_POST['book_btn'])) {
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = "INSERT INTO appoints (doctor, date, time)
              VALUES ('$doctor', '$date', '$time')";

    if (mysqli_query($conn, $query)) {
        $success = true;
    } else {
        $error = mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      background: linear-gradient(120deg, #f0f4ff, #e8f0ff);
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background: linear-gradient(90deg, #4e73df, #6f42c1);
      box-shadow: 0px 4px 12px rgba(0,0,0,0.05);
    }
    .form-card {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 8px 25px rgba(0,0,0,0.05);
      max-width: 500px;
      margin: auto;
    }
    h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }
    .form-label {
      font-weight: 500;
      color: #444;
    }
    .form-select, .form-control {
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    .btn-primary {
      background: linear-gradient(135deg, #4e73df, #6f42c1);
      border: none;
      border-radius: 50px;
      padding: 10px;
      font-size: 1rem;
      font-weight: 500;
    }
    .btn-primary:hover {
      opacity: 0.9;
    }
    .alert {
      border-radius: 10px;
    }
    .gradient-text {
    background: linear-gradient(90deg, #4e73df, #6f42c1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: bold;
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
          <li class="nav-item"><a class="nav-link active" href="book-appointment.php"><i class="fas fa-calendar-plus"></i> Book Appointment</a></li>
          <li class="nav-item"><a class="nav-link" href="doctors.html"><i class="fas fa-user-md"></i> Doctors</a></li>
          <li class="nav-item"><a class="nav-link" href="reports.html"><i class="fas fa-file-medical"></i> Reports</a></li>
          <li class="nav-item"><a class="nav-link " href="view-appointments.php"><i class="fas fa-calendar-check"></i> My Appointments</a></li>
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

  <!-- Booking Form -->
  <div class="container mt-5">
    <div class="form-card">
    <h2 class="gradient-text">
    <i class="fas fa-calendar-plus me-2"></i>Book an Appointment
</h2>


      <?php if ($success): ?>
        <div class="alert alert-success text-center mt-3">
          <i class="fas fa-check-circle me-2"></i>Appointment booked successfully!
        </div>
      <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger text-center mt-3">
          <i class="fas fa-exclamation-circle me-2"></i>Error: <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="">
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user-md me-2"></i>Select Doctor</label>
          <select class="form-select" name="doctor" required>
            <option value="">Choose a doctor</option>
            <option value="Dr. Ali - Cardiologist">Dr. Ali - Cardiologist</option>
            <option value="Dr. Sara - Dentist">Dr. Sara - Dentist</option>
            <option value="Dr. Khan - Neurologist">Dr. Khan - Neurologist</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="fas fa-calendar-alt me-2"></i>Select Date</label>
          <input type="date" class="form-control" name="date" required>
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="fas fa-clock me-2"></i>Select Time</label>
          <input type="time" class="form-control" name="time" required>
        </div>

        <button type="submit" class="btn btn-primary w-100" name="book_btn">
          <i class="fas fa-paper-plane me-2"></i>Book Now
        </button>
      </form>
    </div>
  </div>

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
