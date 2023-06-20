<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id_libro = $_GET['id'];

    try {
        $query = "DELETE FROM libros WHERE id_libro = :id_libro";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id_libro', $id_libro);
        $statement->execute();

        $_SESSION['message'] = 'Libro eliminado con exito';
        header('Location: libros.php');
        exit();
    } catch (PDOException $e) {
        die("Eliminacion fallida: " . $e->getMessage());
    }
}
?>
