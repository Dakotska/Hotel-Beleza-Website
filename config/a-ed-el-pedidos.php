<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0B0C10;
        }
    </style>
    <?php
    include "db.php";

    if (isset($_GET["action"])) {
            echo "<a href='../admin/pages/pedidos.php'>Volver</a>";
            $id = $_POST["id"];
            $n_pedido = $_POST["n_pedido"];
            $n_habitacion = $_POST["n_habitacion"];
            $producto = $_POST["producto"];
            $cantidad = $_POST["cantidad"];
            $costo = $_POST["costo"];
        if ($_GET["action"] == "edit") {
            $sql = "UPDATE p_comida SET n_pedido=$n_pedido, n_habitacion=$n_habitacion, producto='$producto', cantidad=$cantidad, costo=$costo WHERE ID=$id;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Pedido actualizado correctamente');</script>";
                header ("Location: ../admin/pages/pedidos.php");
                exit();
            } else {
                echo "<script>alert('Error al actualizar el pedido de ID: $id \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/pedidos.php");
                exit();
            }
        } else if ($_GET["action"] == "add") {
            $sql = "INSERT INTO pedidos (n_pedido, n_habitacion, producto, cantidad, costo) VALUES ($n_pedido, $n_habitacion, '$producto', $cantidad, $precio);";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Pedido añadido correctamente');</script>";
                header ("Location: ../admin/pages/pedidos.php");
                exit();
            } else {
                echo "<script>alert('Error al añadir el pedido \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/pedidos.php");
                exit();
            }
        }
    }

    $id = 0;
    if ($_GET["type"] == "ed" || $_GET["type"] == "el") {
        $id = $_GET["id"];
    }
    if ($_GET["type"] == "ed") {
        $type = "Editar";
    } else if ($_GET["type"] == "el") {
        $type = "Eliminar";
    } else if ($_GET["type"] == "a") {
        $type = "Añadir";
    }

    if ($type == "Editar") {
        echo "<title>Editar Pedido</title>";

    ?>

    <style>

        body {
            background-color: #0B0C10;
            color: white;
            font-family: 'Montserrat';
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1F2833;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form input, .form select {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }
        .form button {
            padding: 10px;
            background-color: #66FCF1;
            color: #0B0C10;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form button:hover {
            background-color: #45A29E;
        }

        .title {
            display: flex;
            align-self: center;
            justify-self: center;
            justify-content: center;
            align-items: center;
            width: fit-content;
            height: fit-content;
            margin: 30px 0;
            padding: 0 20px;
            border-radius: 20px;
            background-color: #1F2833;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .btns {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .btns button {
            width: 100%;
            padding: 10px;
            background-color: #66FCF1;
            color: #0B0C10;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btns button:hover {
            background-color: #45A29E;
        }

    </style>

    <?php
    } else if ($type == "Eliminar") {
        echo "<title>Eliminar Pedido</title>";
    } else if ($type == "Añadir") {
        echo "<title>Añadir Pedido</title>";
    ?>
    <style>

        body {
            background-color: #0B0C10;
            color: white;
            font-family: 'Montserrat';
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1F2833;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form input, .form select {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }
        .form button {
            padding: 10px;
            background-color: #66FCF1;
            color: #0B0C10;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form button:hover {
            background-color: #45A29E;
        }

        .title {
            display: flex;
            align-self: center;
            justify-self: center;
            justify-content: center;
            align-items: center;
            width: fit-content;
            height: fit-content;
            margin: 30px 0;
            padding: 0 20px;
            border-radius: 20px;
            background-color: #1F2833;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .btns {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .btns button {
            width: 100%;
            padding: 10px;
            background-color: #66FCF1;
            color: #0B0C10;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btns button:hover {
            background-color: #45A29E;
        }

    </style>
    <?php
    }
    ?>
</head>
<body>
    <?php

    if ($type == "Eliminar") {
        $sql = "DELETE FROM p_comida WHERE ID=$id;";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Pedido eliminado correctamente');</script>";
            header ("Location: ../admin/pages/pedidos.php");
            exit();
        } else {
            echo "<script>alert('Error al eliminar el pedido de ID: $id \n" . mysqli_error($con) . "');</script>";
            header ("Location: ../admin/pages/pedidos.php");
            exit();
        }
    }

    if ($type == "Editar" || $type == "Añadir") {
        if ($id == 0) {
            $sql = "SELECT * FROM p_comida ORDER BY ID DESC LIMIT 1;";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["ID"] + 1;
            } else {
                $id = 1;
            }
        } else {
            $sql = "SELECT * FROM p_comida WHERE ID = $id;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["ID"];
                $n_pedido = $row["n_pedido"];
                $n_habitacion = $row["n_habitacion"];
                $producto = $row["producto"];
                $cantidad = $row["cantidad"];
                $costo = $row["costo"];
            } else {
                echo "<script>alert('Error al obtener los datos de el pedido de ID: $id \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/pedidos.php");
                exit();
            }
        }

        if ($type == "Editar") {
            echo "<div class='title'><h1>Editar Pedido</h1></div>";
        } else if ($type == "Añadir") {
            echo "<div class='title'><h1>Añadir Pedido</h1></div>";
        }
    ?>
    
    <div class="form-container">
        <form class="form" action="a-ed-el-pedidos.php?action=<?php if ($type == "Editar") { echo "edit"; } else { echo "add"; } ?>" method="POST">
            <label for="id">ID del Pedido:</label>
            <input type="text" readonly name="id" value="<?php echo $id; ?>">

            <label for="n_pedido">Número de Pedido:</label>
            <input type="number" name="n_pedido" id="n_pedido" value="<?php echo isset($n_pedido) ? $n_pedido : ''; ?>" required>
            
            <label for="n_habitacion">Número de Habitación:</label>
            <input type="number" name="n_habitacion" id="n_habitacion" maxlength="3" value="<?php echo isset($n_habitacion) ? $n_habitacion : ''; ?>" required>

            <label for="producto">Producto:</label>
            <input type="text" name="producto" id="producto" value="<?php echo isset($producto) ? $producto : ''; ?>" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="<?php echo isset($cantidad) ? $cantidad : ''; ?>" required>

            <label for="costo">Costo:</label>
            <input type="text" name="costo" id="costo" value="<?php echo isset($costo) ? $costo : ''; ?>" required>
            
            <div class="btns">
            <button type="submit"><?php echo $type; ?> Pedido</button>
            <button type="reset">Revertir</button>
            <button type="button" onclick="window.location.href='../admin/pages/pedidos.php'">Cancelar</button>
            </div>
        </form>

    <?php
    }
    ?>
</body>
</html>