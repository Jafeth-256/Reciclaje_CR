<?php
include '../../DAL/Conexion.php';

$error = ''; 
$nombre_usuario = '';

session_start();

$pdo = conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
    $stmt->execute([$nombre_usuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['nombre_usuario'] = $nombre_usuario; 
        header("Location: index.php"); 
        exit(); 
    } else {
        $error = "Nombre de usuario o contraseña incorrectos"; 
    }
}

desconectar($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" value="<?php echo htmlspecialchars($nombre_usuario); ?>" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <p class="message">¿No estás registrado? <a href="registro.php">Crear una cuenta</a></p>
    </div>
</body>
</html>