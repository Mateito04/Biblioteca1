<?php require('./db.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];
    $id_libro = $_POST["id_libro"];
    $fecha_prestamo= $_POST["fecha_prestamo"];
    $fecha_devolucion = $_POST["fecha_devolucion"];


    $sql = "INSERT INTO libros (id_cliente, nombre_libro, fecha_prestamo, fecha_devolucion) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_cliente, $id_libro, $fecha_prestamo, $fecha_devolucion]);


    header("Location: Prestamo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Prestamos</title>
</head>

<body>
    <br>
    <img class="lol" src="imagenes/Logo.png">
    <h1 class="lib">Prestamos</h1>
    <hr>
 

    <br><br>
    <br><br>
    <table class="ta"style="width:100%">
        <tr>
            <th>ID cliente</th>
            <th>ID libro</th>
            <th>Fecha prestamo</th>
            <th>Fecha devolucion</th>

 
            <th></th>
        </tr>
        <?php
        $query = "SELECT * FROM prestamos";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_cliente'] . "</td>";
            echo "<td>" . $row['id_libro'] . "</td>";
            echo "<td>" . $row['fecha_prestamo'] . "</td>";
            echo "<td>" . $row['fecha_devolucion'] . "</td>";
            echo "<td>";
            echo "<a href='edit_prestamo.php?id=" . $row['id_prestamo'] . "' class='btn btn-secondary'>";
            echo "<i class='fas fa-marker'></i>";
            echo "</a>";
            echo "<a href='eliminar_prestamos.php?id=" . $row['id_prestamo'] . "' class='btn btn-danger'>";
            echo "<i class='far fa-trash-alt'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>  
   </table>
   <br>
   <div class="title-subtitle">     
        <h1>Crear libros</h1>
        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="container5">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="margin: 20px;">
            <div class="form-group">
                <label for="id_cliente">ID cliente:</label>
                <input id="id_cliente" name="id_cliente" required></input>
            </div>
            <div class="form-group">
                <label for="id_libro">ID libro:</label>
                <input id="id_libro" name="id_libro" required>
            </div>
            <div class="form-group">
                <label for="fecha_prestamo">Fecha prestamo:</label>
                <input type="date" id="fecha_prestamo" name="fecha_prestamo" required>
            </div>
            <div class="form-group">
                <label for="fecha_devolucion">Fecha devolucion:</label>
                <input type="date" id="fecha_devolucion" name="fecha_devolucion" required>
            </div>
            <br>
            <div class="form-group">
                <button type="submit">Crear Prestamo</button>
            </div>
            <br>
            <a class="clic" href="clientes.php">Ver clientes</a>
        </form>
    </div>
  
   
   <footer>  
        <div class="menu1">
            <div class="cr10">
                <div class="cr11"></div>
            </div>
            <a href="Libros.php"><img class="mm2" src="./imagenes/libron.png" alt="librrr"></a>
            <a href="autores.php"><img class="autor2" src="./imagenes/autor.png" alt="au"></a>
            <a href="Prestamo.php"><img class="prestamo2" src="./imagenes/prestamov.png" alt="ok"></a>
            
        </div>
    </footer>

</body>

</html>
