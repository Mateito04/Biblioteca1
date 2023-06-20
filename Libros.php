<?php require('./db.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_autor = $_POST["id_autor"];
    $nombre_libro = $_POST["nombre_libro"];
    $fecha_publicacion = $_POST["fecha_publicacion"];
    $genero = $_POST["genero"];
    $personajes = $_POST["personajes"];
    $cantidad = $_POST["cantidad"];

    $sql = "INSERT INTO libros (id_autor, nombre_libro, fecha_publicacion, genero, personajes,cantidad) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_autor, $nombre_libro, $fecha_publicacion, $genero, $personajes,$cantidad]);


    header("Location: libros.php");
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
    <title>Libros</title>
</head>

<body>

    <br>
    <img class="lol" src="imagenes/Logo.png">
    <h1 class="lib">Libros</h1>
    <hr>
    <br>     
    <form action="" method="get">
    <div class="box">
        <input type="text" name="busqueda" placeholder="Buscar libros" class="src" autocomplete="off">
        <input type="submit" name="enviar" value="Buscar" class="bus">
    </div>
    </form>
    <br><br>
    <br><br>
    <table class="ta" style="width:100%">
    <tr>
            <th>TITULO</th>
            <th>AUTOR</th>
            <th>FECHA PUBLICACION</th>
            <th>CATEGORIA</th>
            <th>PERSONAJE</th>
            <TH>CANTIDAD</TH>
 
            <th></th>
        </tr>
   <?php
        if(isset($_GET['enviar'])){
            $busqueda=$_GET['busqueda'];
            $query = "SELECT * FROM libros WHERE nombre_libro LIKE '%$busqueda%'";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['nombre_libro'] . "</td>" ;
                echo "<td>" . $row['id_autor'] . "</td>";
                echo "<td>" . $row['fecha_publicacion'] . "</td>";
                echo "<td>" . $row['genero'] . "</td>";
                echo "<td>" . $row['personajes'] . "</td>";
                echo "<td>" . $row['cantidad'] . "</td>";
                echo "<td>";
                echo "<a href='edit_libros.php?id=" . $row['id_libro'] . "' class='btn btn-secondary'>";
                echo "<i class='fas fa-marker'></i>";
                echo "</a>";
                echo "<a href='eliminar_libro.php?id=" . $row['id_libro'] . "' class='btn btn-danger'>";
                echo "<i class='far fa-trash-alt'></i>";
                echo "</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>
   </table>
    
    
    <br><br>
    <br><br>
    <table class="ta"style="width:100%">
        <tr>
            <th>TITULO</th>
            <th>AUTOR</th>
            <th>FECHA PUBLICACION</th>
            <th>CATEGORIA</th>
            <th>PERSONAJE</th>
            <TH>CANTIDAD</TH>
 
            <th></th>
        </tr>
        <?php
        $query = "SELECT * FROM libros";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre_libro'] . "</td>";
            echo "<td>" . $row['id_autor'] . "</td>";
            echo "<td>" . $row['fecha_publicacion'] . "</td>";
            echo "<td>" . $row['genero'] . "</td>";
            echo "<td>" . $row['personajes'] . "</td>";
            echo "<td>" . $row['cantidad'] . "</td>";
            echo "<td>";
            echo "<a href='edit_libros.php?id=" . $row['id_libro'] . "' class='btn btn-secondary'>";
            echo "<i class='fas fa-marker'></i>";
            echo "</a>";
            echo "<a href='eliminar_libro.php?id=" . $row['id_libro'] . "' class='btn btn-danger'>";
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
                <label for="id_autor">ID autor:</label>
                <input id="id_autor" name="id_autor" required></input>
            </div>
            <div class="form-group">
                <label for="nombre_libro">Nombre libro:</label>
                <input id="nombre_libro" name="nombre_libro" required>
            </div>
            <div class="form-group">
                <label for="fecha_publicacion">Fecha publicacion:</label>
                <input type="date" id="fecha_publicacion" name="fecha_publicacion" required>
            </div>
            <div class="form-group">
                <label for="genero">Genero:</label>
                <input id="genero" name="genero" required>
            </div>
            <div class="form-group">
                <label for="personajes">Personajes:</label>
                <input type="text" id="personajes" name="personajes" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="text" id="cantidad" name="cantidad" required>
            </div>
            <br>
            <div class="form-group">
                <button type="submit">Crear Libro</button>
            </div>
        </form>
    </div>
  
   
   <footer>  
        <div class="menu1">
            <div class="cr">
                <div class="cr2"></div>
            </div>
            <a href="Libros.php"><img class="mm1" src="./imagenes/libro.png" alt="librrr"></a>
            <a href="autores.php"><img class="autor" src="./imagenes/autor.png" alt="au"></a>
            <a href="Prestamo.php"><img class="prestamo" src="./imagenes/prestamo.png" alt="ok"></a>
            
        </div>
    </footer>

</body>

</html>
