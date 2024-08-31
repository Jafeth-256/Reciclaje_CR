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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
<link rel="stylesheet" href="../styles/main.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <!--Contenedor perfil-->
    <main class="container-fluid pt-4">
        <div class="row">
            <aside class="col-md-3 bd-aside">
                <div class="card mb-2 p-2">
                  <div class="card-header">Perfil de Usuario</div>
                  <div class="card-body">
                    <img src="https://via.placeholder.com/150" class="card-img" alt="Imagen de perfil">
                    
                    <p class="card-text">ID</p>
                    <p class="card-text">Nombre</p>
                    <p class="card-text">Apellido</p>
                    <p class="card-text">Correo</p>
                    <div class="card-footer">
                        <button 
                        class="btn btn-btn-outline-secondary btn-sm mt-2" 
                        data-toggle="modal" 
                        data-target="#editarPerfilModal">
                            <i class="fas fa-edit"></i> Editar perfil
                          </button>
                    </div>

                  </div>
                </div>
              </aside>
              <main class="col-md-8 bd-main order-1">
                
                <div id="contenido" class="row">
                    <h4>Historial Reciclaje</h4>
                    
                    <table class="table table-bordered mr-2">
                        <thead>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha de puclicación</th>
                        </thead>
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>

                    </table>    
                </div>   
              </main>
        </div>
    </main>
</body>

<!--modal boostrap-->
<div class="modal fade" id="editarPerfilModal" tabindex="-1" aria-labelledby="editarPerfilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarPerfilModalLabel">Editar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" value="ID del usuario" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="Nombre del usuario">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" value="Apellido del usuario">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" value="Correo del usuario">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen de perfil</label>
                        <input type="file" class="form-control" id="imagen">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Inicio de Sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Inicio de Sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo</label>
              <input type="email" class="form-control" id="correo" placeholder="Correo">
            </div>
            <div class="mb-3">
              <label for="contraseña" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Crear Usuario -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Crear Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellido" placeholder="Apellido">
              </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo</label>
              <input type="email" class="form-control" id="correo" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="contraseña" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
            </div>
            <div class="mb-3">
              <label for="confirm-contraseña" class="form-label">Confirmar Contraseña</label>
              <input type="password" class="form-control" id="confirm-contraseña" placeholder="Confirmar contraseña">
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <br>

  <footer class="bg-light text-center p-4">
    <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
  </footer>

  // Abrir modal de inicio de sesión
document.getElementById('login').addEventListener('click', function() {
  $('#loginModal').modal('show');
});

// Abrir modal de crear usuario
document.getElementById('signup').addEventListener('click', function() {
  $('#signupModal').modal('show');
});




</html>