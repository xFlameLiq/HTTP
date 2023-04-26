<?php 
include ("php/conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql = "SELECT * FROM products WHERE id='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="css/updateForm.css" />
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://kit.fontawesome.com/baf257f71e.js" crossorigin="anonymous"></script>
 
<title>ACTUALIZAR</title>
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
                <a href="editarProducto.php" target="_self" class="nav-link ">VOLVER</a>
            </li>
            </ul>
        </nav>
    </div>
  </header>
 
  <form action="php/update.php" method="post" class="form form-update-productos">
    <h1 class="title">ACTUALIZAR PRODUCTO</h1>
    <label class="id">Identificador <span><?php echo $row['id']?></span></label>
    <input type="hidden" name="id" id="id" value="<?php echo $row['id']?>" />
    <div>
      <label for="marca">Marca: </label>
      <input class="box" type="text" name="marca" id="marca" placeholder="Actualizar marca" value="<?php echo $row ['marca'] ?>" maxlength="15"/>
    </div>
    <div>
      <label for="modelo">Modelo: </label>
      <input class="box" type="text" name="modelo" id="modelo" placeholder="Actualizar modelo" value="<?php echo $row ['modelo'] ?>" maxlength="15"/>
    </div>
    <div>
      <label for="precio">Precio: </label>
      <input class="box" type="text" name="precio" id="precio" placeholder="Actualizar precio" value="<?php echo $row ['precio'] ?>" maxlength="8"/>
    </div>
    <div>
      <label for="procesador">Procesador: </label>
      <input class="box" type="text" name="procesador" id="procesador" placeholder="Actualizar procesador" value="<?php echo $row ['procesador'] ?>" maxlength="20"/>
    </div>
    <div>
      <label for="ram">Memoria RAM: </label>
      <input class="box" type="text" name="ram" id="ram" placeholder="Actualizar la memoria RAM" value="<?php echo $row ['memoriaRAM'] ?>" maxlength="5"/>
    </div>
    <div>
      <label for="rom">Memoria ROM: </label>
      <input class="box" type="text" name="rom" id="rom" placeholder="Actualizar la memoria ROM" value="<?php echo $row ['memoriaROM'] ?>" maxlength="8"/>
    </div>
    <div>
      <label for="bateria">Bateria: </label>
      <input class="box" type="text" name="bateria" id="bateria" placeholder="Actualizar la capacidad de bateria" value="<?php echo $row ['bateria'] ?>" maxlength="8"/>
    </div>
    <div>
        <label for="descripcion">Descripcion: </label>
        <input class="box" type="text" name="descripcion" id="descripcion" placeholder="Actualizar la descripcion" value="<?php echo $row ['descripcion'] ?>" maxlength="120"/>
    </div>
    <div>
        <label for="foto">Foto: </label>
        <input class="box" type="file" name="foto" id="foto" value="<?php echo $row ['foto'] ?>"/>
    </div>
    <div>
        <label for="cantidad">Cantidad: </label>
        <input class="box" type="text" name="cantidad" id="cantidad" placeholder="Ingrese la nueva cantidad disponible" value="<?php echo $row ['cantidad'] ?>" maxlength="3"/>
    </div>
    
    <button class="btn" type="submit" name="registrar" id="registrar">Actualizar</button>
  </form>

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