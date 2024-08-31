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
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <!-- Leaflet CSS / JS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <style>
    #map {
      height: 600px;
      width: 100%;
    }
  </style>

  <style>
    .card-text {
      text-align: justify;
    }
  </style>
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

  <!-- Desarrollo -->
  <!-- Información sobre programas comunitarios -->
  <main class="container my-5">
    <h1 class="text-center mb-4">Programas Comunitarios de Reciclaje en Costa Rica</h1>
    <br>

    <section class="mb-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <br>
            <img src="../assets/images/AmbientaDOS.jpg" class="card-img-top" alt="AmbientaDOS">
            <div class="card-body">
              <h5 class="card-title">AmbientaDOS</h5>
              <br>
              <p class="card-text">AmbientaDOS es el programa de reciclaje y responsabilidad social que promueve una cultura del reciclaje en Costa Rica, declarado de interés nacional.</p>
            </div>
            <div class="card-body">
              <a href="https://www.facebook.com/AmbientaDos/?locale=es_LA" class="card-link">AmbientaDOS</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <br>
            <img src="../assets/images/Paisajes sin plastico.png" class="card-img-top" alt="Paisajes sin Plástico">
            <div class="card-body">
              <h5 class="card-title">Paisajes sin Plástico</h5>
              <br>
              <p class="card-text">Iniciativa que promueve el fortalecimiento de la economía circular y la generación de empleos formales en las municipalidades, organizaciones comunitarias, asociaciones de desarrollo, cooperativas y pequeños y medianos emprendimientos dedicados a la recuperación, valorización y reciclaje de los residuos plásticos.</p>
            </div>
            <div class="card-body">
              <a href="https://paisajesinplastico.cr/" class="card-link">Paisajes sin Plástico</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <br>
            <img src="../assets/images/Yo hago el cambio.png" class="card-img-top" alt="Yo hago el cambio">
            <div class="card-body">
              <h5 class="card-title">Yo hago el cambio</h5>
              <br>
              <p class="card-text">Promueven el cambio y la concientización socio-ambiental en Hoteles, Restaurantes y empresas en Costa Rica por medio de la ejecución de prácticas sostenibles, responsables y el servicio de reciclaje integral.</p>
            </div>
            <div class="card-body">
              <a href="https://www.yohagoelcambio.org/es-es/" class="card-link">Yo hago el cambio</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>

    <!-- Mapa de centros de reciclaje -->
    <br>
    <section class="mb-5">
      <h2>Mapa de Centros de Reciclaje</h2>
      <br>
      <div id="map"></div>
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

  <!-- Leaflet Map Script -->
  <script>
    var map = L.map('map').setView([9.7489, -83.7534], 9); // Coordenadas de Costa Rica

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([9.9185, -84.0348]).addTo(map)
      .bindPopup('Reciclaje Ipp')
      .openPopup();

    var marker = L.marker([9.955725903055319, -84.03145996294812]).addTo(map)
      .bindPopup('Recicladora Química S.A')
      .openPopup();

    var marker = L.marker([9.967587867250804, -84.21364098750287]).addTo(map)
      .bindPopup('Recicladora y Maquila HyO')
      .openPopup();

    var marker = L.marker([9.9680607353773, -84.22420620880756]).addTo(map)
      .bindPopup('Centro de Acopio San Rafael')
      .openPopup();

    var marker = L.marker([10.001158476370389, -84.16447579030088]).addTo(map)
      .bindPopup('Planta Reciclaje, Florida Bebidas')
      .openPopup();

    var marker = L.marker([9.985284290982898, -84.15107577965132]).addTo(map)
      .bindPopup('Recicla Costa Rica MN S.A.')
      .openPopup();

    var marker = L.marker([10.011840761810273, -84.10242320374859]).addTo(map)
      .bindPopup('Centro de acopio y reciclaje')
      .openPopup();

    var marker = L.marker([9.978348620664608, -84.0856045748214]).addTo(map)
      .bindPopup('Recicladora Eco-Logistica CR')
      .openPopup();

    var marker = L.marker([9.952565233196, -84.07830896600805]).addTo(map)
      .bindPopup('Centro de Acopio Tibás Recicla')
      .openPopup();

    var marker = L.marker([9.952987928079681, -84.05307474308684]).addTo(map)
      .bindPopup('Centro de recepcion de reciclaje PROGEA de Costa Rica')
      .openPopup();

    var marker = L.marker([9.95241330486598, -84.02913635632486]).addTo(map)
      .bindPopup('CCM Centro de Clasificación de Materiales')
      .openPopup();

    var marker = L.marker([9.984341846520778, -83.98443390832838]).addTo(map)
      .bindPopup('Reciclaje Alfaro')
      .openPopup();

    var marker = L.marker([9.920556522453488, -84.10459432071508]).addTo(map)
      .bindPopup('Centro de Reciclaje Municipalidad de San Jose')
      .openPopup();

    var marker = L.marker([9.982735156524399, -84.22532664272556]).addTo(map)
      .bindPopup('Reciclaje Valenciano')
      .openPopup();

    var marker = L.marker([10.094656301015542, -84.37315463422155]).addTo(map)
      .bindPopup('Reciclaje Arrieta')
      .openPopup();

    var marker = L.marker([9.884685364150329, -83.94159793242802]).addTo(map)
      .bindPopup('Recicladora Hernández Cartín')
      .openPopup();
  </script>

</body>

</html>