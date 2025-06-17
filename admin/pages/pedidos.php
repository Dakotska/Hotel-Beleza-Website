<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../assets/images/Logo_Beleza.png">
    <title>Beleza Admin | Pedidos de Comida</title>
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

        #search_input {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #C5C6C7;
            background-color: #1F2833;
            color: #C5C6C7;
            width: 200px;
        }
    </style>
</head>
<body>
    <header id="header"></header>
    <div class="title">
        <h1>Pedidos</h1>
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
                    <option value="cantidad">Cantidad</option>
                    <option value="costo">Costo</option>
                </select>
                <select name="order" id="order">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                </select>
                <button type="button" id="sortBtn">Ordenar</button>
                <label for="search_field" style="margin-left:20px;">Buscar en:</label>
                <select id="search_field" style="margin-right:5px;">
                    <option value="n_pedido">Pedido</option>
                    <option value="n_habitacion">Habitación</option>
                    <option value="producto">Producto</option>
                </select>
                <input type="text" id="search_input" placeholder="Buscar...">
            </form>
            <div id="no-results-message" style="display:none; color:#FF5555; text-align:center; margin:10px 0; font-weight:bold;"></div>
            <script>
                document.getElementById('sortBtn').addEventListener('click', function() {
                    sortTable();
                });

                document.getElementById('search_input').addEventListener('input', function() {
                    filterTable();
                });
                document.getElementById('search_field').addEventListener('change', function() {
                    filterTable();
                });

                function getCellValue(row, idx) {
                    let cell = row.children[idx];
                    if (idx === 0 || idx === 4 || idx === 5) {
                        // ID, Cantidad, Costo
                        let val = cell.textContent.replace('$','').replace(',','.').trim();
                        return parseFloat(val) || 0;
                    }
                    return cell.textContent.trim().toLowerCase();
                }

                function sortTable() {
                    const sortBy = document.getElementById('sort_by').value;
                    const order = document.getElementById('order').value;
                    if (!sortBy) return;

                    // Map: id=0, cantidad=4, costo=5
                    const colMap = {
                        'id': 0,
                        'cantidad': 4,
                        'costo': 5
                    };
                    const idx = colMap[sortBy];

                    const tbody = document.querySelector('table tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.querySelector('td'));

                    rows.sort((a, b) => {
                        let vA = getCellValue(a, idx);
                        let vB = getCellValue(b, idx);

                        if (typeof vA === "number" && typeof vB === "number") {
                            if (vA < vB) return order === 'asc' ? -1 : 1;
                            if (vA > vB) return order === 'asc' ? 1 : -1;
                            return 0;
                        } else {
                            return order === 'asc'
                                ? String(vA).localeCompare(String(vB))
                                : String(vB).localeCompare(String(vA));
                        }
                    });

                    rows.forEach(row => tbody.appendChild(row));
                }

                function filterTable() {
                    const input = document.getElementById('search_input').value.trim().toLowerCase();
                    const field = document.getElementById('search_field').value;
                    const tbody = document.querySelector('table tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.querySelector('td'));

                    // Map: n_pedido=1, n_habitacion=2, producto=3
                    const fieldMap = {
                        'n_pedido': 1,
                        'n_habitacion': 2,
                        'producto': 3
                    };
                    const fieldNames = {
                        'n_pedido': 'pedido',
                        'n_habitacion': 'habitación',
                        'producto': 'producto'
                    };
                    const idx = fieldMap[field];

                    let anyVisible = false;
                    rows.forEach(row => {
                        const cellValue = row.children[idx].textContent.toLowerCase();
                        if (cellValue.includes(input)) {
                            row.style.display = '';
                            anyVisible = true;
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    const msgDiv = document.getElementById('no-results-message');
                    if (!anyVisible && input.length > 0 && (field == 'n_pedido' || field == 'producto')) {
                        msgDiv.style.display = 'block';
                        msgDiv.textContent = `No existe el ${fieldNames[field]} "${input}"`;
                    } else if (!anyVisible && input.length > 0 && field == 'n_habitacion') {
                        msgDiv.style.display = 'block';
                        msgDiv.textContent = `No existe la ${fieldNames[field]} "${input}"`;
                    } else{
                        msgDiv.style.display = 'none';
                        msgDiv.textContent = '';
                    }
                }
            </script>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Pedido</th>
                        <th>Número de Habitación</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = "SELECT * FROM p_comida;";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td><h3>{$row['ID']}</h3></td>
                                    <td><h3>{$row['n_pedido']}</h3></td>
                                    <td><h3>{$row['n_habitacion']}</h3></div></td>
                                    <td><h3>{$row['producto']}</h3></td>
                                    <td><h3>{$row['cantidad']}</h3></td>
                                    <td><h3>\${$row['costo']}</h3></td>
                                    <td><div class='editar'><a href='../../config/a-ed-el-pedidos.php?id={$row['ID']}&type=ed'><img src='../../assets/images/img-edit.png' alt='Editar'></a></div></td>
                                    <td><div class='eliminar'><a href='../../config/a-ed-el-pedidos.php?id={$row['ID']}&type=el' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este pedido?');\"><img src='../../assets/images/img-delete.png' alt='Eliminar'></a></div></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay pedidos de comida registrados.</td></tr>";
                    }
                    
                    ?>
                </tbody>
            </table>
            <div class="añadir">
                <a class="btn-a" href="../../config/a-ed-el-pedidos.php?type=a"><span>+</span> Añadir Nuevo Pedido</a>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const pedidoCells = document.querySelectorAll('tbody tr td:nth-child(2) h3');
        const rows = Array.from(document.querySelectorAll('tbody tr'));
        const pedidoCostos = {};
        rows.forEach(row => {
            const nPedido = row.children[1]?.textContent.trim();
            const costoStr = row.children[5]?.textContent.replace('$','').replace(',','.').trim();
            const costo = parseFloat(costoStr) || 0;
            if (nPedido) {
                if (!pedidoCostos[nPedido]) pedidoCostos[nPedido] = 0;
                pedidoCostos[nPedido] += costo;
            }
        });
        pedidoCells.forEach(cell => {
            const nPedido = cell.textContent.trim();
            const total = pedidoCostos[nPedido] ?? 0;
            cell.style.cursor = 'pointer';
            cell.setAttribute('title', `Precio total del pedido: $${total.toFixed(2)}`);
        });
    });
    </script>
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