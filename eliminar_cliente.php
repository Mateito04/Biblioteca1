<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    try {
        $query = "DELETE FROM clientes WHERE id_cliente = :id_cliente";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':id_cliente', $id_cliente);
        $statement->execute();

        $_SESSION['message'] = 'Cliente eliminado con exito';
        header('Location: clientes.php');
        exit();
    } catch (PDOException $e) {
        die("Eliminacion fallida: " . $e->getMessage());
    }
}
?>
