<?php

include "../config/db.php";

$id = $_GET['id'];

$sql = "UPDATE habitaciones SET disponibilidad = 0 WHERE id = " . $id . ";";
$result = mysqli_query($con, $sql);
if ($result) {
    echo "<script>
        alert('Reserva realizada con éxito');
        window.location.href = '../pages/booking.php';
    </script>";
    exit();
} else {
    echo "<script>
        alert('Error al realizar la reserva');
        window.location.href = '../index.php?msg=Error al realizar la reserva';
    </script>";
    exit();
}

?>