
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css" >
    
    <title>Ingreso</title>
</head>
<body>
    <form method="post">
    <br>
    <h1>Biblioteca</h1>
    <img src="imagenes/Logo.png">
    <br><br>
    <div class="Contenedor">
        <br><br>
        <h1>Nombre</h1>
        <br>
        <img src="imagenes/user.png" class="user"> <input type="text" name="nombre">
        <br><br>
        <h1>Celular</h1>
        <br>
        <img src="imagenes/padlock.png" class="user"> <input type="password" name="celular">
        <br><br>
        <input type="submit" class="bus" value="Ingresar" name="Ingresar">
        <br><br>
        <a href="Crear.php" >Crear Cuenta</a>
        <br><br>
        <hr>
        <br>
        <footer>ADSO-Sena  Automatización Industrial Manizales <br>
            Mateo Marín Ocampo </footer>
        <br>
    </form>
    </div>
    <?php
    include 'db.php';
        if (isset($_POST['Ingresar'])){
            $nom= $_POST['nombre'];
            $cel= $_POST['celular'];
            $query = "SELECT * FROM clientes";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $entro_rico = false;

            foreach($usuarios as $us){
                if($cel == $us['celular'] && $nom == $us['nombre_cliente']){
                    $entro_rico = true;
                    break;
                }
            }

            if($entro_rico == true){
                echo "<script>
                    alert('Si es usted');
                    window.location.href = 'Libros.php';
                    </script>";
            }else{
                echo "<script>alert('No es usted');</script>";
            }
        }
    ?>
</body>
</html>
<!-- window.location.href = 'Ingreso.php'; -->