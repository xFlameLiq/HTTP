<?php 
include('conexion.php');
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM products WHERE id = '$id'";
$query=mysqli_query($con,$sql);

    if($query) {
        echo "<script>
        alert('Eliminado correctamente');
        location.href = '../editarProducto.php';
    </script>";
    }
?>