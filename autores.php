<?php require('./db.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_autor = $_POST["nombre_autor"];
    $nacionalidad_autor = $_POST["nacionalidad_autor"];
    $distinciones = $_POST["distinciones"];

    $sql = "INSERT INTO autores (nombre_autor, nacionalidad_autor, distinciones) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre_autor, $nacionalidad_autor, $distinciones]);


    header("Location: autores.php");
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
    <title>Autores</title>
</head>

<body>
    <br>
    <img class="lol" src="imagenes/Logo.png">
    <h1 class="lib">Autores</h1>
    <hr>
 

    <br><br>
    <br><br>
    <table class="ta"style="width:100%">
        <tr>
            <th>Nombre</th>
            <th>Nacionalidad</th>
            <th>Distinciones</th>

 
            <th></th>
        </tr>
        <?php
        $query = "SELECT * FROM autores";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre_autor'] . "</td>";
            echo "<td>" . $row['nacionalidad_autor'] . "</td>";
            echo "<td>" . $row['distinciones'] . "</td>";
            echo "<td>";
            echo "<a href='edit_autor.php?id=" . $row['id_autor'] . "' class='btn btn-secondary'>";
            echo "<i class='fas fa-marker'></i>";
            echo "</a>";
            echo "<a href='eliminar_autor.php?id=" . $row['id_autor'] . "' class='btn btn-danger'>";
            echo "<i class='far fa-trash-alt'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>  
   </table>
   <div class="title-subtitle">     
        <h1>Crear Autores</h1>
        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="container6">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="margin: 20px;">
            <div class="form-group">
                <label for="nombre_autor">Nombre autor:</label>
                <input id="nombre_autor" name="nombre_autor" required></input>
            </div>
            <div class="form-group">
                <label for="nacionalidad_autor">Nacionalidad Autor</label>
                <input type="text" id="nacionalidad_autor" name="nacionalidad_autor" required>
            </div>
            <div class="form-group">
                <label for="distinciones">Distinciones:</label>
                <input id="distinciones" name="distinciones" required>
            </div>

            <br>
            <div class="form-group">
                <button type="submit">Crear Autor</button>
            </div>
        </form>
    </div>
  
   
   <footer>  
        <div class="menu1">
            <div class="cr1">
                <div class="cr3"></div>
            </div>
            <a href="Libros.php"><img class="mm2" src="./imagenes/libron.png" alt="librrr"></a>
            <a href="autores.php"><img class="autor1" src="./imagenes/autorv.png" alt="au"></a>
            <a href="Prestamo.php"><img class="prestamo1" src="./imagenes/prestamo.png" alt="ok"></a>
            
        </div>
    </footer>

</body>

</html>
