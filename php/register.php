<?php
    include ('conexion.php');

if(!$con) {
    die("Error" . mysql_connect_error());

}

echo "Conectando...";
//$id = $_POST['id'];


$name = $_POST['nombre'];
$lastname = $_POST['apellido'];
$adress = $_POST['direccion'];
$email = $_POST['correo'];
$pass = $_POST['contrasena'];
$phone = $_POST['telefono'];
$sex = $_POST['sexo'];

$buscar = $con->query("SELECT * FROM user WHERE correo LIKE '%$email%'");
$row = $buscar->fetch_array();
$recuperarDato = $row['correo'];

if(!($recuperarDato == $_POST['correo'])) {
    $insert = "INSERT INTO user (id, nombre, apellido, direccion, telefono, sexo, correo, contrasena)
    values ('0','$name', '$lastname', '$adress', '$phone', '$sex','$email','$pass')";

    $ir = mysqli_query($con,$insert);

    if($ir){
        echo "Se ha registrado con exito";
    } else {
        echo "Se encontró un error";
    }
}

else {
    echo "<script>
        alert('Error, ya existe el correo');
        location.href = 'register.html';
    </script>";
}

mysqli_close($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Formularios</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <h2>Datos Introducidos</h2>
   <!--<p><b>ID:</b> <?php echo $id?></p> -->
    <p><b>Nombre:</b> <?php echo $name ?></p>
    <p><b>Apellido:</b> <?php echo $lastname ?></p>
    <p><b>Direccion:</b> <?php echo $adress ?></p>
    <p><b>Telefono:</b> <?php echo $phone ?></p>
    <p><b>Sexo:</b> <?php echo $sex ?></p>
    <p><b>Correo:</b> <?php echo $email ?></p>
    <p><b>Contraseña:</b> <?php echo $pass ?></p>
</body>
</html>
