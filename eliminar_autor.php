<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id_autor = $_GET['id'];

    try {
        $query = "DELETE FROM autores WHERE id_autor = :id_autor";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id_autor', $id_autor);
        $statement->execute();

        $_SESSION['message'] = 'Autor eliminado con exito';
        header('Location: autores.php');
        exit();
    } catch (PDOException $e) {
        die("Eliminacion fallida: " . $e->getMessage());
    }
}
?>
