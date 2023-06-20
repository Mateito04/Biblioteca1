<?php
include("db.php");

$id_cliente = '';
$id_libro = '';
$fecha_prestamo = '';
$fecha_devolucion = '';


if (isset($_GET['id_prestamo'])) {
    $id = $_GET['id_prestamo'];
    $query = "SELECT * FROM prestamos WHERE id_prestamo = :id_prestamo";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_prestamo', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_cliente = $row['id_cliente'];
        $id_libro = $row['id_libro'];
        $fecha_prestamo = $row['fecha_prestamo'];
        $fecha_devolucion = $row['fecha_devolucion'];
    
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $id_cliente = $_POST['id_cliente'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    $query = "UPDATE prestamos SET id_cliente = :id_cliente, id_libro = :id_libro, fecha_prestamo = :fecha_prestamo, fecha_devolucion = :fecha_devolucion WHERE id_prestamo = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_libro', $id_libro);
    $stmt->bindParam(':fecha_prestamo', $fecha_prestamo);
    $stmt->bindParam(':fecha_devolucion', $fecha_devolucion);

    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $_SESSION['message'] = 'Prestamo actualizado ';
    $_SESSION['message_type'] = 'warning';
    header('Location: Prestamo.php');
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
       <h1>Actualizar Prestamos</h1>
       <hr> 
       <br>
    </div>
    <div class="container3">
        <form action="edit_prestamo.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <label for="id_cliente">ID del cliente:</label>
                <input name="id_cliente" placeholder="Actualizar ID cliente" required><?php echo $id_cliente; ?></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="id_libro">ID del libro:</label>
                <input name="id_libro" placeholder="Actualizar ID libro" type="text" value="<?php echo $id_libro; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="fecha_prestamo">Fecha prestamo:</label>
                <input name="fecha_prestamo" type="date" value="<?php echo $fecha_prestamo; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="fecha_devolucion">Fecha devolucion:</label>
                <input name="fecha_devolucion" type="date" value="<?php echo $fecha_devolucion; ?>" required>
            </div>
            <br>
            <button type="submit" name="update" class="button">Actualizar</button>
        </form>
    </div>
</body>
</html>