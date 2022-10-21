<?php
    include ('conexion.php');

    $email = $_POST['correo'];
    $pass = $_POST['contrasena'];

    $consulta = mysqli_query ($con, "SELECT * FROM user WHERE correo = '$email' && contrasena = '$pass'");
    if ($rows = mysqli_fetch_array($consulta)) {
        session_start();

        echo "<script>
        alert('LOGUEADO CORRECTAMENTE');
        location.href = '../index.html';
    </script>";
    
    } else {
        echo "<script>
        alert('Error DATOS NO VALIDADOS');
        location.href = '../login.html';
    </script>";
    }

    mysqli_close($con);
?>