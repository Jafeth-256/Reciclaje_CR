<?php

// Función para conectar a la base de datos login_system
function conectar()
{
    // Configuración de conexión para la base de datos login_system
    $config = [
        'host' => 'localhost',
        'dbname' => 'login_system',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ];

    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

    try {
        $conexion = new PDO($dsn, $config['user'], $config['password']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Ocurrió un problema al establecer la conexión con login_system: " . $e->getMessage();
        exit();
    }

    return $conexion;
}

// Función para conectar a la base de datos APPWEB
function Conecta()
{
    // Configuración de conexión para la base de datos APPWEB
    $config = [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'APPWEB',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ];

    $dsn = "mysql:host={$config['host']};" . (isset($config['port']) ? "port={$config['port']};" : "") . "dbname={$config['dbname']};charset={$config['charset']}";

    try {
        $conexion = new PDO($dsn, $config['user'], $config['password']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Ocurrió un problema al establecer la conexión con APPWEB: " . $e->getMessage();
        exit();
    }

    return $conexion;
}

// Función para desconectar la base de datos
function desconectar($conexion)
{
    $conexion = null;
}

?>
