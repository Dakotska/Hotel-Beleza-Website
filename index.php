<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Beleza</title>
    <link rel="icon" href="assets/images/Logo_Beleza.png">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <header id="header"></header>

        <div class="section-one section">
            <img src="assets/images/main-bg.webp" alt="Hotel Beleza">
            <div class="so-text">
                <h1>Hotel Beleza</h1>
                <h2>Desde 1995</h2>
                <br>
                <p>Vive la tranquilidad frente al mar en Hotel Beleza. Disfruta de atardeceres mágicos, gastronomía local y la atención personalizada que nos distingue desde hace más de 25 años.</p>
                <br>
                <input class="butonredi" type="button" value="Conoce más →" onclick="document.querySelector('.butonredi').scrollIntoView({ behavior: 'smooth', block: 'start' });">
            </div>
        </div>
        <div class="section-two section">
            <div class="card card-1"  >
                <div class="card-title ct-1"></div>
                <h3>Quienes somos</h3>
                <hr>
                <p>Desde 1995, Hotel Beleza es un rincón de paz donde el confort se funde con la naturaleza. Vive la esencia del mar en cada detalle y redescubre el descanso frente a la costa.</p>
            </div>
            <div class="card card-2">
                <div class="card-title ct-2"></div>
                <h3>Restaurante</h3>
                <hr>
                <p>Disfruta de la auténtica cocina mexicana en el restaurante de Hotel Beleza. Sabores tradicionales, ingredientes frescos y un ambiente acogedor para cada momento del día.</p>
                <input type="button" value="Ver mas ⮕" class="butones" onclick="location.href='/Hotel-Beleza-Website/pages/restaurant.php'">
            </div>
            <div class="card card-3">
                <div class="card-title ct-3"></div>
                <h3>Habitaciones</h3>
                <hr>
                <p>Habitaciones elegantes con vista al océano, balcón privado y todos los lujos: aire acondicionado, minibar, TV y WiFi gratuito. Cada rincón está diseñado para tu descanso y confort.</p>
                <input type="button" value="Ver mas ⮕" class="butones" onclick="location.href='/Hotel-Beleza-Website/pages/booking.php'">
            </div>
        </div>
        <span id="href-productos"></span>
        <div class="section-three section" id="section-productos">
            <div class="container">
                <div class="carousel">
                    <input type="radio" id="carousel-1" name="carousel[]" checked>
                    <input type="radio" id="carousel-2" name="carousel[]">
                    <input type="radio" id="carousel-3" name="carousel[]">
                    <input type="radio" id="carousel-4" name="carousel[]">
                    <input type="radio" id="carousel-5" name="carousel[]">
                    
                    <ul class="carousel__items">
                        <li class="carousel__item"><img src="/Hotel-Beleza-Website/assets/images/Souvenir1.png" alt=""></li>
                        <li class="carousel__item"><img src="/Hotel-Beleza-Website/assets/images/Souvenir2.png" alt=""></li>
                        <li class="carousel__item"><img src="/Hotel-Beleza-Website/assets/images/Souvenir3.png" alt=""></li>
                        <li class="carousel__item"><img src="/Hotel-Beleza-Website/assets/images/Souvenir4.png" alt=""></li>
                        <li class="carousel__item"><img src="/Hotel-Beleza-Website/assets/images/Souvenir5.png" alt=""></li>
                    </ul>
                    
                    <div class="carousel__prev">
                        <label for="carousel-1"></label>
                        <label for="carousel-2"></label>
                        <label for="carousel-3"></label>
                        <label for="carousel-4"></label>
                        <label for="carousel-5"></label>
                    </div>
                    
                    <div class="carousel__next">
                        <label for="carousel-1"></label>
                        <label for="carousel-2"></label>
                        <label for="carousel-3"></label>
                        <label for="carousel-4"></label>
                        <label for="carousel-5"></label>
                    </div>
                    
                    <div class="carousel__nav">
                        <label for="carousel-1"></label>
                        <label for="carousel-2"></label>
                        <label for="carousel-3"></label>
                        <label for="carousel-4"></label>
                        <label for="carousel-5"></label>
                    </div>
                </div>
            </div>
        </div>

    <script>
        fetch('/Hotel-Beleza-Website/templates/header.html')
            .then(res => res.text())
            .then(data => {
        document.getElementById('header').innerHTML = data;
    });
        fetch('/Hotel-Beleza-Website/templates/footer.html')
            .then(res => res.text())
            .then(data => {
        document.getElementById('footer').innerHTML = data;
    });
    </script>

    <?php if (isset($_GET["register"]) && $_GET["register"] == 1) { ?>
    <script> alert("Cuenta registrada correctamente!") </script>
    <?php } ?>

</body>
<footer id="footer"></footer>
</html>