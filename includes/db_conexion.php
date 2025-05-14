<?php
require_once __DIR__ . '/../config/db_confg.php';//include the configuration datebase(incluimos la confirguracion de la base de datos)


function obtenerConexion() {
    try {
        //creamos una nueva instancia  de PDO con la configuracion segura
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $opciones = [
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION, //modo de error: Excepeciones
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //modo de recuperacion : Asociativo
            PDO::ATTR_EMULATE_PREPARES=> false, //desactivar emulacion de preparacion
        ];

        return new PDO($dsn, DB_USER, DB_PASS, $opciones);

    } catch(PDOException $e) {
        //manejo de errores, mostrar mensaje y terminar la conexion
        die('❌Error connection.' .$e->getMessage());
    }
}
?>