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

        if (!$check){
            $sql = "INSERT INTO usuarios(n_usuario, n_completo, email, contrasena)
            VALUES('$Reg_Usuario', '$Reg_Nombre', '$Reg_Email', '$Reg_Password');";
            $result = mysqli_query($con, $sql);
            if($result){
                echo "FUNCA";
            } 
            else{
                    echo "No FUNCA";
            }
        } 
        else{
            echo "Cuenta ya creada";
        }
        
    }

?>