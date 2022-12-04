<?php

session_start();

include ("php/conexion.php");

$car = array(
    'productos' => array(),
    'subtotal' => 0,
    'total' => 0
);

if(isset($_SESSION["carrito"])){
    $car = $_SESSION["carrito"];
}
$carritosGuardados = [];
if(isset($_SESSION["carritos"])){
    $carritosGuardados = $_SESSION["carritos"];
}

calcular($car, $carritosGuardados);

if(isset($_GET["carrito"])){
    print $_SESSION["carrito"]['total'];
    $id = $_GET["carrito"];
    if($id){
        add($id, $car, $con, $carritosGuardados);
    }
}

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    if(isset($id) || $id == 0){
        remove($id, $car, $carritosGuardados);
    }
}

function add($p = [], &$car, &$con, &$carritosGuardados){
    $sql = mysqli_query($con, "SELECT * FROM products WHERE id = '$p' ");
    $resul = mysqli_fetch_array($sql);
    $resul['cantidad'] = 1;
    array_push($car['productos'], $resul);
    $_SESSION["carrito"] = $car;
    calcular($car, $carritosGuardados);
}

function calcular(&$car, &$carritosGuardados){
    $car['subtotal'] = 0;
    $car['total'] = 0;
    $car['index'] = 0;

    foreach($car['productos'] as &$p){
        $car['subtotal'] += $p['precio'] * $p['cantidad'];
    }
    $car['total'] = $car['subtotal'];
    $_SESSION["carrito"] = $car;

    $carritosGuardados[$car['index']] = $car;
    $_SESSION["carritos"] = $carritosGuardados;
}

function remove($index = 0, &$car, &$carritosGuardados){
    array_splice($car['productos'], $index, 1);
    calcular($car, $carritosGuardados);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/shopping_car.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/baf257f71e.js" crossorigin="anonymous"></script>
    <title>Carrito</title>

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
            <li class="nav-item">
                <a href="productos.php" target="_self" class="nav-link ">VOLVER</a>
            </li>
            </ul>
        </nav>
    </div>
  </header>

  <div class="shopping_cart-container">
    <h1>CARRITO DE COMPRAS</h1>
  



    <div class="container-products">
        <?php
            foreach($car['productos'] as $key =>$row){
        ?>
        <div class="car_products">
            <div class="devices-container">
                <p class="text">Nombre: <?php echo $row['modelo']?></p>
                <img src="assets/telefonos/<?php echo $row['foto']?>" class="photo" alt="">
                 <p class="text">Precio: <?php echo $row['precio']?>$</p>
                <p class="text">Cantidad: <?php echo $row['cantidad']?></p>
            </div>
            <form class="form"action="carrito.php" method="get">
                <button type="submit" name="remove" value="<?php echo $key ?>"> eliminar</button>
            </form>
        </div>
        <?php
            }
            ?>
    </div>
        <h1>Total a pagar: <?php echo $car['total'] ?>$</h1>
</div>

<div class="options">
        
<form action="productos.php" method="get">
        <button class="button"type="submit" name="p" value="p">Seguir Comprando</button>
    </form>
    <form action="correo.php" method="get">
        <button class="button" type="submit" name="comprar" value="comprar">Comprar</button>
    </form>
</div>

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