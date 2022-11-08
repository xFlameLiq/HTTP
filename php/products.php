<?php 
    include ('conexion.php');


    $brand = $_POST['marca'];
    $model = $_POST['modelo'];
    $price = $_POST['precio'];
    $processor = $_POST['procesador'];
    $mram = $_POST['ram'];
    $mrom = $_POST['rom'];
    $battery = $_POST['bateria'];
    $desc = $_POST['descripcion'];
    $pic = $_POST['foto'];
    $quantity = $_POST['cantidad'];
    $insert = "INSERT INTO products (id, marca, modelo, precio, procesador, memoriaRAM, memoriaROM, bateria, descripcion, foto, cantidad)
    values ('0','$brand', '$model', '$price', '$processor', '$mram','$mrom','$battery','$desc','$pic','$quantity')";

    $ir = mysqli_query($con,$insert);
    if($ir){
        echo "<script>
        alert('Se ha registrado con exito');
        location.href = '../productos.html';
    </script>";
    } else {
        echo "Se encontró un error";
    }
    mysqli_close($con);
?>