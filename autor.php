<?php
include("db.php");

if (isset($_POST['autores'])) {

    $noma = $_POST['nombre_autor'];
    $nac = $_POST['nacionalidad_autor'];
    $dis = $_POST['distinciones'];


    $query = "INSERT INTO `autores`(`nombre_autor`, `nacionalidad_autor`, `distinciones`) VALUES ('[value-2]','[value-3]','[value-4]')";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre_autor', $noma);
    $stmt->bindParam(':nacionalidad_autor', $nac);
    $stmt->bindParam(':distinciones', $dis);



    if ($stmt->execute()) {
        $_SESSION['message'] = 'Employee created successfully';
        header("Location: /Biblioteca/autor.php");
        exit();
    } else {
        die("QUERY FAILED");
    }
}
