<?php

function conectar($opcion = 'login_system')
{
    // Configuración de conexión para la base de datos APPWEB
    $config1 = [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'APPWEB',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ];

    // Configuración de conexión para la base de datos login_system
    $config2 = [
        'host' => 'localhost',
        'dbname' => 'login_system',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ];

    $config = ($opcion === 'APPWEB') ? $config1 : $config2;

    $dsn = "mysql:host={$config['host']};" . (isset($config['port']) ? "port={$config['port']};" : "") . "dbname={$config['dbname']};charset={$config['charset']}";

    try {
        $conexion = new PDO($dsn, $config['user'], $config['password']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Ocurrió un problema al establecer la conexión: " . $e->getMessage();
        exit();
    }

    return $conexion;
}

function desconectar($conexion)
{
    $conexion = null;
}

?>
