<?php
include "config.php";

$id = $_GET['sno']; // keep using sno
$query = "DELETE FROM appoints WHERE sno = $id";

$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>window.location.href='view-appointments.php'</script>";
}
?>
