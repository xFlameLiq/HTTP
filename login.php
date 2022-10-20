<?php
    include ('conexion.php');

    $email = $_POST['correo'];
    $pass = $_POST['contrasena'];

    $consulta = "SELECT * FROM user WHERE correo='$email' AND contrasena='$pass'";
    $query = mysqli_query($conexion, $consulta);
    
    
    if() {

    }
?>