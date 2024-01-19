<?php
require '../php/connectDB.php';
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

  $query = "SELECT * FROM `tutos y libros` WHERE ESTADO = 1 ";
  $query_run = mysqli_query($conexion, $query);
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriales</title>
    <link rel="shortcut icon" href="../img/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-bg-color" onload="tutorials()">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark header-bg-color py-2" aria-label="Eighth navbar example">
            <div class="container">
              <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <img src="../img/Logo.svg" alt="web Logo" width="50">
                <h1 class="h4 ml-3 text-center" >Programación Web</h1>
              </a>

              <div class="" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item mr-1">
                    <a class="nav-link" aria-current="page" href="../index.php">inicio</a>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="acerca-de.php">Acerca de</a>
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
                        <li><a href="unidades/unidad1.php">Unidad 1</a></li>
                        <!-- <li><a href="#">Unidad 2</a></li> -->
                        <!-- <li><a href="#">Unidad 3</a></li> -->
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item mr-1">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                  </li>
                  <?php
                  if($show){
                  ?>
                      <li class="nav-item mr-1">
                        <a class="nav-link active" href="tutoriales.php">Tutoriales</a>
                      </li>
                      
                      <li class="nav-item ml-1 d-flex justify-content-center align-items-center">
                        <img src="../img/user-images/<?php echo $photo; ?>" class="d-inline rounded-circle icon-size">
                        <li class='nav-item open-submenu mr-1 d-flex flex-column align-items-center justify-content-center'>
                          <a href='#' class='nav-link h5 d-flex align-items-center justify-content-center'>
                          <?php echo $_SESSION['username'];?>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill ml-1' viewBox='0 0 16 16'>
                              <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                            </svg>
                          </a>
                          <div class='submenu'>
                            <ul>
                              <li><a href='perfil.php'>Perfil de usuario</a></li>

                              <?php
                              echo $showadmin? "<li><a href='../admin/index.php'>Admin</a></li>" : '';
                              ?>

                              <li><a href='../php/logout.php'>Cerrar sesion</a></li>
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
        <div class="container mt-5 mb-4 py-2 header-bg-color rounded-corners my-shadows ">
            <h2 class="text-center text-white">Tutoriales</h2>
        </div>

        <!-- Main Tutorial -->
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-fluid rounded " src="../img/tutorial-portada.png" alt="Tutorial portada">
                    <div class="px-5">
                        <p class="paragraph-style mt-1">Tutorial HTML y CSS</p>
                        <h2 class="text-white">Diseño Web Responsivo</h2>
                        <p class="paragraph-style">
                            Tutorial impartido por la página <em>FreeCodeCamp</em> en donde se tratan conceptos desde el aprendizaje de HTML, CSS y por utlimo el diseño responsivo para crear páginas que se adapten a las medidas de cualquier dispositivo sin perder la experiencia del usuario al navegar dentro del sitio web.
                        </p>
                        <a href="https://www.freecodecamp.org/learn/2022/responsive-web-design/" class="btn button-color px-5">Ver más</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- More tutorials -->
        <div class="container my-5 py-1 header-bg-color rounded-corners my-shadows ">
            <h3 class="text-center text-white">Tutoriales</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex flex-wrap flex-container">
                  <?php
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $tutos){
                  ?>
                    <div class="card flex-children header-bg-color rounded-corners my-4 mx-3 d-flex align-items-center">
                      <img class="img-size-secondary px-4 pt-5" src="../img/tutorial-images/<?=$tutos['FOTO'];?>">
                      <div class="card-body">
                        <p class="card-text paragraph-style"><?=$tutos['CATEGORIA'] .' - '. $tutos['FECHA'];?></p>
                        <h5 class="card-title text-white"><?= $tutos['TITULO']; ?></h5>
                        <p class="card-text paragraph-style"><?=$tutos['AUTOR'];?></p>
                            <p class="card-text paragraph-style-2 paragraph-color"> <?= $tutos['PALABRAS_CLAVE']; ?></p>
                            <p class="card-text paragraph-style overflow-y-hidden">
                                <?= $tutos['CONTENIDO']; ?>
                            </p>
                            <a href="<?= $tutos['LINK']; ?>" class="btn button-color">Ver tutorial</a>
                        </div>
                    </div>
                    <?php
                      } // END-FOREACH
                    } // END-IF
                    ?>
                </div>
            </div>
        </div>
        
    </main>

    <footer class="py-3 mt-4 header-bg-color paragraph-style">
        <div class="container px-5">
          <ul class="nav justify-content-around border-bottom pb-3 mb-3 px-5">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../img/fb_logo.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../img/github.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../img/gorjeo.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../img/instagram.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../img/linkedin.png" width="25"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img src="../img/whatsapp.png" width="25"></a></li>
          </ul>
        </div>
        <p class="text-center text-body-secondary">&copy; 2023 Erick Antonio Muñoz Meza Company, Inc</p>
    </footer>
    
    <!-- <script src="../js/tutorials.js"></script> -->
    <script src="../js/script.js"></script>
</body>
</html>