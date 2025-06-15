<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DB Creada</title>
    </head>
    <body>
        
        <a href="../admin/pages/panel.html">Volver a Inicio</a>
        <?php
            
            $host = "localhost";
            $usuario = "root";
            $pass = "";
            $con = mysqli_connect($host, $usuario, $pass);

            if($con) {

                $sql = "create database beleza;";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $sql = "use beleza;";
                    mysqli_query($con, $sql);

                    $sql = "create table usuarios(ID int not null primary key auto_increment,
                    n_usuario varchar(30),
                    n_completo varchar(60),
                    email varchar(90),
                    contrasena varchar(75));";
                    
                    $result = mysqli_query($con, $sql);
                    if ($result) {

                        $sql = "create table habitaciones(ID int not null primary key auto_increment,
                        tipo ENUM('standard', 'deluxe', 'suite'),
                        capacidad ENUM('individual', 'doble', 'quad'),
                        n_habitacion int(3),
                        disponibilidad int(1),
                        precio decimal(8,2));";

                        $result = mysqli_query($con, $sql);
                        if ($result) {

                            $sql = "create table p_comida(ID int not null primary key auto_increment,
                            n_pedido int(4),
                            n_habitacion int(3),
                            producto varchar(50),
                            cantidad int(2),
                            costo decimal(7,2));";

                            $result = mysqli_query($con, $sql);
                            if($result) {

                                echo "<br><h3>Base de Datos y Tablas creadas correctamente</h3>";

                            } else {
                                echo "Error al crear la tabla P_Comida: " . mysqli_connect_error();
                            }

                        } else {
                            echo "Error al crear la tabla Habitaciones: " . mysqli_connect_error();
                        }

                    } else {
                        echo "Error al crear la tabla Usuarios: " . mysqli_connect_error();
                    }
            
                } else {
                    echo "Error al crear la base de datos: " . mysqli_connect_error();
                } 

            } else {
                echo "Error al entrar al host local: " . mysqli_connect_error();
            }

        ?>
        
    </body>
</html>
