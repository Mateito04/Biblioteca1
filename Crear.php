<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Crear</title>
</head>

<body class="Crear">
    <form  method="POST">
    <div class="crcuenta">
        <br>
        <h2>Bienvenido a la biblioteca</h2>
        <br>
        <h2>Direccion</h2>
        <br>
        <input type="text" name="direccion">
        <br><br>
        <h2>Nombre</h2>
        <br>
        <input type="text" name="nombre_cliente">
        <br><br>
        <h2>Celular</h2>
        <br>
        <input type="password" name="celular">
        <br><br>
        <h2>Confirmar Celular</h2>
        <br>
        <input type="password" name="celular">
        <br><br>
        <button type="submit" name="crear">Crear</button>
        <br><br>
    </div>
    </form>
    <div class="circulo">
        <div class="Logo">
            <h1 class="Titulo">Creando Cuenta</h1>
            <img class="imagen" src="imagenes/Logo.png">
        </div>
    </div>
    <hr>

<?php
include 'db.php';
if(isset($_POST['crear'])){
    $direccion = $_POST['direccion'] ;
    $celular = $_POST['celular'] ;
    $nom = $_POST['nombre_cliente'] ;
    $query = "INSERT INTO clientes(nombre_cliente, celular, direccion) VALUES ('$nom','$celular','$direccion')";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    echo "<script>
    alert('Se creo el usuario');
    window.location.href = 'Ingreso.php';
    </script>";
}

?>
</body>

</html>