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
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- SideBar-->
      <div
        class="sidebar offcanvas offcanvas-start"
        tabindex="-1"
        id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel"
      >
        <!-- SideBar Header-->
        <div class="offcanvas-header text-black border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            Recycle Hub
          </h5>
          <button
            type="button"
            class="btn-close btn-close-dark"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
          ></button>
        </div>
        <!-- SideBar Body-->
        <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
          <ul
            class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3"
          >
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="index.php"
                >Inicio</a
              >
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
          <!-- Login / Sign up -->
          <div
            class="d-flex flex-column flex-lg-row align-items-center gap-3"
          >
            <a
              href="#signup"
              class="text-white text-decoration-none px-3 py-1 rounded-4"
              style="background-color: #3c5441"
              >Iniciar Sesión</a
            >
          </div>
        </div>
      </div>
    </div>
  </nav>
<!-- Carousel -->
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button
      type="button"
      data-bs-target="#hero-carousel"
      data-bs-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img
        src="https://cdn.pixabay.com/photo/2019/11/18/08/21/bonsai-4634225_1280.jpg"
        class="d-block w-100 c-img"
        alt="Slide 1"
      />
      <div class="carousel-caption top-0 mt-4">
        <p class="mt-5 fs-3 text-uppercase">Preguntas Frecuentes con</p>
        <p class="display-1 fw-bolder text-capitalize">Recycle Hub</p>
      </div>
    </div>
    </div>

  <main class="container mt-4">
    
    <section id="home">
      <h1 class="text-center">Welcome to Recycle Hub</h1>
    </section>

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
        Si deseas agregar tu pregunta puedes realizarla mediante el siguiente link: <a href="preguntasf.html">Ir a Perfil</a>
      </div>
    </section>

    <section id="contact" class="container mt-5">
      <h2 class="contact-header">Crea tu pregunta</h2>
      <form action="enviar_pregunta.php" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="email" name="email" required />
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Mensaje</label>
          <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </section>

  <center> <button type="button" class="btn btn-secondary back-to-menu" onclick="location.href='index.html'">Volver al Menú Principal</button>  </center>
  </main>

  <footer class="bg-light text-center p-4">
    <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
  </footer>
</body>
</html>