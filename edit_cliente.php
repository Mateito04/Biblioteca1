<?php
include("db.php");

$nombre_cliente = '';
$celular = '';
$direccion = '';


if (isset($_GET['id_cliente'])) {
    $id = $_GET['id_cliente'];
    $query = "SELECT * FROM clientes WHERE id_cliente = :id_cliente";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_cliente', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombre_cliente = $row['nombre_cliente'];
        $celular = $row['celular'];
        $direccion = $row['direccion'];

    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];



    $query = "UPDATE clientes SET nombre_cliente = :nombre_cliente, celular = :celular, direccion = :direccion  WHERE id_cliente = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre_cliente', $nombre_cliente);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':direccion', $direccion);


    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $_SESSION['message'] = 'Cliente actualizado ';
    $_SESSION['message_type'] = 'warning';
    header('Location: clientes.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Editar</title>
</head>
<body>
<div class="title-subtitle">
        <br>
        <img class="lol" src="imagenes/Logo.png">
       <h1>Actualizar Clientes</h1>
       <hr> 
       <br>
    </div>
    <div class="container4">
        <form action="edit_cliente.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <label for="nombre_cliente">Nombre del cliente</label>
                <input name="nombre_cliente" placeholder="Actualizar nombre del clientes" required><?php echo $nombre_cliente; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input name="celular" type="text" value="<?php echo $celular; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input name="direccion" type="text" value="<?php echo $direccion; ?>" placeholder="Actualiza la direccion" required>
            </div>
            <br>
            <button type="submit" name="update" class="button">Actualizar</button>
        </form>
    </div>
</body>
</html>