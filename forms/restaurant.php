<?php
include "../config/db.php";
$n_pedido = 1;
$handle_result = 0;

$sql = "SELECT * FROM p_comida ORDER BY n_pedido DESC LIMIT 1;";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $n_pedido = $row["n_pedido"] + 1;
}

$n_habitacion = $_POST["numeroHab"];
$sql = "SELECT * FROM habitaciones WHERE n_habitacion=$n_habitacion;";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $productos_validos = 0;

    for ($i = 1; $i <= 12; $i++) {
        if (isset($_POST["ipoc$i"]) && isset($_POST["nombre-id$i"]) && isset($_POST["icoc$i"])) {
            $producto = $_POST["nombre-id$i"];
            $cantidad = intval($_POST["icoc$i"]);
            $costo = floatval($_POST["ipoc$i"]);

            // Validar si los datos tienen sentido (no vacíos o cero)
            if ($producto !== "" && $cantidad > 0 && $costo > 0) {
                $productos_validos++;

                $producto = mysqli_real_escape_string($con, $producto);
                $sql = "INSERT INTO p_comida(n_pedido, n_habitacion, producto, cantidad, costo)
                        VALUES($n_pedido, $n_habitacion, '$producto', $cantidad, $costo);";
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    $handle_result = 1;
                }
            }
        }
    }

    if ($productos_validos === 0) {
        echo "<script>alert('No se ingresaron productos válidos.'); window.location.href='../pages/restaurant.php';</script>";
        exit();
    }

} else {
    $handle_result = 2;
}

if ($handle_result == 1) {
    echo "<script>alert('Error al realizar el pedido'); window.location.href='../pages/restaurant.php';</script>";
} else if ($handle_result == 2) {
    echo "<script>alert('El número de habitación no existe.\\nPor favor, ingrese una habitación existente'); window.location.href='../pages/restaurant.php';</script>";
} else {
    echo "<script>alert('Pedido realizado con éxito'); window.location.href='../pages/restaurant.php';</script>";
}
exit();

?>