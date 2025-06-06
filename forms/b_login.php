<?php
    include("../config/db.php");

    $Log_usuario = $_POST['l_usu'];
    $Log_Password = $_POST['l_pass'];

    $sql = 'SELECT * FROM usuarios;'
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        
    }
?>