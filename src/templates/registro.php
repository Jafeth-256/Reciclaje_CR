<?php
include '../../DAL/Conexion.php';

$error = '';
$exito = '';

$pdo = conectar('login_system');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    if ($contrasena !== $confirmar_contrasena) {
        $error = "Las contraseñas no coinciden";
    } else {
        // Verificar si el nombre de usuario o el correo ya existen
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ? OR email = ?");
        $stmt->execute([$nombre_usuario, $email]);

        if ($stmt->rowCount() > 0) {
            $error = "El nombre de usuario o el correo electrónico ya existe";
        } else {
            $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO usuarios (first_name, last_name, email, nombre_usuario, contrasena) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$first_name, $last_name, $email, $nombre_usuario, $contrasena_hash])) {
                $exito = "Registro exitoso. Ahora puedes iniciar sesión.";
            } else {
                $error = "Ocurrió un error. Por favor, intenta de nuevo.";
            }
        }
    }
    
    desconectar($pdo);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <?php if ($exito): ?>
            <p class="success"><?php echo htmlspecialchars($exito, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="first_name" placeholder="Nombre" required>
            <input type="text" name="last_name" placeholder="Apellido" required>
            <input type="text" name="email" placeholder="Correo Electrónico" required>
            <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="password" name="confirmar_contrasena" placeholder="Confirmar Contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
        <p class="message">¿Ya estás registrado? <a href="login.php">Iniciar Sesión</a></p>
    </div>
</body>
</html>
