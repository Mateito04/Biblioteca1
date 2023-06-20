<?php
include("db.php");

if (isset($_POST['libros'])) {

    $titu = $_POST['nombre_libro'];
    $auto = $_POST['id_autor'];
    $fecha_p = $_POST['fecha_publicacion'];
    $cate = $_POST['genero'];

    $query = "INSERT INTO `libros`(`titulo`, `autor_id`, `fecha_publicacion`,`categoria`) VALUES ('[value-2]','[value-3]','[value-4]','[value-6]')";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':titulo', $titu);
    $stmt->bindParam(':autor_id', $auto);
    $stmt->bindParam(':fecha_publicacion', $fecha_p);
    $stmt->bindParam(':categoria', $cate);


    if ($stmt->execute()) {
        $_SESSION['message'] = 'Employee created successfully';
        header("Location: /Biblioteca/libro.php");
        exit();
    } else {
        die("QUERY FAILED");
    }
}
