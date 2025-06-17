<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/images/Logo_Beleza.png">
    <link rel="stylesheet" href="../assets/css/booking.css">
    <title>Booking</title>
</head>
<body>
    <header id="header"></header>

    <div class="section-one">
        <div class="bg-img"></div>
        <div class="one-container">
            <h1 class="title">Habitaciones</h1>
        </div>
    </div>

    <?php
    
    include "../config/db.php";

    ?>

    <main class="w-container">
        <div class="standard-section">
            <div class="section-top">
                <h2 class="section-title">Estándar</h2>
                <div class="section-btns">
                    <button class="section-btn" onclick="moveLeftT1()"><img class="btn-img" src="../assets/images/lr-arrow.png" alt="Izq"></button>
                    <button class="section-btn" onclick="moveRightT1()"><img class="btn-img" style="rotate: y 180deg;" src="../assets/images/lr-arrow.png" alt="Der"></button>
                </div>
            </div>
            <div class="track t1">
                <?php

                $sql = "SELECT * FROM habitaciones WHERE tipo = 'standard';";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['capacidad'] == 'individual') {
                            $cap = 1; 
                        } else if ($row['capacidad'] == 'doble') { 
                            $cap = 2; 
                        } else if ($row['capacidad'] == 'quad') {
                            $cap = 4; 
                        }
                        echo '<div class="card" data-tipo="estándar">';
                        echo '<img class="card-img" src="../assets/images/imgs-hab/';
                        if ($row["capacidad"] == "individual") {
                            echo 'standard-cap1.png';
                        } else if ($row["capacidad"] == "doble") {
                            echo 'standard-cap2.png';
                        } else if ($row["capacidad"] == "quad") {
                            echo 'standard-cap4.png';
                        }
                        echo '" alt="Habitación Estándar">';
                        echo '<div class="card-down">';
                        echo '<h1>Capacidad: <span class="cap-imgs">';
                        for ($i=0; $i < $cap; $i++) {
                            echo '<img class="img-cap" src="../assets/images/img-capacidad.png" alt=" | ">'; 
                        }
                        echo '</span></h1>';
                        echo '<h1># de Habitación: <span class="text">' . $row['n_habitacion'] . '</span></h1>';
                        echo '<h1>Precio / Noche: <span class="text">$' . $row['precio'] . '</span></h1>';
                        echo '<h1>Disponible: <img class="img-disp" src="../assets/images/img-disp-' . ($row['disponibilidad'] ? '1' : '0') . '.png" alt="' . ($row['disponibilidad'] ? 'Si' : 'No') . '"></h1>';
                        echo '<div ';
                        if (!$row['disponibilidad']) {
                            echo 'style="filter: grayscale(100%)" ';
                        }
                        echo ' class="div-res id' . $row['ID'] . '"><a class="btn-reservar" ';
                        if (!$row['disponibilidad']) {
                            echo 'style="pointer-events: none; color: gray;" ';
                        } else {
                            echo 'href="../forms/reserva.php?id=' . $row['ID'] . '"';
                        }
                        echo '>Reservar</a></div>';
                        echo '<button class="btn-v id' . $row['ID'] . '"><img class="toggle-reserva closed" src="../assets/images/lr-arrow.png" alt=""></button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p style=''>No hay habitaciones estándar disponibles.</p>";
                }
                
                ?>

            </div>
        </div>
        <div class="deluxe-section">
            <div class="section-top">
                <h2 class="section-title">Deluxe</h2>
                <div class="section-btns">
                    <button class="section-btn" onclick="moveLeftT2()"><img class="btn-img" src="../assets/images/lr-arrow.png" alt="Izq"></button>
                    <button class="section-btn" onclick="moveRightT2()"><img class="btn-img" style="rotate: y 180deg;" src="../assets/images/lr-arrow.png" alt="Der"></button>
                </div>
            </div>
            <div class="track t2">

                <?php

                $sql = "SELECT * FROM habitaciones WHERE tipo = 'deluxe';";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['capacidad'] == 'individual') {
                            $cap = 1; 
                        } else if ($row['capacidad'] == 'doble') { 
                            $cap = 2; 
                        } else if ($row['capacidad'] == 'quad') {
                            $cap = 4; 
                        }
                        echo '<div class="card" data-tipo="deluxe">';
                        echo '<img class="card-img" src="../assets/images/imgs-hab/';
                        if ($row["capacidad"] == "individual") {
                            echo 'deluxe-cap1.png';
                        } else if ($row["capacidad"] == "doble") {
                            echo 'deluxe-cap2.png';
                        } else if ($row["capacidad"] == "quad") {
                            echo 'deluxe-cap4.png';
                        }
                        echo '" alt="Habitación Deluxe">';
                        echo '<div class="card-down">';
                        echo '<h1>Capacidad: <span class="cap-imgs">';
                        for ($i=0; $i < $cap; $i++) {
                            echo '<img class="img-cap" src="../assets/images/img-capacidad.png" alt=" | ">'; 
                        }
                        echo '</span></h1>';
                        echo '<h1># de Habitación: <span class="text">' . $row['n_habitacion'] . '</span></h1>';
                        echo '<h1>Precio / Noche: <span class="text">$' . $row['precio'] . '</span></h1>';
                        echo '<h1>Disponible: <img class="img-disp" src="../assets/images/img-disp-' . ($row['disponibilidad'] ? '1' : '0') . '.png' . '" alt="' . ($row['disponibilidad'] ? 'Si' : 'No') . '"></h1>';
                        echo '<div ';
                        if (!$row['disponibilidad']) {
                            echo 'style="filter: grayscale(100%)" ';
                        }
                        echo ' class="div-res id' . $row['ID'] . '"><a class="btn-reservar" ';
                        if (!$row['disponibilidad']) {
                            echo 'style="pointer-events: none; color: gray;" ';
                        } else {
                            echo 'href="../forms/reserva.php?id=' . $row['ID'] . '"';
                        }
                        echo '>Reservar</a></div>';
                        echo '<button class="btn-v id' . $row['ID'] . '"><img class="toggle-reserva closed" src="../assets/images/lr-arrow.png" alt=""></button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p style=''>No hay habitaciones deluxe disponibles.</p>";
                }

                ?>

            </div>
        </div>
        <div class="suite-section">
            <div class="section-top">
                <h2 class="section-title">Suite</h2>
                <div class="section-btns">
                    <button class="section-btn" onclick="moveLeftT3()"><img class="btn-img" src="../assets/images/lr-arrow.png" alt="Izq"></button>
                    <button class="section-btn" onclick="moveRightT3()"><img class="btn-img" style="rotate: y 180deg;" src="../assets/images/lr-arrow.png" alt="Der"></button>
                </div>
            </div>
            <div class="track t3">
                <?php
                $sql = "SELECT * FROM habitaciones WHERE tipo = 'suite';";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['capacidad'] == 'individual') {
                            $cap = 1; 
                        } else if ($row['capacidad'] == 'doble') { 
                            $cap = 2; 
                        } else if ($row['capacidad'] == 'quad') {
                            $cap = 4; 
                        }
                        echo '<div class="card" data-tipo="suite">';
                        echo '<img class="card-img" src="../assets/images/imgs-hab/';
                        if ($row["capacidad"] == "individual") {
                            echo 'suite-cap1.png';
                        } else if ($row["capacidad"] == "doble") {
                            echo 'suite-cap2.png';
                        } else if ($row["capacidad"] == "quad") {
                            echo 'suite-cap4.png';
                        }
                        echo '" alt="Habitación Suite">';
                        echo '<div class="card-down">';
                        echo '<h1>Capacidad: <span class="cap-imgs">';
                        for ($i=0; $i < $cap; $i++) {
                            echo '<img class="img-cap" src="../assets/images/img-capacidad.png" alt=" | ">'; 
                        }
                        echo '</span></h1>';
                        echo '<h1># de Habitación: <span class="text">' . $row['n_habitacion'] . '</span></h1>';
                        echo '<h1>Precio / Noche: <span class="text">$' . $row['precio'] . '</span></h1>';
                        echo '<h1>Disponible: <img class="img-disp" src="../assets/images/img-disp-' . ($row['disponibilidad'] ? '1' : '0') . '.png' . '" alt="' . ($row['disponibilidad'] ? 'Si' : 'No') . '"></h1>';
                        echo '<div ';
                        if (!$row['disponibilidad']) {
                            echo 'style="filter: grayscale(100%)" ';
                        }
                        echo ' class="div-res id' . $row['ID'] . '"><a class="btn-reservar" ';
                        if (!$row['disponibilidad']) {
                            echo 'style="pointer-events: none; color: gray;" ';
                        } else {
                            echo 'href="../forms/reserva.php?id=' . $row['ID'] . '"';
                        }
                        echo '>Reservar</a></div>';
                        echo '<button class="btn-v id' . $row['ID'] . '"><img class="toggle-reserva closed" src="../assets/images/lr-arrow.png" alt=""></button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p style=''>No hay habitaciones suite disponibles.</p>";
                }
                ?>

            </div>
        </div>
    </main>
    

    <script>
        fetch('../templates/header.html')
            .then(res => res.text())
            .then(data => {
        document.getElementById('header').innerHTML = data;
        });
        fetch('../templates/footer.html')
            .then(res => res.text())
            .then(data => {
        document.getElementById('footer').innerHTML = data;
        });

        addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.btn-v');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.card');
                    console.log(card.style);
                    const reservaDiv = card.querySelector('.div-res');
                    const toggleIcon = this.querySelector('.toggle-reserva');

                    if (reservaDiv.style.display === 'block') {
                        card.style.height = '380px';
                        reservaDiv.style.display = 'none';
                        toggleIcon.classList.add('closed');
                        toggleIcon.classList.remove('opened');
                    } else {
                        card.style.height = '430px';
                        reservaDiv.style.display = 'block';
                        toggleIcon.classList.add('opened');
                        toggleIcon.classList.remove('closed');
                    }
                });
            });

            const cards = document.querySelectorAll('.card');
            const cardsArray = Array.from(cards);

            // Ordenar por disponibilidad
            cardsArray.sort((a, b) => {
                const dispA = a.querySelector('.img-disp').src.includes('img-disp-1');
                const dispB = b.querySelector('.img-disp').src.includes('img-disp-1');
                return dispB - dispA;
            });

            const trackT1 = document.querySelector('.t1');
            const trackT2 = document.querySelector('.t2');
            const trackT3 = document.querySelector('.t3');

            // Vaciar pistas
            trackT1.innerHTML = '';
            trackT2.innerHTML = '';
            trackT3.innerHTML = '';

            cardsArray.forEach(card => {
                const tipo = card.dataset.tipo?.toLowerCase();
                if (tipo === 'estándar') {
                    trackT1.appendChild(card);
                } else if (tipo === 'deluxe') {
                    trackT2.appendChild(card);
                } else if (tipo === 'suite') {
                    trackT3.appendChild(card);
                }
            });


            
        });

        function moveLeftT1() {
            document.querySelector('.t1').scrollBy({
                left: -330,
                behavior: 'smooth'
            });
        }
        function moveRightT1() {
            document.querySelector('.t1').scrollBy({
                left: 330,
                behavior: 'smooth'
            });
        }
        function moveLeftT2() {
            document.querySelector('.t2').scrollBy({
                left: -330,
                behavior: 'smooth'
            });
        }
        function moveRightT2() {
            document.querySelector('.t2').scrollBy({
                left: 330,
                behavior: 'smooth'
            });
        }
        function moveLeftT3() {
            document.querySelector('.t3').scrollBy({
                left: -330,
                behavior: 'smooth'
            });
        }
        function moveRightT3() {
            document.querySelector('.t3').scrollBy({
                left: 330,
                behavior: 'smooth'
            });
        }

    </script>
</body>
<footer id="footer"></footer>
</html>