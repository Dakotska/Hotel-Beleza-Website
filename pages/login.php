<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Beleza | Login</title>
    <link rel="icon" href="../assets/images/Logo_Beleza.png">
    <link rel="stylesheet" href="../assets/css/login.css">
    <script type="text/javascript" src="../assets/js/login.js"></script>
</head>
<body>
    <div id="header"></div>

    <div class="colors"></div>
    <div class="bg">
        <div class="container">
            <div class="form form-login active">
                <h2>¡Hola de nuevo! 👋</h2>
                <h3>Ingresa tus datos abajo para iniciar sesion</h3>
                    <form action="../forms/b_login.php" method="POST">
                        <h3>Usuario:</h3>
                        <input type="text" placeholder="Ingresa tu usuario" class="input-text" name="l_usu" id="lusu" maxlength="30" required>
                        <h3>Contraseña:</h3>
                        <input type="password" class="input-text" placeholder="Ingresa tu contraseña" name="l_pass" id="lpass" maxlength="75" required>
                        <div class="btns"><input class="btn btn-limpiar" type="reset" value="Limpiar">
                        <input class="btn btn-ing" type="submit" value="Ingresar"></div>
                    </form>
                <h3>¿Todavia no estas registrado? <a class="underline-offset" style="cursor: pointer;" onclick="smoothChange()">¡Hazlo aqui!</a></h3>
            </div>
            <div class="form form-register no-active">
                <h2>¡Hola, Bienvenido 👋!</h2>
                <h3>Ingresa tus datos para poder registrarte</h3>
                <form action="../forms/b_register.php" method="POST">
                    <h3>Nombre Completo:</h3>
                    <input type="text" class="input-text" name="r_name" id="rname" placeholder="Ingresa tu nombre" maxlength="60" required>
                    <h3>Usuario:</h3>
                    <input type="text" class="input-text" name="r_usu" id="rusu" placeholder="Ingresa tu usuario" maxlength="30" required>
                    <h3>Email:</h3>
                    <input type="email" class="input-text" name="r_email" id="remail" placeholder="Ingresa tu email" maxlength="90" required>
                    <h3>Contraseña:</h3>
                    <input type="password" class="input-text" name="r_pass" id="rpass" placeholder="Ingresa tu contraseña" maxlength="75" required>
                    <h5 style="margin-top: 10px;">¿Ya tienes cuenta? <a style="cursor: pointer;" onclick="smoothChange()">Inicia sesión!</a></h5>
                    <div class="btns"><input class="btn btn-limpiar" type="reset" value="Limpiar">
                    <input class="btn btn-reg " type="submit" value="Registrarte"></div>
                </form>
            </div>
            <div class="images login">
                <div class="img-login img active"><img src="../assets/images/img-login.png" alt=""></div>
                <div class="img-register img no-active"><img src="../assets/images/img-register.png"></div>
            </div>
        </div>
    </div>
    
    <?php if (isset($_GET["error"]) && $_GET["error"] == 1) { ?>
        <script>alert("Usuario y/o Contraseña incorrectos");</script>
    <?php } else if (isset($_GET["error"]) && $_GET["error"] == 2) { 
        echo "" . mysqli_connect_error; ?>
        <script>alert("Usuario ya existente")</script>
    <?php } ?>
</body>
</html>