<?php 
include('php/conexion.php');
$con=conectar();
$sql="SELECT * FROM products";
$query=mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="css/editPanel.css" />
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://kit.fontawesome.com/baf257f71e.js" crossorigin="anonymous"></script>
 
  <title>MODIFICACION</title>
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
                <a href="index.php" target="_self" class="nav-link ">HOME</a>
            </li>
            </ul>
        </nav>
    </div>
  </header>

<form action="" method="GET">
  <div class="buscador">
    <div>
      <label for="buscador">Buscador:</label>
      <input class="box" type="text" name="buscador" id="buscador" placeholder="Ingrese la marca a buscar" />
    </div>
    <div class="btn-buscador">
        <button type="submit" name="buscar" id="buscar">Buscar</button>
    </div>
  </div>
</form>
<?php 
    if(isset($_GET['buscar'])) {
        $busqueda=$_GET['buscador'];
        $consulta = $con->query("SELECT * FROM products WHERE modelo LIKE '%$busqueda%'");

        while($row = $consulta->fetch_array()) {
            echo $row['modelo'];
        }
    }
?>
   
  </div>
  <div class="edit-container">
  <h1 class="title">MODIFICAR PRODUCTOS</h1>
    <div class="products">
    <?php 
        while($row=mysqli_fetch_array($query)) {
    ?>
         <div class="registers">
            <div class ="content-prod">
            <p>Identificador <span><?php echo $row['id']?></span></p>
            <p>Foto: <span><?php echo $row['foto']?></span></p>
            <p>Marca: <span><?php echo $row['marca']?></span></p>
            <p>Modelo: <span><?php echo $row['modelo']?></span></p>
            <p>Precio: <span><?php echo $row['precio']?></span></p>
            <p>Procesador: <span><?php echo $row['procesador']?></span></p>
            <p>Memoria RAM: <span><?php echo $row['memoriaRAM']?></span></p>
            <p>Almacenamiento: <span><?php echo $row['memoriaROM']?></span></p>
            <p>Bateria: <span><?php echo $row['bateria']?></span></p>
            <p>Descripcion: <span><?php echo $row['descripcion']?></span></p>
            </div>

            <div class="buttons">
                <a href="php/delete.php?id=<?php echo $row['id'] ?>">
                    <button>Eliminar</button>
                </a>
                <a href="actualizarProducto.php?id=<?php echo $row['id'] ?>">
                    <button>Modificar</button>
                </a>
            </div>
                   

         </div>

         <?php 
        }
    ?>
    </div>
   
  </div>

 


  <footer class="footer">
    <div class="footer-general">
        <div class="footer-about">
            <h4></h4>
            <p>© 2022 MOBILE PHONE Inc. Derechos Reservados. Distribuidor autorizado.</p>
            <!--<p>Empresa dedicada a la venta de dispositivos moviles para que cualquier persona pueda adquirir un nuevo telefono que se adapte a las necesidades de cada uno. 
            </p> -->
        </div>
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

