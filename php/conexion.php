<?php
    $db_host = "localhost";
    $db_user ="root";
    $db_password="";
    $db_name="phone_mobile";

    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    function conectar() {
        $db_host = "localhost";
        $db_user ="root";
        $db_password="";
        $db_name="phone_mobile";
    
        $con = mysqli_connect($db_host, $db_user, $db_password);
        mysqli_select_db($con,$db_name);
        return $con;
    }
?>