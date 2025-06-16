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
            echo "<a href='../admin/pages/usuarios.php'>Volver</a>";
            $id = $_POST["id"];
            $n_usuario = $_POST["n_usuario"];
            $n_completo = $_POST["n_completo"];
            $email = $_POST["email"];
            $contrasena = $_POST["contrasena"];
            $sql = "SELECT * FROM usuarios WHERE n_usuario='$n_usuario';";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                    $idtable = mysqli_fetch_assoc($result)["ID"];
                    if ($idtable != $id) {
                        echo "<script>alert('Ya existe un usuario con el nombre de usuario: $n_habitacion'); window.location.href='../admin/pages/usuarios.php';</script>";
                    exit();
                    }
            }
        if ($_GET["action"] == "edit") {
            $sql = "UPDATE usuarios SET n_usuario='$n_usuario', n_completo='$n_completo', email='$email', contrasena='$contrasena' WHERE ID=$id;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Usuario actualizado correctamente');</script>";
                header ("Location: ../admin/pages/usuarios.php");
                exit();
            } else {
                echo "<script>alert('Error al actualizar el usuario de ID: $id \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/usuario.php");
                exit();
            }
        } else if ($_GET["action"] == "add") {
            $sql = "INSERT INTO usuarios (n_usuario, n_completo, email, contrasena) VALUES ('$n_usuario', '$n_completo', '$email', '$contrasena');";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Usuario añadido correctamente');</script>";
                header ("Location: ../admin/pages/usuarios.php");
                exit();
            } else {
                echo "<script>alert('Error al añadir el usuario \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/usuario.php");
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
        echo "<title>Editar Usuario</title>";

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
        echo "<title>Eliminar Usuario</title>";
    } else if ($type == "Añadir") {
        echo "<title>Añadir Usuario</title>";
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
        $sql = "DELETE FROM usuarios WHERE ID=$id;";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Usuario eliminado correctamente');</script>";
            header ("Location: ../admin/pages/usuarios.php");
            exit();
        } else {
            echo "<script>alert('Error al eliminar el usuario de ID: $id \n" . mysqli_error($con) . "');</script>";
            header ("Location: ../admin/pages/usuarios.php");
            exit();
        }
    }

    if ($type == "Editar" || $type == "Añadir") {
        if ($id == 0) {
            $sql = "SELECT * FROM usuarios ORDER BY ID DESC LIMIT 1;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["ID"] + 1;
            } else {
                $id = 1;
            }
        } else {
            $sql = "SELECT * FROM usuarios WHERE ID = $id;";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["ID"];
                $n_usuario = $row["n_usuario"];
                $n_completo = $row["n_completo"];
                $email = $row["email"];
                $contrasena = $row["contrasena"];
            } else {
                echo "<script>alert('Error al obtener los datos de el usuario de ID: $id \n" . mysqli_error($con) . "');</script>";
                header ("Location: ../admin/pages/usuarios.php");
                exit();
            }
        }

        if ($type == "Editar") {
            echo "<div class='title'><h1>Editar Usuario</h1></div>";
        } else if ($type == "Añadir") {
            echo "<div class='title'><h1>Añadir Usuario</h1></div>";
        }
    ?>
    
    <div class="form-container">
        <form class="form" action="a-ed-el-usuarios.php?action=<?php if ($type == "Editar") { echo "edit"; } else { echo "add"; } ?>" method="POST">
            <label for="id">ID del Usuario:</label>
            <input type="text" readonly name="id" value="<?php echo $id; ?>">

            <label for="n_usuario">Nombre de Usuario:</label>
            <input type="text" name="n_usuario" id="n_usuario" value="<?php echo isset($n_usuario) ? $n_usuario : ''; ?>" required>
            
            <label for="n_completo">Nombre Completo:</label>
            <input type="text" name="n_completo" id="n_completo" value="<?php echo isset($n_completo) ? $n_completo : ''; ?>" required>

            <label for="email">Correo:</label>
            <input type="text" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" required>

            <label for="contrasena">Contraseña:</label>
            <input type="text" name="contrasena" id="contrasena" value="<?php echo isset($contrasena) ? $contrasena : ''; ?>" required>
            
            <div class="btns">
            <button type="submit"><?php echo $type; ?> Usuario</button>
            <button type="reset">Revertir</button>
            <button type="button" onclick="window.location.href='../admin/pages/usuarios.php'">Cancelar</button>
            </div>
        </form>

    <?php
    }
    ?>
</body>
</html>