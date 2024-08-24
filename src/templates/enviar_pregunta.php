<?php
// Definir variables y inicializar con valores vacíos
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

// Procesar datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Verificar si no hay errores antes de enviar el correo
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        // Enviar correo (configura el servidor de correo para enviar el mensaje)
        $to = "tu-email@dominio.com"; // Cambia esto por tu dirección de correo
        $subject = "Nuevo mensaje de contacto";
        $email_body = "Nombre: $name\nCorreo Electrónico: $email\nMensaje:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $email_body, $headers)) {
            echo "<p class='alert alert-success'>La información se ha enviado correctamente.</p>";
        } else {
            echo "<p class='alert alert-danger'>Hubo un problema al enviar la información. Inténtelo de nuevo más tarde.</p>";
        }
    } else {
        echo "<p class='alert alert-danger'>Por favor, complete el formulario correctamente.</p>";
    }
}
?>
