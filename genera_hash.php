<?php
//generamos una clave hash

$clave_plana = 'terJan';//cuando queramos generar nueva clave hash cambiamos aqui esta clave por la que querramos vamos al navegador y la ejecuatmos alli nos genera nuevo has de la nueva clave y la copiamos en nuestra base de datos en el usuario
$hash = password_hash($clave_plana, PASSWORD_DEFAULT);
echo "Clave: $clave_plana <br>";
echo "Has generado el Hash : $hash";
?>