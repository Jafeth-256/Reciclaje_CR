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
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            backToMenu: "Back to Main Menu"
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
            backToMenu: "Volver al Menú Principal"
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

      showSection("settings"); // Muestra la sección de configuración al cargar la página
    });
  </script>
  <title>Recycle Hub</title>
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

  <main>
    <section id="settings" class="container mt-5">
      <h2 class="settings-header">Configuración</h2>
      <form>
        <div class="mb-3">
          <label for="language" class="form-label">Preferencia de idioma</label>
          <select class="form-select" id="language">
            <option value="es" selected>Español</option>
            <option value="en">English</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="notifications" class="form-label">Habilitar notificaciones</label>
          <input type="checkbox" class="form-check-input" id="notifications">
        </div>
        <div class="mb-3">
          <label for="accessibility" class="form-label">Opciones de accesibilidad</label>
          <select class="form-select" id="accessibility">
            <option value="default" selected>Predeterminado</option>
            <option value="high-contrast">Alto contraste</option>
            <option value="large-font">Fuente grande</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar configuración</button>
        <button type="button" class="btn btn-secondary back-to-menu" onclick="location.href='index.html'">Volver al Menú Principal</button>
      </form>
    </section>

    <section id="home" class="w-100 vh-100 d-flex flex-column justify-content-center align-items-center fs-1" style="display:none;">
    </section>

    <section id="about" class="container mt-5" style="display:none;">
      <h2>Acerca de</h2>
      <p>Información sobre Recycle Hub.</p>
    </section>

    <section id="services" class="container mt-5" style="display:none;">
      <h2>Servicios</h2>
      <p>Descripción de los servicios ofrecidos por Recycle Hub.</p>
    </section>

    <section id="contact" class="container mt-5" style="display:none;">
      <h2>Contacto</h2>
      <p>Información de contacto de Recycle Hub.</p>
    </section>

    <section id="login" class="container mt-5" style="display:none;">
      <h2>Iniciar sesión</h2>
      <form>
        <div class="mb-3">
          <label for="loginEmail" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="loginEmail">
        </div>
        <div class="mb-3">
          <label for="loginPassword" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="loginPassword">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
      </form>
    </section>

    <section id="signup" class="container mt-5" style="display:none;">
      <h2>Registrarse</h2>
      <form>
        <div class="mb-3">
          <label for="signupName" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="signupName">
        </div>
        <div class="mb-3">
          <label for="signupEmail" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="signupEmail">
        </div>
        <div class="mb-3">
          <label for="signupPassword" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="signupPassword">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </form>
    </section>
  </main>
</body>
</html>

