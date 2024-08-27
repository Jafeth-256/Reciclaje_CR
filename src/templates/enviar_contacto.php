<?php
include '../../DAL/Conexion.php';
 
// Definir variables y inicializar con valores vacíos
$name = $email = $message = $cod_as = "";
$name_err = $email_err = $message_err = $cod_as_err = "";
 
// Procesar datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar código de asistencia (cod_as)
    if (empty(trim($_POST["cod_as"]))) {
        $cod_as_err = "Por favor, seleccione un código de asistencia.";
    } else {
        $cod_as = trim($_POST["cod_as"]);
    }
 
    // Validar nombre
    if (empty(trim($_POST["name"]))) {
        $name_err = "Por favor, ingrese su nombre.";
    } else {
        $name = trim($_POST["name"]);
    }
 
    // Validar correo electrónico
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor, ingrese su correo electrónico.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "El correo electrónico ingresado no es válido.";
    } else {
        $email = trim($_POST["email"]);
    }
 
    // Validar mensaje
    if (empty(trim($_POST["message"]))) {
        $message_err = "Por favor, ingrese su mensaje.";
    } else {
        $message = trim($_POST["message"]);
    }
 
    // Verificar si no hay errores antes de insertar en la base de datos
    if (empty($cod_as_err) && empty($name_err) && empty($email_err) && empty($message_err)) {
        $conexion = Conecta();
 
        try {
            // Preparar la consulta de inserción
            $sql = "INSERT INTO TAB_FORMULARIO_CONTACTO (cod_as, nombre, correo, mensaje) VALUES (:cod_as, :name, :email, :message)";
            $stmt = $conexion->prepare($sql);
 
            // Asignar parámetros
            $stmt->bindParam(':cod_as', $cod_as, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);
 
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<p class='alert alert-success'>La información se ha enviado correctamente.</p>";
            } else {
                echo "<p class='alert alert-danger'>Hubo un problema al enviar la información. Inténtelo de nuevo más tarde.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='alert alert-danger'>Error: " . $e->getMessage() . "</p>";
        } finally {
            Desconectar($conexion);
        }
    } else {
        echo "<p class='alert alert-danger'>Por favor, complete el formulario correctamente.</p>";
    }
}
?>
