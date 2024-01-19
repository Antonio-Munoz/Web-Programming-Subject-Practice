<?php
session_start();
$show = false;
if(isset($_SESSION["id_user"]) && $_SESSION["id_user"] && $_SESSION['active'] == 1){  
  $show = true;
  $showadmin = false;
  if(isset($_SESSION['is_admin'])){
    $showadmin = true;
  }

  $photo = $_SESSION['photo'];
  if(!str_contains($photo, '.')){
    $photo = 'usuario.png';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programación Web</title>
    <link rel="shortcut icon" href="img/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-bg-color" onload="startSwiper()">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark header-bg-color py-2" aria-label="Eighth navbar example">
            <div class="container">
              <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/Logo.svg" alt="web Logo" width="50">
                <h1 class="h4 ml-3 text-center" >Programación Web</h1>
              </a>

              <div class="" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item mr-1">
                    <a class="nav-link active" aria-current="page" href="#">inicio</a>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="pages/acerca-de.php">Acerca de</a>
                  </li>
                  <li class="nav-item open-submenu mr-1 d-flex flex-column align-items-center justify-content-center">
                    <a href="#" class="nav-link d-flex align-items-center justify-content-center">
                      Unidades
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </a>
                    <div class="submenu">
                      <ul>
                        <li><a href="pages/unidades/unidad1.php">Unidad 1</a></li>
                        <!-- <li><a href="#">Unidad 2</a></li> -->
                        <!-- <li><a href="#">Unidad 3</a></li> -->
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="pages/contacto.php">Contacto</a>
                  </li>
                  <?php
                  if($show){
                  ?>
                    <li class="nav-item mr-1">
                      <a class="nav-link" href="tutoriales.php">Tutoriales</a>
                    </li>
                    
                    <li class="nav-item ml-1 d-flex justify-content-center align-items-center">
                      <img src="img/user-images/<?php echo $photo; ?>" class="d-inline rounded-circle icon-size">
                      <li class='nav-item open-submenu mr-1 d-flex flex-column align-items-center justify-content-center'>
                        <a href='#' class='nav-link h5 d-flex align-items-center justify-content-center'>
                        <?php echo $_SESSION['username'];?>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill ml-1' viewBox='0 0 16 16'>
                            <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                          </svg>
                        </a>
                        <div class='submenu'>
                          <ul>
                            <li><a href='pages/perfil.php'>Perfil de usuario</a></li>

                            <?php
                            echo $showadmin? "<li><a href='admin/index.php'>Admin</a></li>" : '';
                            ?>

                            <li><a href='php/logout.php'>Cerrar sesion</a></li>
                          </ul>
                        </div>
                      </li>
                    </li>
                  <?php
                  }else{
                    echo "
                      <li class=\"nav-item\">
                        <a href=\"pages/login.php\" class=\"btn button-color d-inline-flex align-items-center px-4\">
                          Iniciar sesión
                        </a>
                      </li>
                    ";
                  }
                  ?>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <main>

      <div class="container mb-5">
        <h1 class="to-hide">To hide</h1>
      </div>
      
        <div class="container my-5 pl">
            <div class="row">
              <div class="col-6 d-flex flex-column justify-content-center">
                <div class="row">
                  <dic class="col-12 py-5 rounded-corners header-bg-color">
                    <div class="pl-4 my-5">
                        <img class="mb-3" src="img/Logo.svg" alt="web Logo" width="120">
                        <h1 class="text-white mb-2">Programación Web</h1>
                        <p class="paragraph-style">
                            El mejor lugar para empezar en el mundo de la<br>programación web
                        </p>
                        <button class="btn button-color d-inline-flex align-items-center px-5" type="button">
                            Empezar
                        </button>
                    </div>
                  </dic>
                </div>
              </div>

              <div class="col-6">
                  <div class="swiper float-right">
                      <!-- Required Wrapper -->
                      <div class="swiper-wrapper">
                          <!-- Slides -->
                          <div class="swiper-slide" data-swiper-autoplay="2000"><img class="img-fluid" src="img/Course app-amico (1).png" alt="Slide 1"></div>
                          <div class="swiper-slide" data-swiper-autoplay="2000"><img class="img-fluid" src="img/Analysis-cuate.png" alt="Slide 2"></div>
                          <div class="swiper-slide" data-swiper-autoplay="2000"><img class="img-fluid" src="img/Website Creator-amico.png" alt="Slide 3"></div>
                          <div class="swiper-slide" data-swiper-autoplay="2000"><img src="img/Coding workshop-rafiki.png" alt="Slide 4" class="img-fluid"></div>
                      </div>
              
                      <!-- The pagination -->
                      <div class="swiper-pagination"></div>
                      <!-- The navigation buttons -->
                      <div class="swiper-button-prev"></div>
                      <div class="swiper-button-next"></div>
                      <!-- The Scrollbar -->
                      <!-- <div class="swiper-scrollbar"></div> -->
                  </div>
              </div>
            </div>
        </div>

        <!-- Que es... -->
        <div class="container my-5">
          <div class="row">
            <div class="col-6">
              <div class="text-center">
                <h2 class="text-white">¿Qué es la programación web?</h2>
                <p class="paragraph-style">
                  Es la creación de sitios web para Internet. Para lograrlo se hace uso de tecnologías del lado del servidor y del cliente que conllevan unos procesos de base de datos y el uso de un navegador para realizar determinadas tareas o mostrar información
                </p>
              </div>
              
              <div class="row text-center">
                <div class="col-6">
                  <h3 class="text-white">¿Qué es HTML?</h3>
                  <p class="paragraph-style">
                    Lenguaje de Marcado de Hipertexto (HTML) es código que se utiliza para estructurar y desplegar una página web y sus contenidos.
                  </p>
                </div>
                <div class="col-6">
                  <h3 class="text-white">¿Qué es CSS?</h3>
                  <p class="paragraph-style">
                    Las hojas de estilo en cascada (CSS, cascading style sheets) permiten crear páginas web atractivas.
                  </p>
                </div>
              </div>
              
              <div class="row text-center ">
                <div class="col-6">
                  <h3 class="text-white">¿Qué es JavaScript?</h3>
                  <p class="paragraph-style">
                    Es un lenguaje de programación que permite implementar funciones complejas en páginas web
                  </p>
                </div>

                <div class="col-6">
                  <h3 class="text-white">¿Qué es PHP?</h3>
                  <p class="paragraph-style">
                      Es un lenguaje de programación interpretado​ del lado del servidor que se adapta especialmente al desarrollo web.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-6 d-flex align-items-center">
              <img class="header-bg-color rounded-corners img-size my-shadows" src="img/whatis.svg  " alt="Que es programacion web">
            </div>
            
          </div>
        </div>

        <!-- Tutoriales recientes -->
        <div class="container my-5">  
          <div class="row">
            <div class="col-12 text-center">
              <h2 class="text-white mb-3">Tutoriales Recientes</h2>
              <div class="row d-flex justify-content-around align-items-center">
                <div class="card card-width tutorial-cards header-bg-color paragraph-style rounded-corners">
                  <img class="p-3" src="img/Logo.png" alt="Card image">
                  <div class="card-body">
                    <h5 class="card-title">Tiutlo de tutorial</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    </p>
                    <a href="#" class="btn button-color">Ver tutorial</a>
                  </div>
                </div>

                <div class="card card-width tutorial-cards header-bg-color paragraph-style rounded-corners">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <h5 class="card-title">Titulo tutorial</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <a href="#" class="btn button-color">Ver tutorial</a>
                  </div>
                </div>

                <div class="card card-width tutorial-cards header-bg-color paragraph-style rounded-corners">
                  <img class="p-3" src="img/Logo.png" alt="tu cola">
                  <div class="card-body">
                    <h5 class="card-title">Titulo tutorial</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <a href="#" class="btn button-color">Ver tutorial</a>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
        <!-- Unidades -->
        <div class="container my-5">
          <div class="row">
            <div class="col-12 text-center">
              <h2 class="text-white mb-3">Unidades</h2>
              <div class="row d-flex justify-content-around">
                <div class="card card-width-secondary rounded-corners header-bg-color">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <a href="#" class="btn button-color px-4">Unidad 1</a>
                  </div>
                </div>

                <div class="card card-width-secondary rounded-corners header-bg-color">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <a href="#" class="btn button-color d-inline-flex align-items-center px-4">Unidad 2</a>
                  </div>
                </div>

                <div class="card card-width-secondary rounded-corners header-bg-color">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <a href="#" class="btn button-color d-inline-flex align-items-center px-4">Unidad 3</a>
                  </div>
                </div>
              </div>

              <div class="row my-5 d-flex justify-content-around">
                <div class="card card-width-secondary rounded-corners header-bg-color">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <a href="#" class="btn button-color d-inline-flex align-items-center px-4">Unidad 4</a>
                  </div>
                </div>

                <div class="card card-width-secondary rounded-corners header-bg-color">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <a href="#" class="btn button-color d-inline-flex align-items-center px-4">Unidad 5</a>
                  </div>
                </div>

                <div class="card card-width-secondary rounded-corners header-bg-color">
                  <img class="p-3" src="img/Logo.png">
                  <div class="card-body">
                    <a href="#" class="btn button-color d-inline-flex align-items-center px-4">Unidad 6</a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        
    </main>

    <footer class="py-3 mt-4 header-bg-color paragraph-style">
      <div class="container px-5">
        <ul class="nav justify-content-around border-bottom pb-3 mb-3 px-5">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="img/fb_logo.png" width="25"></a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="img/github.png" width="25"></a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="img/gorjeo.png" width="25"></a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="img/instagram.png" width="25"></a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="img/linkedin.png" width="25"></a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="img/whatsapp.png" width="25"></a></li>
        </ul>
      </div>
      <p class="text-center text-body-secondary">&copy; 2023 Erick Antonio Muñoz Meza Company, Inc</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- <script src="js/index.js  "></script> -->
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>