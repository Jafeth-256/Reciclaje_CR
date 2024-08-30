<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <title>Document</title>
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

     <!-- Desarrollo -->

     <main>
        <h1>Pagina en progreso</h1>
     </main>
     <footer class="bg-light text-center p-4">
        <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
      </footer>
  </body>
</html>
