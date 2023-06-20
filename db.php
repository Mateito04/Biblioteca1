<?php

$servidor = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_datos = 'biblioteca';

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} 
catch(PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>
