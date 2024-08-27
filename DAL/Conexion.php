<?php
 
function Conecta()
{
    // Parámetros de conexión a MySQL
    $host = "localhost";  // El hostname de tu servidor MySQL (en este caso, localhost)
    $port = "33066";       // El puerto de MySQL, por defecto es 3306
    $dbname = "APPWEB";  // Nombre de la base de datos en MySQL
    $user = "root";   // Usuario de MySQL
    $password = "123456";  // Contraseña del usuario de MySQL
 
    // Cadena de conexión para MySQL
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
 
    try {
        // Crear una instancia de PDO para la conexión a MySQL
        $conexion = new PDO($dsn, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexión establecida con éxito."; // Mensaje opcional para verificar la conexión
    } catch (PDOException $e) {
        // Manejo de errores en la conexión
        echo "Ocurrió un problema al establecer la conexión: " . $e->getMessage();
    }
 
    return $conexion;
}
 
function Desconectar($conexion)
{
    // Cerrar la conexión
    $conexion = null;
}
 
?>
