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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Registro</h2>
                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($exito): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlspecialchars($exito, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Apellido</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de Usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmar_contrasena">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirmar Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </form>
                        <p class="text-center mt-3">¿Ya estás registrado? <a href="login.php">Iniciar Sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
