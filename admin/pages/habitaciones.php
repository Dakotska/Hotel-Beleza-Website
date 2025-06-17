<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../assets/images/Logo_Beleza.png">
    <title>Habitaciones</title>
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

        .tipo {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .tipo img {
            width: 60px;
            height: 60px;
        }

        .capacidad {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            width: 100%;
            height: 100%;
        }

        .capacidad img {
            height: 60px;
            filter: invert(100%);
        }

        .disponibilidad {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .disponibilidad img {
            width: 60px;
            height: 60px;
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

        #sortForm {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        #sortForm label {
            color: #C5C6C7;
        }

        #sortForm select {
            padding: 5px;
            border-radius: 5px;
            border: none;
            background-color: #1F2833;
            color: #C5C6C7;
        }

        #sortForm button {
            padding: 5px 10px;
            border-radius: 10px;
            border: none;
            background-color: #45A29E;
            color: black;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        #sortForm button:hover {
            background-color: #66FCF1;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <header id="header"></header>
    <div class="title">
        <h1>Habitaciones</h1>
    </div>
    <?php
    
    include "../../config/db.php";
    
    ?>
    
    <div class="track">
        <div class="container">
            <form id="sortForm">
                <label for="sort_by">Ordenar por:</label>
                <select name="sort_by" id="sort_by">
                    <option value="">-- Selecciona --</option>
                    <option value="id">ID</option>
                    <option value="tipo">Tipo</option>
                    <option value="capacidad">Capacidad</option>
                    <option value="disponibilidad">Disponibilidad</option>
                    <option value="precio">Precio</option>
                </select>
                <select name="order" id="order">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                </select>
                <button type="button" id="sortBtn">Ordenar</button>
            </form>
            <script>
                document.getElementById('sortBtn').addEventListener('click', function() {
                    sortTable();
                });

                function getCellValue(row, idx) {
                    let cell = row.children[idx];
                    if (idx === 0) {
                        return parseInt(cell.textContent.trim()) || 0;
                    }
                    if (idx === 2) {
                        return cell.querySelectorAll('img').length;
                    }
                    if (idx === 5) {
                        return parseFloat(cell.textContent.replace('$','').replace(',','.')) || 0;
                    }
                    if (idx === 1 || idx === 4) {
                        let img = cell.querySelector('img');
                        return img ? img.alt : cell.textContent.trim();
                    }
                    return cell.textContent.trim();
                }

                function sortTable() {
                    const sortBy = document.getElementById('sort_by').value;
                    const order = document.getElementById('order').value;
                    if (!sortBy) return;

                    const colMap = {
                        'id': 0,
                        'tipo': 1,
                        'capacidad': 2,
                        'disponibilidad': 4,
                        'precio': 5
                    };
                    const idx = colMap[sortBy];

                    const tbody = document.querySelector('table tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.querySelector('td'));

                    rows.sort((a, b) => {
                        let vA = getCellValue(a, idx);
                        let vB = getCellValue(b, idx);

                        if (sortBy === 'id' || sortBy === 'capacidad' || sortBy === 'precio') {
                            vA = Number(vA);
                            vB = Number(vB);
                        }

                        if (vA < vB) return order === 'asc' ? -1 : 1;
                        if (vA > vB) return order === 'asc' ? 1 : -1;
                        return 0;
                    });

                    rows.forEach(row => tbody.appendChild(row));
                }
            </script>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Capacidad</th>
                        <th>Número de habitación</th>
                        <th>Disponibilidad</th>
                        <th>Precio / Noche</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = "SELECT * FROM habitaciones;";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td><h3>{$row['ID']}</h3></td>
                                    <td><div class='tipo'><img src='../../assets/images/hab-{$row['tipo']}.png' alt='{$row['tipo']}'></div></td>
                                    <td><div class='capacidad'>";
                            if ($row['capacidad'] == "individual") {
                                $row['capacidad'] = 1; 
                            } else if ($row['capacidad'] == "doble") {
                                $row['capacidad'] = 2; 
                            } else if ($row['capacidad'] == "quad") {
                                $row['capacidad'] = 4; 
                            }
                            for ($i = 0; $i < $row['capacidad']; $i++) {
                                echo "<img src='../../assets/images/img-capacidad.png' alt='|'>";
                            }
                            echo "</div></td>
                                    <td><h3>{$row['n_habitacion']}</h3></td>
                                    <td><div class='disponibilidad'><img src='../../assets/images/img-disp-{$row['disponibilidad']}.png' alt='{$row['disponibilidad']}'></div></td>
                                    <td><h3>\${$row['precio']}</h3></td>
                                    <td><div class='editar'><a href='../../config/a-ed-el-habitaciones.php?id={$row['ID']}&type=ed'><img src='../../assets/images/img-edit.png' alt='Editar'></a></div></td>
                                    <td><div class='eliminar'><a href='../../config/a-ed-el-habitaciones.php?id={$row['ID']}&type=el' onclick=\"return confirm('¿Estás seguro de que deseas eliminar esta habitación?');\"><img src='../../assets/images/img-delete.png' alt='Eliminar'></a></div></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay habitaciones registradas.</td></tr>";
                    }
                    
                    ?>
                </tbody>
            </table>
            <div class="añadir">
                <a class="btn-a" href="../../config/a-ed-el-habitaciones.php?type=a"><span>+</span> Añadir Nueva Habitación</a>
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