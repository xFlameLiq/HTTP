<?php
    session_start();
    include('conexion.php');
    session_destroy();
?>
<script type="text/javascript">
    alert("Sesion cerrada");
    location.href = '../index.php';
</script>

