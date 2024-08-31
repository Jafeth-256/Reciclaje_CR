<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <title>Comunidad</title>
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
          <!-- Login / Sign up -->
          <div
            class="d-flex flex-column flex-lg-row align-items-center gap-3">
            <a
              href="#signup"
              class="text-white text-decoration-none px-3 py-1 rounded-4"
              style="background-color: #3c5441">Iniciar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Desarrollo -->
  <main class="container my-5">
    <h1 class="text-center mb-4">Programas Comunitarios de Reciclaje en Costa Rica</h1>

    <!-- Información sobre programas comunitarios -->
    <section class="mb-5">
      <h2>Programas Comunitarios</h2>
      <p>
        En Costa Rica, existen varios programas comunitarios que promueven el reciclaje y la sostenibilidad ambiental. Estos programas están diseñados para educar a la comunidad sobre la importancia del reciclaje y proporcionar recursos para facilitar el proceso.
      </p>
      <ul>
        <li><strong>AmbientaDOS:</strong> AmbientaDOS es el programa de reciclaje y responsabilidad social que promueve una cultura del reciclaje en Costa Rica, declarado de interés nacional. </li>
        <li><strong>Paisajes sin Plástico:</strong> Iniciativa que promueve el fortalecimiento de la economía circular y la generación de empleos formales en las municipalidades, organizaciones comunitarias, asociaciones de desarrollo, cooperativas y pequeños y medianos emprendimientos dedicados a la recuperación, valorización y reciclaje de los residuos plásticos.</li>
        <li><strong>Yo hago el cambio:</strong> Promueven el cambio y la concientización socio-ambiental en el Hoteles, Restaurantes y empresas en Costa Rica por medio de la ejecución de prácticas sostenibles, responsables y el servicio de reciclaje integral.</li>
      </ul>
    </section>

    <section class="mb-5">
      <h2>Programas Comunitarios</h2>
      <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
        </div>
      </div>
    </section>

    <!-- Mapa de centros de reciclaje -->
    <section class="mb-5">
      <h2>Centros de Reciclaje</h2>
      <div id="map" style="height: 400px;"></div>
    </section>

    <!-- Horarios de recolección -->
    <section>
      <h2>Horarios de Recolección de Reciclaje</h2>
      <p>Consulta los horarios de recolección de reciclaje en tu comunidad:</p>
      <ul>
        <li><strong>San José:</strong> Lunes y Jueves, 8:00 AM - 12:00 PM</li>
        <li><strong>Heredia:</strong> Martes y Viernes, 9:00 AM - 1:00 PM</li>
        <li><strong>Alajuela:</strong> Miércoles y Sábado, 7:00 AM - 11:00 AM</li>
      </ul>
    </section>
  </main>


  <footer class="bg-light text-center p-4">
    <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
  </footer>


</body>

</html>