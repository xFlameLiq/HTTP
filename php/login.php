<?php
    include ('conexion.php');

    $email = $_POST['correo'];
    $pass = $_POST['contrasena'];

    $consulta = mysqli_query ($con, "SELECT * FROM user WHERE correo = '$email' && contrasena = '$pass'");
    if ($rows = mysqli_fetch_array($consulta)) {
        session_start();
        $_SESSION['correo'] = $email;

        echo "<script>
        alert('Logueado correctamente');
        location.href = '../index.php';
    </script>";

    
    } else {
        echo "<script>
        alert('Error, datos no validos');
        location.href = '../login.html';
    </script>";

    }

?>