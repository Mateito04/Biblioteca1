<?php
include("db.php");

$id_autor = '';
$nombre_libro = '';
$fecha_publicacion = '';
$genero = '';
$personajes = '';
$cantidad= '';

if (isset($_GET['id_libro'])) {
    $id = $_GET['id_libro'];
    $query = "SELECT * FROM libros WHERE id_libro = :id_libro";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_libro', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_autor = $row['id_autor'];
        $nombre_libro = $row['nombre_libro'];
        $fecha_publicacion = $row['fecha_publicacion'];
        $genero = $row['genero'];
        $personajes = $row['personajes'];
        $cantidad = $row['cantidad'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $id_autor = $_POST['id_autor'];
    $nombre_libro = $_POST['nombre_libro'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $genero = $_POST['genero'];
    $personajes=$_POST['personajes'];
    $cantidad=$_POST['cantidad'];

    $query = "UPDATE libros SET id_autor = :id_autor, nombre_libro = :nombre_libro, fecha_publicacion = :fecha_publicacion, genero = :genero, personajes = :personajes, cantidad = :cantidad WHERE id_libro = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_autor', $id_autor);
    $stmt->bindParam(':nombre_libro', $nombre_libro);
    $stmt->bindParam(':fecha_publicacion', $fecha_publicacion);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':personajes', $personajes);
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $_SESSION['message'] = 'Libro actualizado ';
    $_SESSION['message_type'] = 'warning';
    header('Location: libros.php');
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
       <h1>Actualizar Libros</h1>
       <hr> 
       <br>
    </div>
    <div class="container3">
        <form action="edit_libros.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <label for="id_autor">ID del autor:</label>
                <input name="id_autor" placeholder="Actualizar ID autor" required><?php echo $id_autor; ?></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="nombre_libro">Nombre del libro:</label>
                <input name="nombre_libro" type="text" value="<?php echo $nombre_libro; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="fecha_publicacion">Fecha publicacion:</label>
                <input name="fecha_publicacion" type="date" value="<?php echo $fecha_publicacion; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="genero">Genero:</label>
                <input name="genero" type="text" value="<?php echo $genero; ?>" placeholder="Actualiza el genero" required>
            </div>
            <br>
            <div class="form-group">
                <label for="personajes">Personajes:</label>
                <input name="personajes" type="text" value="<?php echo $personajes; ?>" placeholder="Actualiza el personaje" required>
            </div>
            <br>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input name="cantidad" type="text" value="<?php echo $cantidad; ?>" placeholder="Actualiza la cantidad" required>
            </div>
            <br>
            <button type="submit" name="update" class="button">Actualizar</button>
        </form>
    </div>
</body>
</html>