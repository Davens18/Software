<?php
    $basedatos = 'empresa_construccion';
    $conexion = mysqli_connect('localhost', 'root', '', $basedatos) or die ("<p>Error en la conexión con la base de datos". mysqli_connect_error()."</p>");
session_start();
?>