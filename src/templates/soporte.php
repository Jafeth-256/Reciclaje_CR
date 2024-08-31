<?php
session_start();
$usuario_logueado = isset($_SESSION['nombre_usuario']);
$nombre_usuario = $usuario_logueado ? $_SESSION['nombre_usuario'] : '';

// Función para cerrar sesión
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}

include '../../DAL/Conexion.php';
 
// Definir variables y inicializar con valores vacíos
$name = $email = $message = $cod_as = "";
$name_err = $email_err = $message_err = $cod_as_err = "";
 
// Procesar datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar código de asistencia (cod_as)
    if (empty(trim($_POST["cod_as"]))) {
        $cod_as_err = "Por favor, seleccione una opción.";
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

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/main.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden; /* Asegura que no haya scroll horizontal */
    }
    main {
      min-height: 100vh; /* Asegura que el contenido mínimo ocupe toda la altura de la vista */
      padding: 20px;
    }
    .faq, .more-info {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .faq .question {
      color: #007bff;
      font-weight: bold;
    }
    .faq .answer {
      margin-top: 10px;
      line-height: 1.6;
    }
    .more-info {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
    }
    .more-info p {
      line-height: 1.6;
    }
    .more-info-header {
      color: rgba(90, 190, 40, 1);
      margin-bottom: 20px;
      font-weight: bold;
    }
    .btn-outline-primary {
      color: rgba(90, 190, 40, 1);
      border-color: rgba(90, 190, 40, 1);
    }
    .btn-outline-primary:hover {
      background-color: rgba(90, 190, 40, 0.1);
    }
    section {
      padding: 20px;
      margin-bottom: 20px;
    }
    #home {
      display: none; /* Ocultar la sección de inicio por defecto */
    }
    /* Carrusel */
  .c-item {
   height: 50rem;
  }

  .c-img {
  height: 100%;
  object-fit: cover;
  filter: brightness(0.6);
  }

  .btn-green {
  background-color: #3c5441; 
  color: white; 
  border: none; 
  transition: background-color 0.3s ease; 
  }

  .btn-green:hover {
  background-color: #3c5441; 
  }

  .accordion-body {
      text-align: justify;
    }

  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const languageSelector = document.getElementById("language");
      const sections = document.querySelectorAll("section");

      languageSelector.addEventListener("change", function() {
        const lang = languageSelector.value;
        document.documentElement.lang = lang;
        changeLanguage(lang);
      });

      function changeLanguage(lang) {
        const texts = {
          en: {
            home: "Home",
            about: "About",
            services: "Services",
            contact: "Contact",
            settings: "Settings",
            login: "Login",
            signup: "Sign Up",
            settingsHeader: "Settings",
            languagePreference: "Language Preference",
            enableNotifications: "Enable Notifications",
            accessibilityOptions: "Accessibility Options",
            default: "Default",
            highContrast: "High Contrast",
            largeFont: "Large Font",
            saveSettings: "Save Settings",
            backToMenu: "Back to Main Menu",
            faq: "Frequently Asked Questions",
            contactForm: "Contact Form",
            moreInfo: "More Information"
          },
          es: {
            home: "Inicio",
            about: "Acerca de",
            services: "Servicios",
            contact: "Contacto",
            settings: "Configuración",
            login: "Iniciar sesión",
            signup: "Registrarse",
            settingsHeader: "Configuración",
            languagePreference: "Preferencia de idioma",
            enableNotifications: "Habilitar notificaciones",
            accessibilityOptions: "Opciones de accesibilidad",
            default: "Predeterminado",
            highContrast: "Alto contraste",
            largeFont: "Fuente grande",
            saveSettings: "Guardar configuración",
            backToMenu: "Volver al Menú Principal",
            faq: "Preguntas Frecuentes",
            contactForm: "Formulario de Contacto",
            moreInfo: "Más Información"
          }
        };

        document.querySelector(".nav-link.home").textContent = texts[lang].home;
        document.querySelector(".nav-link.about").textContent = texts[lang].about;
        document.querySelector(".nav-link.services").textContent = texts[lang].services;
        document.querySelector(".nav-link.contact").textContent = texts[lang].contact;
        document.querySelector(".nav-link.settings").textContent = texts[lang].settings;
        document.querySelector("a.login").textContent = texts[lang].login;
        document.querySelector("a.signup").textContent = texts[lang].signup;
        document.querySelector("h2.settings-header").textContent = texts[lang].settingsHeader;
        document.querySelector("label[for='language']").textContent = texts[lang].languagePreference;
        document.querySelector("label[for='notifications']").textContent = texts[lang].enableNotifications;
        document.querySelector("label[for='accessibility']").textContent = texts[lang].accessibilityOptions;
        document.querySelector("#accessibility option[value='default']").textContent = texts[lang].default;
        document.querySelector("#accessibility option[value='high-contrast']").textContent = texts[lang].highContrast;
        document.querySelector("#accessibility option[value='large-font']").textContent = texts[lang].largeFont;
        document.querySelector("button[type='submit']").textContent = texts[lang].saveSettings;
        document.querySelector("button.back-to-menu").textContent = texts[lang].backToMenu;
        document.querySelector("h2.faq-header").textContent = texts[lang].faq;
        document.querySelector("h2.contact-header").textContent = texts[lang].contactForm;
        document.querySelector("h2.more-info-header").textContent = texts[lang].moreInfo;
      }

      function showSection(id) {
        sections.forEach(section => {
          if (section.id === id) {
            section.style.display = "block";
          } else {
            section.style.display = "none";
          }
        });
      }

      document.querySelectorAll(".nav-link").forEach(link => {
        link.addEventListener("click", function() {
          const targetId = this.getAttribute("href").substring(1);
          showSection(targetId);
        });
      });

      document.querySelector(".back-to-menu").addEventListener("click", function() {
        showSection("home");
      });

      showSection("faq"); // Muestra la sección de Preguntas Frecuentes al cargar la página
    });
  </script>
  <title>Recycle Hub - Help & Support</title>
