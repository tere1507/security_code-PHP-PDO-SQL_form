<?php
//procesa login
session_start(); //login 

require_once 'includes/db_conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if(empty($usuario) || empty($clave)) {
        $_SESSION['error'] = "⚠️ Required user and password";
        header('Location: login.php');
        exit;
    }

    //obtenemos la conexion segura
    $conn = obtenerConexion();
    //preparamos la conexion segura
    $stmt = $conn->prepare("SELECT idusuario, clave FROM usuarios WHERE usuario = :usuario");
    //ejecutamos la conexion
    $stmt->execute(['usuario' => $usuario]);

    if($row = $stmt->fetch()) {
        if(password_verify($clave, $row['clave'])) {
            $_SESSION['idusuario'] = $row['idusuario'];
            $_SESSION['usuario'] = $usuario;
            header('Location: home.php');
            exit;
        } else {
            $_SESSION['error'] = "❌Incorrect Passoword";
        }
    } else {
        $_SESSION['error'] = "😓 User not found";
    }
    header('Location: login.php');
    exit;
}
?>