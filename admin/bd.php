<?php

$servidor = "localhost";
$baseDeDatos = "website";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasena);
    
} catch (Exception $error) {
    echo $error->getMessage();
}
?>