</head>
<body>
  <link rel="stylesheet" href="../styles/main.css" />
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <!-- Logo-->
      <a class="navbar-brand fs-4" href="#">Recycle Hub</a>
      <!-- Toggle Btn-->
      <button
        class="navbar-toggler shadow-none border-0"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- SideBar-->
      <div
        class="sidebar offcanvas offcanvas-start"
        tabindex="-1"
        id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <!-- SideBar Header-->
        <div class="offcanvas-header text-black border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            Recycle Hub
          </h5>
          <button
            type="button"
            class="btn-close btn-close-dark"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <!-- SideBar Body-->
        <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
          <ul
            class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="informacion.php">Información</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="comunidad.php">Comunidad</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="configuracion.php">Configuración</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="soporte.php">Soporte</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="perfil.php">Perfil</a>
            </li>
          </ul>
          <!-- Login / Logout -->
          <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
            <?php if ($usuario_logueado): ?>
              <span class="nav-link fs-5 text-dark mx-2" style="background-color: transparent; border: none;">
                Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?>
              </span>
              <form method="post" action="">
                <button type="submit" name="logout" class="nav-link text-white text-decoration-none px-3 py-1 rounded-4" style="background-color: #3c5441">
                  Cerrar Sesión
                </button>
              </form>
            <?php else: ?>
              <a href="login.php" class="nav-link text-white text-decoration-none px-3 py-1 rounded-4" style="background-color: #3c5441">
                Iniciar Sesión
              </a>
            <?php endif; ?>
          </div>


        </div>
      </div>
    </div>
  </nav>


<!-- Título -->
  <div class="text-center mt-4">
    <p class="mt-5 fs-3 text-uppercase">Ayuda y soporte con</p>
    <p class="display-1 fw-bolder text-capitalize">Recycle Hub</p>
  </div>

  <main class="container mt-4">
    <!-- Sección de Inicio -->

    <section id="home">
      <h1 class="text-center">Welcome to Recycle Hub</h1>
    </section>

    <!-- Sección de Preguntas Frecuentes -->
    <section id="faq" class="container mt-5">
      <h2 class="faq-header">Preguntas Frecuentes</h2>
      <div class="faq p-4">
        <div class="question">¿Cómo puedo reciclar correctamente?</div>
        <div class="answer">
          Para reciclar correctamente, asegúrate de separar los materiales reciclables de los no reciclables. Consulta las pautas locales para conocer qué materiales se aceptan y cómo deben prepararse.
        </div>
        <div class="question">¿Dónde puedo encontrar puntos de reciclaje cerca de mí?</div>
        <div class="answer">
          Puedes encontrar puntos de reciclaje cercanos en nuestro sitio web en la sección de "Puntos de Reciclaje" o contactar con tu ayuntamiento local para obtener más información.
        </div>
        Si deseas agregar tu pregunta puedes realizarla mediante el siguiente link: <a href="preguntasf.php">Ir a Preguntas</a>
      </div>
    </section>
  

    <!-- Sección de Contacto -->

    <section id="more-info" class="more-info">
      <h2 class="more-info-header">Consultas del público </h2>
      <p>En esta sección, encontrarás una forma de hacer consultas de todo tipo.</p>
    </section>
