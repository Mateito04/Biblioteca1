<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id_prestamo = $_GET['id'];

    try {
        $query = "DELETE FROM prestamos WHERE id_prestamo = :id_prestamo";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id_prestamo', $id_prestamo);
        $statement->execute();

        $_SESSION['message'] = 'Prestamo eliminado con exito';
        header('Location: Prestamo.php');
        exit();
    } catch (PDOException $e) {
        die("Eliminacion fallida: " . $e->getMessage());
    }
}
?>
