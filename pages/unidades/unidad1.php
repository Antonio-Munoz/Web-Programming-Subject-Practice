<?php
session_start();
$show = false;
if(isset($_SESSION["id_user"]) && $_SESSION["id_user"] && $_SESSION['active'] == 1){  
  $show = true;
  $showadmin = false;
  if(isset($_SESSION['is_admin'])){
    $showadmin = true;
  }

  $photo = $_SESSION["photo"];
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
    <title>Document</title>
    <link rel="shortcut icon" href="../../img/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="body-bg-color" onload="unity()">
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark header-bg-color py-2" aria-label="Eighth navbar example">
            <div class="container">
              <a class="navbar-brand d-flex align-items-center" href="../../index.php">
                <img src="../../img/Logo.svg" alt="web Logo" width="50">
                <h1 class="h4 ml-3 text-center" >Programación Web</h1>
              </a>

              <div class="" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item mr-1">
                    <a class="nav-link" aria-current="page" href="../../index.php">inicio</a>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="../acerca-de.php">Acerca de</a>
                  </li>
                  <li class="nav-item open-submenu mr-1 d-flex flex-column align-items-center justify-content-center">
                    <a href="#" class="active nav-link d-flex align-items-center justify-content-center">
                      Unidades
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill ml-1" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </a>
                    <div class="submenu">
                      <ul>
                        <li><a href="unidad1.php">Unidad 1</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="../contacto.php">Contacto</a>
                  </li>
                  <?php
                  if($show){
                  ?>
                      <li class="nav-item mr-1">
                        <a class="nav-link" href="tutoriales.php">Tutoriales</a>
                      </li>
                      
                      <li class="nav-item ml-1 d-flex justify-content-center align-items-center">
                        <img src="../../img/user-images/<?php echo $photo; ?>" class="d-inline rounded-circle icon-size">
                        <li class='nav-item open-submenu mr-1 d-flex flex-column align-items-center justify-content-center'>
                          <a href='#' class='nav-link h5 d-flex align-items-center justify-content-center'>
                          <?php echo $_SESSION['username'];?>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill ml-1' viewBox='0 0 16 16'>
                              <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                            </svg>
                          </a>
                          <div class='submenu'>
                            <ul>
                              <li><a href='../perfil.php'>Perfil de usuario</a></li>

                              <?php
                              echo $showadmin? "<li><a href='../../admin/index.php'>Admin</a></li>" : '';
                              ?>

                              <li><a href='../../php/logout.php'>Cerrar sesion</a></li>
                            </ul>
                          </div>
                        </li>
                      </li>
                  <?php
                  }else{
                    echo "
                      <li class=\"nav-item\">
                        <a href=\"../pages/login.php\" class=\"btn button-color d-inline-flex align-items-center px-4\">
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
        <div class="container mt-5 mb-4 py-2 header-bg-color rounded-corners my-shadows ">
            <h2 class="text-center text-white">Unidad 1</h2>
        </div>

        <div class="container my-5">
            <div class="row">
              <div class="col-md-12 text-center text-white d-flex flex-column align-items-center justify-content-center">
                <iframe class="pdf-size-unidades rounded-corners" src="../../pdf/1. Introducción a las aplicaciones web.pdf" height="500" width="100%"></iframe>
              </div>
            </div>

            <div class="container header-bg-color rounded-corners mt-5 p-5">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <h2 class="text-white">Competencia especifica</h2>
                        <p class="paragraph-style">Conoce la evolución, arquitectura, tecnologías y planificación de las aplicaciones Web para la preparación de un ambiente de desarrollo.</p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="../../img/Analysis-cuate.png" class="img-size-secondary">
                    </div>
                </div>
    
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="../../img/Course app-amico (1).png" class="img-size-secondary">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-white">Competencia General</h2>
                        <ul class="paragraph-style">
                            <li>Comunicación oral y escrita.</li>
                            <li>Habilidad para buscar, analizar, clasificar y sintetizar información proveniente de fuentes diversas.</li>
                            <li>Capacidad crítica y autocrítica.</li>
                            <li>Capacidad de trabajar en equipo.</li>
                            <li>Capacidad de aplicar los conocimientos en la práctica.</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="container mt-5 mb-4 py-2 header-bg-color rounded-corners my-shadows ">
                        <h3 class="text-center text-white">Subtemas</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-5">
                            <h4 class="text-center text-white">1.1 Glosario de conceptos</h4>
                            <p class="paragraph-style text-center">
                                Incluir 10 conceptos relacionados con internet, en el  Glosario de Conceptos de internet en la unidad 1.
                                <br>
                                <b>Indicaciones:</b>
                            </p>
                            <ol class="paragraph-style ">
                                <li>Investigar sobre las tecnologías, lenguajes, asociaciones, protocolos, empresas, personajes, dispositivos electrónicos, redes etc. que tengan relación con internet. </li>
                                <li>Incluir en el Glosario las definiciones, los datos como fechas, descubridores, empresas relacionadas etc.</li>
                                <li>Incluir al final de la cita, la bibliografia, autor, libro y fecha o si es un sitio web es autor, sitio y fecha.</li>
                                <li>Elaborara un documento PDF con portada incluyendo en el los 5 conceptos y sus definiciones que publico en el Glosario y suba el archivo a la carpeta de la unidad 1 y comparta el vinculo en esta plataforma.</li>
                            </ol>
                        </div>
                        <div class="col-md-12 px-5">
                            <h4 class="text-center text-white">1.2 Examen Unidad 1</h4>
                            <p class="paragraph-style text-center">
                                Examen de la unidad 1 en cual trata sobre conceptos basicos del desarrollo web, enfocandose principalmente en su historia y algunas de las caracteristicas necesarias para llevar a cabo el desarrollo de una pagina web.
                            </p>
                        </div>
                        <div class="col-md-12 px-5">
                            <h4 class="text-center text-white">1.3 Practicas de sitio web 1</h4>
                            <p class="paragraph-style text-center">
                                Realizar la definición del sito web a desarrollar en la materia, objetivos, estructura y maquetado.
                                <br>
                                <b>Indicaciones:</b>
                            </p>
                            <ol class="paragraph-style">
                                <li>Leer el documento PRÁCTICA SITIO WEB que se presenta en esta actividad.</li>
                                <li>Llenar los 3 formatos adjuntos en esta actividad, Objetivo del sitio web, Estructura y Maqueta en relacion su proyecto de materia.</li>
                                <li>Creara una carpeta titulada PRACTICA SITIO WEB 1 donde se incluirán los tres archivos en word de las actividades se integraran en una carpeta junto con el PDF de la maqueta realizada en Balsamic, y se subirá en la unidad 1 en OneDrive.</li>
                                <li>Para entrega en la plataforma de Moodle poner el link hacia la carpeta PRACTICA SITIO WEB 1.</li>
                            </ol>
                        </div>
                        <div class="col-md-12 px-5">
                            <h4 class="text-center text-white">1.4 Proyecto integrador</h4>
                            <p class="paragraph-style text-center">
                                En la primera unidad del proyecto integrador se evaluara el punto 1ro. Definición del sitio web y maquetado.
                                <br>
                                Entrega: Subir en esta plataforma la presentación del primer periodo del proyecto integrador convertida en PDF.

                                <br>
                                <b>Indicaciones:</b>
                            </p>
                            <ol class="paragraph-style">
                                <li>Actividad realizada en equipos del proyecto integrador.</li>
                                <li>Los tres archivos se integraran en una carpeta, y sera enviada en formato Zip para entrega en la plataforma.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    
    <footer class="py-3 mt-4 header-bg-color paragraph-style">
        <div class="container px-5">
          <ul class="nav justify-content-around border-bottom pb-3 mb-3 px-5">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../../img/fb_logo.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../../img/github.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../../img/gorjeo.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../../img/instagram.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../../img/linkedin.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../../img/whatsapp.png" width="25"></a></li>
          </ul>
        </div>
        <p class="text-center text-body-secondary">&copy; 2023 Erick Antonio Muñoz Meza Company, Inc</p>
    </footer>
    

    <script src="../../js/script.js"></script>
</body>
</html>