<form action="enviar_contacto.php" method="post">
<div class="form-group">
<label for="cod_as">Seleccione una opción:</label>
<select id="cod_as" name="cod_as" class="form-control">
<option value="PF">Preguntas Frecuentes</option>
<option value="FC">Formulario de Contacto</option>
<option value="ES">Enlaces Adicionales</option>
</select>
<span class="text-danger"><?php echo $cod_as_err; ?></span>
</div>
<div class="form-group">
<label for="name">Nombre:</label>
<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
<span class="text-danger"><?php echo $name_err; ?></span>
</div>
<div class="form-group">
<label for="email">Correo electrónico:</label>
<input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
<span class="text-danger"><?php echo $email_err; ?></span>
</div>
<div class="form-group">
<label for="message">Mensaje:</label>
<textarea id="message" name="message" class="form-control"><?php echo $message; ?></textarea>
<span class="text-danger"><?php echo $message_err; ?></span>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>

 
    <!-- Sección de Más Información -->
    <section id="more-info" class="container mt-5">
      <h2 class="more-info-header">Más Información</h2>
      <div class="more-info p-4">
        <p>Para obtener más información sobre nuestros servicios, políticas y otros temas, puedes visitar nuestras secciones específicas en el sitio web o contactarnos directamente.</p>

          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Servicios
            </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
            <strong></strong> Las empresas de recolección de basura y reciclaje ofrecen una amplia gama de servicios para gestionar los residuos de manera eficiente y sostenible. Entre estos servicios se incluyen la recolección de residuos sólidos, tanto domésticos como comerciales e industriales, asegurando el manejo adecuado de desechos generales y específicos. Además, brindan servicios de recolección de materiales reciclables, como papel, cartón, plásticos, vidrio y metales, promoviendo la reutilización y el reciclaje de estos materiales. También se ocupan del compostaje de residuos orgánicos, convirtiendo restos de alimentos y otros desechos biodegradables en compost para fertilizar suelos.En cuanto a los residuos peligrosos, estas empresas gestionan de manera especializada productos químicos, electrónicos, neumáticos y baterías, garantizando su disposición segura y adecuada. Ofrecen servicios de reciclaje especializado y gestión de residuos voluminosos, como muebles y electrodomésticos, así como de residuos de construcción y demolición. Además, proporcionan asesoría y consultoría en la gestión de residuos, educación y capacitación sobre prácticas de reciclaje, y servicios de recogida programada para adaptar la recolección a las necesidades específicas de cada cliente. Estos servicios no solo contribuyen a la limpieza y el orden en las comunidades y empresas, sino que también fomentan prácticas ambientales responsables y sostenibles.
            </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Políticas
            </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
            <strong></strong> 
            Las políticas de una empresa de recolección de basura y reciclaje son fundamentales para garantizar la eficiencia en la gestión de residuos y el cumplimiento con las normativas ambientales y de salud pública. Estas políticas establecen procedimientos claros para la segregación y reciclaje de residuos, promoviendo la separación adecuada de materiales reciclables, orgánicos y no reciclables. Se definen horarios y rutas de recolección precisos para asegurar un servicio puntual y regular, y se establecen normas rigurosas para el manejo seguro de los residuos, protegiendo tanto a los empleados como al público. Además, se asegura el cumplimiento de todas las leyes y regulaciones locales, regionales y nacionales relacionadas con la gestión de residuos. La empresa fomenta prácticas ambientales sostenibles, como la reducción de residuos en la fuente y la minimización del impacto ambiental, y promueve la educación y la conciencia entre los clientes mediante programas informativos y campañas de sensibilización. También se implementan mecanismos para la revisión y mejora continua de los procesos, asegurando la eficacia y la adaptación a nuevas necesidades. Por último, se establecen procedimientos específicos para el manejo de residuos especiales, como los peligrosos, electrónicos y voluminosos, garantizando su disposición adecuada según las normativas especializadas.
            </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Contacto
            </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
            <strong></strong> Si se desea ingresar al contacto se puede realizar mediante el siguiente link: <a href="perfil.php">Ir a Perfil</a>
            </div>
            </div>
            </div>
            </div>
        </div>
      </div>
    </section>
  <center> <button type="button" class="btn btn-secondary back-to-menu" onclick="location.href='index.html'">Volver al Menú Principal</button>  </center>
  </main>

  <footer class="bg-light text-center p-4">
    <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
  </footer>
</body>
</html>