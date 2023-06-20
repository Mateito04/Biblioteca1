<?php require('./db.php'); ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Clientes</title>
</head>

<body>
    <br>
    <img class="lol" src="imagenes/Logo.png">
    <h1 class="lib">Clientes</h1>
    <hr>
 

    <br><br>
    <br><br>
    <table class="ta"style="width:100%">
        <tr>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Direccion</th>

 
            <th></th>
        </tr>
        <?php
        $query = "SELECT * FROM clientes";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre_cliente'] . "</td>";
            echo "<td>" . $row['celular'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "<td>";
            echo "<a href='edit_cliente.php?id=" . $row['id_cliente'] . "' class='btn btn-secondary'>";
            echo "<i class='fas fa-marker'></i>";
            echo "</a>";
            echo "<a href='eliminar_cliente.php?id=" . $row['id_cliente'] . "' class='btn btn-danger'>";
            echo "<i class='far fa-trash-alt'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>  
   </table>

</body>

</html>
