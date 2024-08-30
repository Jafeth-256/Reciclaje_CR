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
        <button
          type="button"
          data-bs-target="#hero-carousel"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#hero-carousel"
          data-bs-slide-to="2"
          aria-label="Slide 3"
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
            <p class="mt-5 fs-3 text-uppercase">Aprende a reciclar con</p>
            <p class="display-1 fw-bolder text-capitalize">Recycle Hub</p>
          </div>
        </div>
        <div class="carousel-item c-item">
          <img
            src="https://cdn.pixabay.com/photo/2016/11/22/21/32/forest-1850640_1280.jpg"
            class="d-block w-100 c-img"
            alt="Slide 2"
          />
          <div class="carousel-caption top-0 mt-4">
            <p class="text-uppercase fs-3 mt-5">
              Encuentraras la información mas relevante acerca el reciclaje
            </p>
            <p class="display-1 fw-bolder">Conoce el Reciclaje</p>
            <button class="btn btn-green px-4 py-2 fs-5 mt-5">
              Más Información
            </button>
          </div>
        </div>
        <div class="carousel-item c-item">
          <img
            src="https://cdn.pixabay.com/photo/2024/04/03/05/52/ai-generated-8672132_1280.jpg"
            class="d-block w-100 c-img"
            alt="Slide 3"
          />
          <div class="carousel-caption top-0 mt-4">
            <p class="text-uppercase fs-3 mt-5">
              Aprende Más Sobre Nuestra Comunidad
            </p>
            <p class="display-1 fw-bolder">Únete a Nosotros</p>
            <button class="btn btn-green px-4 py-2 fs-5 mt-5">
              Más Información
            </button>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#hero-carousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#hero-carousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Cards de los goals -->

    <div class="container py-5 cards-background">
      <h1 class="Objetivos">Objetivos Principales</h1>
      <div class="row justify-content-center">
        <div class="col-12 col-lg-4">
          <div class="card mx-auto my-5">
            <img
              src="../assets/images/reducir.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Reducir</h5>
              <hr />
              <p class="card-text">
                Minimizar el uso de productos innecesarios y optar por opciones
                con menos embalaje para disminuir significativamente la cantidad
                de residuos generados diariamente para asi tener un planeta mas
                limpio.
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card mx-auto my-5">
            <img
              src="../assets/images/reciclar.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Reciclar</h5>
              <hr />
              <p class="card-text">
                Dar una segunda vida a los objetos y materiales, encontrando
                nuevas maneras de utilizarlos, para evitar desecharlos y reducir
                la demanda de nuevos productos en el mercado.
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card mx-auto my-5">
            <img
              src="../assets/images/Reutilizar.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Reutilizar</h5>
              <hr />
              <p class="card-text">
                Transformar materiales usados en nuevos productos a través de
                procesos industriales y manuales, conservando así recursos
                naturales y disminuyendo la contaminación ambiental.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Feedback  -->

    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Dirección</div>
            <div class="text-one">Aserri, Calle 19</div>
            <div class="text-two">San Jose, Costa Rica</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Teléfono</div>
            <div class="text-one">+506 1111 1111</div>
            <div class="text-two">+506 1111 1111</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">jafeth@gmail.com</div>
            <div class="text-two">ariana@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Envía tu feedback aquí</div>
          <p>
            Si tienes alguna sugerencia o duda respecto a la información o sobre
            la pagina no dude ne hacérnoslo saber.
          </p>
          <form action="#">
            <div class="input-box">
              <input type="text" placeholder="Ingresa tu nombre" />
            </div>
            <div class="input-box">
              <input type="text" placeholder="Ingresa tu correo" />
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Escribe tu mensaje"></textarea>
            </div>
            <div class="button">
              <input type="button" value="Enviar" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    <footer class="bg-light text-center p-4">
      <p>&copy; 2024 Recycle Hub. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
