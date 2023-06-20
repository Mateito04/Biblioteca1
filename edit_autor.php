<?php
include("db.php");

$nombre_autor = '';
$nacionalidad_autor = '';
$distinciones = '';


if (isset($_GET['id_autor'])) {
    $id = $_GET['id_autor'];
    $query = "SELECT * FROM libros WHERE id_autor = :id_autor";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_autor', $id);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombre_autor = $row['nombre_autor'];
        $nacionalidad_autor = $row['nacionalidad_autor'];
        $distinciones = $row['distinciones'];

    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre_autor = $_POST['nombre_autor'];
    $nacionalidad_autor = $_POST['nacionalidad_autor'];
    $distinciones = $_POST['distinciones'];



    $query = "UPDATE autores SET nombre_autor = :nombre_autor, nacionalidad_autor = :nacionalidad_autor, distinciones = :distinciones  WHERE id_autor = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre_autor', $nombre_autor);
    $stmt->bindParam(':nacionalidad_autor', $nacionalidad_autor);
    $stmt->bindParam(':distinciones', $distinciones);


    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $_SESSION['message'] = 'Autor actualizado ';
    $_SESSION['message_type'] = 'warning';
    header('Location: autores.php');
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
       <h1>Actualizar Autores</h1>
       <hr> 
       <br>
    </div>
    <div class="container4">
        <form action="edit_autor.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <label for="nombre_autor">Nombre del autor</label>
                <input name="nombre_autor" placeholder="Actualizar nombre del autor" required><?php echo $nombre_autor; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="nacionalidad_autor">Nacionalidad del libro:</label>
                <input name="nacionalidad_autor" type="text" value="<?php echo $nacionalidad_autor; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <label for="distinciones">Distinciones</label>
                <input name="distinciones" type="text" value="<?php echo $distinciones; ?>" placeholder="Actualiza el distinciones" required>
            </div>
            <br>
            <button type="submit" name="update" class="button">Actualizar</button>
        </form>
    </div>
</body>
</html>