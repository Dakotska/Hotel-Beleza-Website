<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Usuarios</title>
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100%;
            background-color: #0B0C10;
            color: white;
            font-family: "Montserrat";
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

        .track {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: fit-content;
            margin-bottom: 20px;
        }

        .container {
            width: 90%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #C5C6C7;
        }

        th {
            background-color: #1F2833;
            color: #C5C6C7;
        }
        
        td {
            background-color: #0B0C10;
            color: #C5C6C7;
        }

        .editar {
            width: 100%;
            height: 50px;
            display: flex;
            border-radius: 50%;
            justify-content: center;
            align-items: center;
            
        }

        .editar a {
            text-decoration: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            transition: box-shadow 0.3s ease;
        }

        .editar a:hover {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        .editar a img {
            width: 50px;
            height: 50px;
            rotate: y 180deg;
            filter: invert(80%);
            border-radius: 50%;
            transition: filter 0.3s ease;
        }

        .editar a img:hover {
            filter: invert(100%);
        }

        .eliminar {
            width: 100%;
            height: 100%;
            display: flex;
            border-radius: 50%;
            justify-content: center;
            align-items: center;
        }

        .eliminar a {
            text-decoration: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            transition: box-shadow 0.3s ease;
            cursor: pointer;
        }

        .eliminar a:hover {
            box-shadow: 0 0 10px rgb(255, 0, 0);
        }

        .eliminar a img {
            width: 50px;
            height: 50px;
            filter: grayscale(100%);
            border-radius: 50%;
            transition: filter 0.3s ease;
        }

        .eliminar a img:hover {
            filter: grayscale(0%);
        }

        .añadir {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: fit-content;
            margin-bottom: 20px;
        }

        .btn-a {
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            padding: 10px 20px;
            background-color: rgb(23, 179, 36);
            text-decoration: none;
            border-radius: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-a:hover {
            background-color: rgb(0, 204, 0);
            box-shadow: 0 0 10px rgba(0, 204, 0, 0.5);
        }

        .btn-a span {
            font-size: 20px;
            margin-right: 5px;
        }

        #buscadorForm {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        #buscadorForm label {
            margin-right: 10px;
            color: #C5C6C7;
        }

        #buscadorForm select,
        #buscadorForm input {
            padding: 5px;
            border-radius: 5px;
            background-color: #1F2833;
            color: #C5C6C7;
            margin-right: 10px;
        }

        #buscadorForm input {
            width: 200px;
            border: 1px solid #C5C6C7;
        }

        #buscadorForm select {
            border: none;
            width: 150px;
            cursor: pointer;
        }

        #buscadorForm input:focus,
        #buscadorForm select:focus {
            outline: none;
            border-color: #66FCF1;
            box-shadow: 0 0 5px rgba(102, 252, 241, 0.5);
        }

        .cont {
            width: 30px;
            height: 30px;
            margin-left: 10px;
            cursor: pointer;
            filter: invert(100%);
            transition: transform 0.3s ease;
        }

        .div {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header id="header"></header>
    <div class="title">
        <h1>Usuarios</h1>
    </div>
    <?php
    
    include "../../config/db.php";
    
    ?>
    
    <div class="track">
        <div class="container">
            <form id="buscadorForm">
                <label for="campo">Buscar por:</label>
                <select name="campo" id="campo">
                    <option value="n_usuario">Nombre de Usuario</option>
                    <option value="n_completo">Nombre Completo</option>
                    <option value="email">Correo</option>
                </select>
                <input type="text" id="busqueda" placeholder="Buscar...">
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const campo = document.getElementById('campo');
                    const busqueda = document.getElementById('busqueda');
                    const tabla = document.querySelector('table tbody');

                    function filtrarTabla() {
                        const campoSeleccionado = campo.value;
                        const texto = busqueda.value.toLowerCase();

                        for (let fila of tabla.rows) {
                            let mostrar = false;
                            if (campoSeleccionado === 'n_usuario') {
                                mostrar = fila.cells[1].innerText.toLowerCase().includes(texto);
                            } else if (campoSeleccionado === 'n_completo') {
                                mostrar = fila.cells[2].innerText.toLowerCase().includes(texto);
                            } else if (campoSeleccionado === 'email') {
                                mostrar = fila.cells[3].innerText.toLowerCase().includes(texto);
                            }
                            fila.style.display = mostrar ? '' : 'none';
                        }
                    }

                    campo.addEventListener('change', filtrarTabla);
                    busqueda.addEventListener('input', filtrarTabla);
                });
            </script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mostrar/Ocultar contraseña en la tabla de usuarios
                document.querySelectorAll('tbody tr').forEach(function(fila) {
                    const span = fila.querySelector('td:nth-child(5) span.contrasena');
                    const img = fila.querySelector('td:nth-child(5) img.cont');
                    if (span && img) {
                        const original = span.textContent;
                        let visible = false;
                        // Oculta la contraseña al cargar
                        span.textContent = '•'.repeat(original.length);
                        img.style.cursor = 'pointer';
                        img.addEventListener('click', function(e) {
                            e.stopPropagation();
                            visible = !visible;
                            if (visible) {
                                span.textContent = original;
                                img.src = '../../assets/images/cont-no.png';
                            } else {
                                span.textContent = '•'.repeat(original.length);
                                img.src = '../../assets/images/cont-si.png';
                            }
                        });
                    }
                });
            });
            </script>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Usuario</th>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = "SELECT * FROM usuarios;";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td><h3>{$row['ID']}</h3></td>
                                    <td><h3>{$row['n_usuario']}</h3></td>
                                    <td><h4>{$row['n_completo']}</h4></td>
                                    <td><h4>{$row['email']}</h4></td>
                                    <td><h4 class='div'><span class='contrasena'>{$row['contrasena']}</span><img class='cont' src='../../assets/images/cont-si.png' alt='Mostrar'></h4></td>
                                    <td><div class='editar'><a href='../../config/a-ed-el-usuarios.php?id={$row['ID']}&type=ed'><img src='../../assets/images/img-edit.png' alt='Editar'></a></div></td>
                                    <td><div class='eliminar'><a href='../../config/a-ed-el-usuarios.php?id={$row['ID']}&type=el' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este usuario?');\"><img src='../../assets/images/img-delete.png' alt='Eliminar'></a></div></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay usuarios registrados.</td></tr>";
                    }
                    
                    ?>
                </tbody>
            </table>
            <div class="añadir">
                <a class="btn-a" href="../../config/a-ed-el-usuarios.php?type=a"><span>+</span> Añadir Nuevo Usuario</a>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        fetch('../templates/header.html')
        .then(res => res.text())
        .then(data => {
            document.getElementById('header').innerHTML = data; 
            
            const a1 = document.querySelector(".hdr-a1");
            const a2 = document.querySelector(".hdr-a2");
            const a3 = document.querySelector(".hdr-a3");
            const a4 = document.querySelector(".hdr-a4");
            const a5 = document.querySelector(".hdr-a5");
            const light = document.querySelector(".bg-light");
            
            a1.addEventListener("mouseenter", () => {
                light.classList.add("active1");
            });
            a1.addEventListener("mouseleave", () => {
                light.classList.remove("active1")
            });
            
            a2.addEventListener("mouseenter", () => {
                light.classList.add("active2")
            });
            a2.addEventListener("mouseleave", () => {
                light.classList.remove("active2")
            });
            
            a3.addEventListener("mouseenter", () => {
                light.classList.add("active3")
            });
            a3.addEventListener("mouseleave", () => {
                light.classList.remove("active3")
            });
            
            a4.addEventListener("mouseenter", () => {
                light.classList.add("active4")
            });
            a4.addEventListener("mouseleave", () => {
                light.classList.remove("active4")
            });
            
            a5.addEventListener("mouseenter", () => {
                light.classList.add("active5")
            });
            a5.addEventListener("mouseleave", () => {
                light.classList.remove("active5")
            });
        });
        
    </script>
</body>
</html>