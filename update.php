<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Gradient Navbar */
        body {
      background: linear-gradient(120deg, #f0f4ff, #e8f0ff);
      font-family: 'Segoe UI', sans-serif;
    }
  
        .navbar {
            background: linear-gradient(90deg, #4e73df, #6f42c1);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
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


        /* Card Styling */
        .form-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.1);
            margin-top: 30px;
        }

        /* Button Styling */
        .btn-theme {
            background: linear-gradient(90deg, #4e73df, #6f42c1);
            border: none;
            color: white;
            transition: 0.3s;
        }
        .btn-theme:hover {
            background: linear-gradient(90deg, #3b5bdb, #5a32a3);
        }

        .gradient-text {
    background: linear-gradient(90deg, #4e73df, #6f42c1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: bold;
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
          <li class="nav-item"><a class="nav-link " href="reports.html"><i class="fas fa-file-medical"></i> Reports</a></li>
          <li class="nav-item"><a class="nav-link active" href="view-appointments.php"><i class="fas fa-calendar-check"></i> My Appointments</a></li>
         
        
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
<div class="container">
    <div class="form-card">
        
        <h2 class="gradient-text">
      <i class="fas fa-file-medical me-2"></i>Update Appointment Time
    </h2>
    

<?php
// Connect to DB
$conn = mysqli_connect('localhost', 'root', '', 'h_m_s');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get appointment details
if (isset($_GET['sno'])) {
    $id = intval($_GET['sno']);
    $q = mysqli_query($conn, "SELECT * FROM appoints WHERE sno='$id'");
    $data = mysqli_fetch_assoc($q);
}
?>

<!-- Update Form -->
<form method="post">
    <div class="mb-3">
        <label class="form-label">Doctor</label>
        <input type="text" class="form-control" value="<?php echo $data['doctor']; ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" class="form-control" value="<?php echo $data['date']; ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Select New Time</label>
        <input type="time" class="form-control" name="time" value="<?php echo $data['time']; ?>" required>
    </div>

    <button type="submit" name="btnupdate" class="btn btn-theme"><i class="fas fa-save me-2"></i>Update Time</button>
</form>

<?php
// Update query when submitted
if (isset($_POST['btnupdate'])) {
    $new_time = $_POST['time'];

    $query = mysqli_query($conn, "UPDATE appoints SET time='$new_time' WHERE sno='$id'");

    if ($query) {
        echo "<script>window.location.href='view-appointments.php'</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error updating record: " . mysqli_error($conn) . "</div>";
    }
}
?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
