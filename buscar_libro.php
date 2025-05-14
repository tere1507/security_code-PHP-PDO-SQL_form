<?php
session_start(); //iniciamos sesion

require_once 'includes/db_conexion.php';// este archivo contiene la función obtenerConexion() ✅ para que reconozca obtenerConexion()

//verificamos si la sesion con  usuario esta autenticado
if(!isset($_SESSION['usuario'])) {
    header('Location:login.php');
    exit;
}

//verificar si se ha enviado el id del libro
if(isset($_POST['libro'])) {
    //obtener id del libro
    $idlibro = $_POST['libro'];

    //validar id del libro
    if(empty($idlibro)) {
        $mensaje = "Please insert id book";
    } else {
        //obtener coenxion a la base de datos
        $conn = obtenerConexion();

        //preparar y ejecutar la consulta
        $stmt = $conn->prepare("SELECT * FROM libros WHERE idlibro = :idlibro");
        $stmt->execute(['idlibro' => $idlibro]);

        //verificar si se encotro el libro
        if($row = $stmt->fetch()) {
            $mensaje = "🌸 Book found : " . " " . htmlspecialchars($row['titulo']) . "<br><br>" .
            "🌻 Description : " . " " . htmlspecialchars($row['descripcion']). "<br><br>" .
            "⏳ Fecha de Ingreso : " . " " . htmlspecialchars($row['fechaIngreso']);
        } else {
            $mensaje = "Book not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Foun Book</title>
</head>
<body>
    <div class="buscar-container">
        <h2>Foun Book⏳</h2>
        <?php if(isset($mensaje)) : ?>
            <p class="mensaje"><?= $mensaje ?></p> <!--para poder colocar saltos de linea hay que asegurarnos que no tenga htmlspecialchars ya que si lo hacemos el  navegador lo escribiria litaral-->
        <?php endif; ?>

        <form action="buscar_libro.php" method="post">
            <input type="text" name="libro" id="libro" placeholder="ID book" required>
            <button type="submit">Search🤓</button>
        </form>
    </div>
</body>
</html>