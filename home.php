<?php
//pagina protegida
session_start();//login

//si no existe usuario dentro de la sesion entonces lanzamomos header
if(!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="home-container">
        <h2>🦄Welcome😘, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h2>
        <form action="logout.php" method="post">
            <button type="submit"><a href="buscar_libro.php">Librery😍</a></button><!--conectamos con libreria-->
            <button type="submit">Logout🤗</button>
        </form>
    </div>
</body>
</html>