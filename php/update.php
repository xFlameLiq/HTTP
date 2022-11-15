<?php
include ('conexion.php');
$con=conectar();

$id=$_POST['id'];
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

$sql="UPDATE products SET marca='$brand', modelo='$model', precio='$price', procesador='$processor', memoriaRAM='$mram', memoriaROM='$mrom', bateria='$battery', descripcion='$desc', foto='$pic', cantidad='$quantity' WHERE id='$id'";
$query=mysqli_query($con,$sql);

if($query) {
    echo "<script>
    alert('Actualizado correctamente');
    location.href = '../editarProducto.php';
</script>";
}

?>
