<?php
    include("../config/db.php");

    $check = FALSE;
    $Reg_Nombre = (string) $_POST['r_name'];
    $Reg_Usuario = (string) $_POST['r_usu'];
    $Reg_Email = (string) $_POST['r_email'];
    $Reg_Password = (string) $_POST['r_pass'];

    $sql = 'SELECT n_usuario FROM usuarios;';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($fila = $result->fetch_assoc()){
            $nombreDelUsuario = $fila['n_usuario'];
            if($Reg_Usuario == $nombreDelUsuario){
                $check = TRUE;
            }
        }

        if (!$check) {
            $sql = "INSERT INTO usuarios(n_usuario, n_completo, email, contrasena)
            VALUES('$Reg_Usuario', '$Reg_Nombre', '$Reg_Email', '$Reg_Password');";
            $result = mysqli_query($con, $sql);
            if($result){
                header("Location: ../index.html?register=1");
                exit;
            } else {
                header("Location: ../pages/login.php?register=2");
                exit;
            }
        } else {
            header("Location: ../pages/login.php?error=2");
            exit;
        }
        
    }

?>