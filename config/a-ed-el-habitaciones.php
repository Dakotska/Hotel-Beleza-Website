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
            echo "<a href='../admin/pages/habitaciones.php'>Volver</a>";
            $id = $_POST["id"];
            $tipo = $_POST["tipo"];
            $capacidad = $_POST["capacidad"];
            $n_habitacion = $_POST["n_habitacion"];
            $disponibilidad = $_POST["disponibilidad"];
            $precio = $_POST["precio"];
            $sql = "SELECT * FROM habitaciones WHERE n_habitacion= $n_habitacion;";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                    $idtable = mysqli_fetch_assoc($result)["ID"];
                    if ($idtable != $id) {
                        echo "<script>alert('Ya existe una habitación con el número de habitación $n_habitacion'); window.location.href='../admin/pages/habitaciones.php';</script>";
                    exit();
                    }
            }
        if ($_GET["action"] == "edit") {
            $sql = "UPDATE habitaciones SET tipo='$tipo', capacidad='$capacidad', n_habitacion=$n_habitacion, disponibilidad=$disponibilidad, precio=$precio WHERE ID=$id;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Habitación actualizada correctamente');</script>";
                header ("Location: ../admin/pages/habitaciones.php");
                exit();
            } else {
                echo "<script>alert('Error al actualizar la habitación de ID: $id \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/habitaciones.php");
                exit();
            }
        } else if ($_GET["action"] == "add") {
            $sql = "INSERT INTO habitaciones (tipo, capacidad, n_habitacion, disponibilidad, precio) VALUES ('$tipo', '$capacidad', $n_habitacion, $disponibilidad, $precio);";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Habitación añadida correctamente');</script>";
                header ("Location: ../admin/pages/habitaciones.php");
                exit();
            } else {
                echo "<script>alert('Error al añadir la habitación \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/habitaciones.php");
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
        echo "<title>Editar Habitación</title>";

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
        echo "<title>Eliminar Habitación</title>";
    } else if ($type == "Añadir") {
        echo "<title>Añadir Habitación</title>";
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
        $sql = "DELETE FROM habitaciones WHERE ID=$id;";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Habitación eliminada correctamente');</script>";
            header ("Location: ../admin/pages/habitaciones.php");
            exit();
        } else {
            echo "<script>alert('Error al eliminar la habitación de ID: $id \n" . mysqli_error($con) . "');</script>";
            header ("Location: ../admin/pages/habitaciones.php");
            exit();
        }
    }

    if ($type == "Editar" || $type == "Añadir") {
        if ($id == 0) {
            $sql = "SELECT * FROM habitaciones ORDER BY ID DESC LIMIT 1;";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["ID"] + 1;
            } else {
                $id = 1;
            }
        } else {
            $sql = "SELECT * FROM habitaciones WHERE ID = $id;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["ID"];
                $tipo = $row["tipo"];
                $capacidad = $row["capacidad"];
                $n_habitacion = $row["n_habitacion"];
                $disponibilidad = $row["disponibilidad"];
                $precio = $row["precio"];
            } else {
                echo "<script>alert('Error al obtener los datos de la habitación de ID: $id \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/habitaciones.php");
                exit();
            }
        }

        if ($type == "Editar") {
            echo "<div class='title'><h1>Editar Habitación</h1></div>";
        } else if ($type == "Añadir") {
            echo "<div class='title'><h1>Añadir Habitación</h1></div>";
        }
    ?>
    
    <div class="form-container">
        <form class="form" action="a-ed-el-habitaciones.php?action=<?php if ($type == "Editar") { echo "edit"; } else { echo "add"; } ?>" method="POST">
            <label for="id">ID de Habitación:</label>
            <input type="text" readonly name="id" value="<?php echo $id; ?>">
            <label for="tipo">Tipo de Habitación:</label>
            <select class="select-tipo" name="tipo" required>
                <option value="standard" class="tipo-standard" <?php if (isset($tipo) && $tipo == "standard") echo "selected"; ?>>Standard</option>
                <option value="deluxe" class="tipo-deluxe" <?php if (isset($tipo) && $tipo == "deluxe") echo "selected"; ?>>Deluxe</option>
                <option value="suite" class="tipo-suite" <?php if (isset($tipo) && $tipo == "suite") echo "selected"; ?>>Suite</option>
            </select>
            
            <label for="capacidad">Capacidad:</label>
            <select class="select-cap" name="capacidad" required>
                <option value="individual" class="cap-individual" <?php if (isset($capacidad) && $capacidad == "individual") echo "selected"; ?>>Individual</option>
                <option value="doble" class="cap-doble" <?php if (isset($capacidad) && $capacidad == "doble") echo "selected"; ?>>Doble</option>
                <option value="quad" class="cap-quad" <?php if (isset($capacidad) && $capacidad == "quad") echo "selected"; ?>>Quad</option>
            </select>
            
            <label for="n_habitacion">Número de Habitación:</label>
            <input type="number" name="n_habitacion" id="n_habitacion" maxlength="3" value="<?php echo isset($n_habitacion) ? $n_habitacion : ''; ?>" required>

            <label for="disponibilidad">Disponibilidad:</label>
            <select name="disponibilidad" class="select-disp" id="disponibilidad" required>
                <option value="1" <?php if (isset($disponibilidad) && $disponibilidad == 1) echo "selected"; ?>>Disponible</option>
                <option value="0" <?php if (isset($disponibilidad) && $disponibilidad == 0) echo "selected"; ?>>No Disponible</option>
            </select>
            
            <label for="precio">Precio por Noche:</label>
            <input type="text" name="precio" id="precio" value="<?php echo isset($precio) ? $precio : ''; ?>" required>
            
            <div class="btns">
            <button type="submit"><?php echo $type; ?> Habitación</button>
            <button type="reset">Revertir</button>
            <button type="button" onclick="window.location.href='../admin/pages/habitaciones.php'">Cancelar</button>
            </div>
        </form>

    <?php
    }
    ?>
</body>
</html>