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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Recycle Hub</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/informacion.css">
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

    <main class="container mt-4">
        <!-- Información sobre reciclaje -->
        <section id="recycling-info">

            <!-- Consejos prácticos para el reciclaje -->
             <br>
             <div style="margin-top: 45px; margin-bottom: 75px; margin-left: 40px;" class="text-center">
             <h2>
              <span class="highlighted"><b> Recicla </b></span><span class="normal"> <b> Correctamente Con Nosotros! </b></span>
             </h2>
            </div>
            <div class="containimage">
              <div class="textblock">
                <h1 class="title">Consejos Para Aprender a reciclar</h1>
                <p>
                 1. Al momento de realizar tus comprar escoge el producto con menor envase o envases que puedas reciclar.<br>
                 2. Separa la basura orgánica de los envases. <br>
                 3. Separa los envases dependiendo de su material: plásticos, vidrio, aluminio o metal. <br>
                 4. Los desechos orgánicos puedes reciclarlos, si tienes, en tu propia compostera para tus plantas. <br>
                 5. Reutiliza las bolsas de plástico, estas pueden usarse una y otra vez para cargar tus comprar en el mercado y cuando ya no te sirvan las llevas al contenedor amarillo. <br> </p>
              </div>
              <div>
              <img width="610" height="470" src="../assets/images/pexels-readymade-3850587.jpg" alt="">
            </div>
            </div>
            <br>
            <br>

            <!-- Guías de manejo de materiales -->
            <div class="mb-4" style="margin-top: 40px;">
                <h2 class="mb-3 text-center">Guías de Manejo de Materiales</h2>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="../assets/images/plastico.png" class="card-img-top mx-auto mt-3" alt="Plástico" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">Plástico</h5>
                                <p class="card-text">El plástico está presente en innumerables productos, desde los envases y bandejas para alimentos, hasta envases para detergentes, productos de higiene, muebles, bolsas, envoltorios,…</p>
                            </div>
                            <div class="card-footer">
                                <a href="#guide-plastic" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="../assets/images/botella-de-vidrio.png" class="card-img-top mx-auto mt-3" alt="Vidrio" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">Vidrio</h5>
                                <p class="card-text">Un material que puede ser reciclado siempre y sin que pierda sus propiedades. Puede ser fundido y convertido en nuevos envases de vidrio, botellas, …</p>
                            </div>
                            <div class="card-footer">
                                <a href="#guide-glass" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="../assets/images/pila-de-papeleria.png" class="card-img-top mx-auto mt-3" alt="Papel y Cartón" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">Papel y Cartón</h5>
                                <p class="card-text">Un material altamente reciclaje y muy utilizado, se recicla en nuevos materiales. Esta en cajas de cartón, papel en las oficinas, periódicos, revistas,…</p>
                            </div>
                            <div class="card-footer">
                                <a href="#guide-paper" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="../assets/images/chatarra.png" class="card-img-top mx-auto mt-3" alt="Metales" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">Metales</h5>
                                <p class="card-text">Los metales son altamente reciclajes y tienen gran valor porque no pierden propiedades. Su reciclaje permite la fabricación de latas, utensilios de cocina, electrodomésticos,…</p>
                            </div>
                            <div class="card-footer">
                                <a href="#guide-metal" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="../assets/images/tablero.png" class="card-img-top mx-auto mt-3" alt="Metales" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">Madera</h5>
                                <p class="card-text">La madera es otro material que puede ser reciclado si se separa correctamente. Se puede usar para fabricar nuevos productos como muebles de madera reciclada,…</p>
                            </div>
                            <div class="card-footer">
                                <a href="#guide-metal" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="../assets/images/bateria.png" class="card-img-top mx-auto mt-3" alt="Metales" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">Productos Electronicos</h5>
                                <p class="card-text">Tienen muchos componentes que pueden ser reciclados y valorizados para nuevos productos. Pueden ser reciclados en nuevos teléfonos móviles, impresoras, ordenadores,…</p>
                            </div>
                            <div class="card-footer">
                                <a href="#guide-metal" class="btn btn-outline-secondary">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- Recursos visuales sobre reciclaje -->
            <div class="mb-4" style="margin-top: 50px;">
                <h3 class="mb-3">Aprende a Reciclar con Nosotros!</h3>
            </div>
            <br>
            <br>
            <div class="text-center" style="margin-bottom: 120px;">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/0i99_Lkvjm0?si=ItMK7dSUYLgYxbyU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>
    </main>
    <footer class="bg-light text-center p-4">
      <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

