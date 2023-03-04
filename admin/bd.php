<?php

$servidor="localhost";
$baseDeDatos="website";
$usuario="root";
$contrasena="";

try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasena);
    echo "Conexión exitosa";

}catch(Exception $error){
    echo "Error de conexión: ".$error->getMessage();
   
}

?>