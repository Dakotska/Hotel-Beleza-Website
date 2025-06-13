<?php
    include("../config/db.php");

    $Log_usuario = (string) $_POST['l_usu'];
    $Log_Password = (string) $_POST['l_pass'];
    $adminLoginState = false;
    $loginState = false;
    
    $sql = 'SELECT n_usuario, contrasena FROM usuarios;';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($fila = $result->fetch_assoc()){
            $nombreDelUsuario = $fila['n_usuario'];
            $contraseñaDelUsuario = $fila['contrasena'];
            if($Log_usuario == $nombreDelUsuario && $Log_Password == $contraseñaDelUsuario) {
                if ($Log_usuario == "admin") {
                    $adminLoginState = true;
                } else {
                    $loginState = true;
                }
            }
        }
    }
    if ($adminLoginState) {
            header("Location: ../admin/pages/panel.html");
            exit;
        } else if ($loginState) {
            header("Location: ../index.html");
            exit;
        } else {
            header("Location: ../pages/login.php?error=1");
            exit;
        }
?>