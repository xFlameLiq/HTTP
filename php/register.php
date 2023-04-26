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
        echo "<script>
        alert('Se ha registrado con exito');
        location.href = '../register.html';
    </script>";
    } else {
        echo "Se encontró un error";
    }
}

else {
    echo "<script>
        alert('Error, ya existe el correo');
        location.href = '../register.html';
    </script>";
}

mysqli_close($con);

?>
