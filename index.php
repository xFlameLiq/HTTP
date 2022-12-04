<?php
    session_start();
    include('php/conexion.php');
    if(isset($_SESSION['correo'])){
        $sesion = true;

        $identificador = $_SESSION['correo'];
        $buscarUsuario = $con->query("SELECT * FROM user WHERE correo='$identificador'");

        $row = $buscarUsuario->fetch_array();

        $usuario = $row['nombre'];
        $type = $row['userType'];
    }

    else {
        $sesion = false;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <script src="https://kit.fontawesome.com/baf257f71e.js" crossorigin="anonymous"></script>
    <title>MOBILE PHONE</title>
</head>
<body>

    <header>
        <div class="container">
            <nav class="nav">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
                <a href="#" class="logo">(MOBILE PHONE <i class="fa-solid fa-mobile-button"></i>)</a>
                <ul class="nav-list">
                    <?php if($sesion == true) {
                        echo '<li class="nav-item">
                    <a href="php/logout.php" class="nav-link">CERRAR SESION</a>
                                </li>';
                                if($type == 0) {
                                    echo '<li class="nav-item">
                                    <a href="productos.php" class="nav-link">PRODUCTOS</a>
                                                </li>';
                                }
                                if($type == 1) {
                                    echo '<li class="nav-item">
                                    <a href="panelAdministrador.html" class="nav-link">PANEL DE ADMINISTRADOR</a>
                                                </li>';
                                }
                    } else {
                        echo '<li class="nav-item">
                    <a href="login.html" class="nav-link">INICIAR SESION</a>
                                </li>';
                        echo '                    <li class="nav-item">
                        <a href="register.html" class="nav-link ">REGISTRARSE</a>
                    </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.html" class="nav-link ">NOSOTROS</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.html" class="nav-link ">PROVEEDORES</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="hero" id="hero">
        <div class="container">
            <h1 class="head">MOBILE PHONE</h1>
        </div>
    </section>

    <section class="dis-sto">
        <div class="container">
            <div class="res-info">
                <div class="image">
                    <img src="./assets/images/velocidad-phone.webp" alt="">
                </div>
            
                <div class="res-des pad-rig">
                    <div class="global">
                        <h1 class="head hea-dark">VELOCIDAD</h1>
                    </div>
                    <p>
                        Adquiere tu nuevo telefono de una manera rápida, cómoda y sencilla, sin necesidad de salir de tu casa. Tan solo unos cuantos minutos y ya podrás presumir de un nuevo estilo
                    </p>
                </div>

            </div>
        </div>
    </section>


    <section class="disco">
        <div class="container">
            <div class="res-info">
                <div class="res-des">
                    <div class="global">
                        <h1 class="head hea-dark">CALIDAD</h1>
                    </div>
                    <p>
                        En mobile phone podrás estar seguro que lo que compras cuenta con una garantía que asegura la funcionalidad del producto así como la satisfacción de estrenar un nuevo y único estilo diferente pensado para cada persona.
                    </p>
                </div>
                <div class="image-group pad-rig image">
                    <img src="./assets/images/calidad-phone-1.jpg" alt="">
                    <img src="./assets/images/calidad-phone-2.jpg" alt="">
                    <img src="./assets/images/calidad-phone-3.jpg" alt="">
                    <img src="./assets/images/calidad-phone-4.jpg" alt="">
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="res-info">

                <div class="image-group image">
                    <img src="./assets/images/satisfaccion.png" alt="">
                    <img src="./assets/images/precio.png" alt="">
                </div>
                <div class="res-des pad-rig">
                    <div class="global">
                        <h1 class="head hea-dark">PRECIO</h1>
                    </div>
                    <p>
                        Siéntase seguro que el precio va de acuerdo a la satisfacción que tendrá al adquirir cualquiera de nuestros dispositivos, además de pagar algo justo, está pagando por algo extraordinario.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-general">
                <!--<p>Empresa dedicada a la venta de dispositivos moviles para que cualquier persona pueda adquirir un nuevo telefono que se adapte a las necesidades de cada uno. 
                </p> -->
            <div class="footer-logo">
                <h4>LOGO</h4>
                <a href="#" class="logo">(<i class="fa-solid fa-mobile-button"></i>)</a>
            </div>
            <div class="footer-media">
                <h4>SIGUENOS</h4>
                <ul class="icon">
                    <li>
                        <a href="https://github.com/xFlameLiq/WEB-DEVELOPMENT"><i class="fa-brands fa-github"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="author-container">
            <p class="author">© 2022 MOBILE PHONE Inc. Derechos Reservados. Distribuidor autorizado.</p>
        </div>

      </footer>
    <script>

        const selectElement = function(element) {
            return document.querySelector(element);
        }


        let menuToggle = selectElement('.menu-toggle');
        let body = selectElement('body');

        menuToggle.addEventListener('click', function(){
            body.classList.toggle('open');
        })

    </script>

    
</body>
</html>