<?php
include '../../DAL/Conexion.php';

// Definir variables y inicializar con valores vacíos
$titulo = $linea1 = $linea2 = $respuesta1 = $respuesta2 = "";
$titulo_err = $linea1_err = $linea2_err = $respuesta1_err = $respuesta2_err = "";

// Procesar datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar los campos del formulario
    if (empty(trim($_POST["titulo"]))) {
        $titulo_err = "Por favor, ingrese un título.";
    } else {
        $titulo = trim($_POST["titulo"]);
    }

    if (empty(trim($_POST["linea1"]))) {
        $linea1_err = "Por favor, ingrese la primera línea de la pregunta.";
    } else {
        $linea1 = trim($_POST["linea1"]);
    }

    if (empty(trim($_POST["linea2"]))) {
        $linea2_err = "Por favor, ingrese la segunda línea de la pregunta.";
    } else {
        $linea2 = trim($_POST["linea2"]);
    }

    if (empty(trim($_POST["respuesta1"]))) {
        $respuesta1_err = "Por favor, ingrese la primera respuesta.";
    } else {
        $respuesta1 = trim($_POST["respuesta1"]);
    }

    if (empty(trim($_POST["respuesta2"]))) {
        $respuesta2_err = "Por favor, ingrese la segunda respuesta.";
    } else {
        $respuesta2 = trim($_POST["respuesta2"]);
    }

    // Verificar si no hay errores antes de insertar en la base de datos
    if (empty($titulo_err) && empty($linea1_err) && empty($linea2_err) && empty($respuesta1_err) && empty($respuesta2_err)) {
        $conexion = Conecta();

        try {
            // Preparar la consulta de inserción
            $sql = "INSERT INTO TAB_preguntas_frecuentes (titulo, linea1, linea2, respuesta1, respuesta2) VALUES (:titulo, :linea1, :linea2, :respuesta1, :respuesta2)";
            $stmt = $conexion->prepare($sql);

            // Asignar parámetros
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':linea1', $linea1, PDO::PARAM_STR);
            $stmt->bindParam(':linea2', $linea2, PDO::PARAM_STR);
            $stmt->bindParam(':respuesta1', $respuesta1, PDO::PARAM_STR);
            $stmt->bindParam(':respuesta2', $respuesta2, PDO::PARAM_STR);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir a la página de éxito
                header("Location: preguntasf.php"); // Reemplaza 'pagina_exito.php' con la URL a la que deseas redirigir
                exit();
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
