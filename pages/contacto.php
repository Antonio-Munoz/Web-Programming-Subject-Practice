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
    <title>Contacto</title>
    <link rel="shortcut icon" href="../img/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body class="body-bg-color" onload="contactUs()">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark header-bg-color py-2" aria-label="Eighth navbar example">
            <div class="container">
              <a class="navbar-brand d-flex align-items-center" href="../index.html">
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
                    <a class="nav-link active">Contacto</a>
                  </li>
                  <?php
                  if($show){
                  ?>
                      <li class="nav-item mr-1">
                        <a class="nav-link" href="tutoriales.php">Tutoriales</a>
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
        <div class="container my-5">

            <?php
              include('../php/message.php');
            ?>
          
            <div class="container mt-5 mb-4 py-2 header-bg-color rounded-corners my-shadows ">
              <h2 class="text-center text-white">Contacto</h2>
            </div>

            <div class="row">
                <div class="col-md-6 p-3 text-white">
                    <h2 class="text-center">Datos de contacto</h2>
                    <ul class="list-unstyled d-inline-flex flex-column flex-nowrap">
                        <li class="d-inline-flex align-items-center ml-5 mb-3">
                            <img class="icon-size" src="../img/whatsapp.png">
                            <div class="ml-3">
                                <h3>Télefono</h3>
                                <a class="paragraph-style" href="tel:+526242134812">(624)-213-4812</a>
                            </div>
                        </li>
                        <li class="d-inline-flex align-items-center ml-5 mb-3">
                            <img src="../img/mail_logo.png" class="icon-size">
                            <div class="ml-3">
                                <h3>Email</h3>
                                <a class="paragraph-style" href="mailto:ea0708@outlook.com">ea0708@outlook.com</a>
                            </div>
                        </li>
                        <li class="d-inline-flex align-items-center ml-5 mb-3">
                            <img src="../img/maps_logo.png" class="icon-size">
                            <div class="ml-3 card-width">
                                <h3>Dirección</h3>
                                <a class="paragraph-style" href="#">Ernesto Aramburo, Mz. 15, Lt. 01, Villas de Cortez, San José del Cabo, BCS</a>
                            </div>
                        </li>
                        <li class="d-inline-flex align-items-center ml-5 mb-3">
                            <img src="../img/fb_logo.png" class="icon-size">
                            <div class="ml-3">
                                <h3>Redes sociales</h3>
                                <a class="paragraph-style" href="https://www.facebook.com/profile.php?id=61550668318261">Antonio Muñoz</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <iframe class="rounded-corners" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d8961.378522894724!2d-109.73554433327317!3d23.09488165239465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDA2JzAxLjYiTiAxMDnCsDQzJzU1LjAiVw!5e0!3m2!1ses-419!2smx!4v1697857047332!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-bg-color rounded-corners my-shadows p-5">
                        <h2 class="text-center text-white mb-5">Mandanos un mensaje</h2>

                        <form id="contact-us-form" class="px-5" action="../php/forms-validations.php" method="post">
                          <div class="row">
                            <div class="col-md-6 mb-4">
                              <div class="inputBox">
                                <input type="text" name="name" pattern="^[A-Za-z ]*$" title="Solo puedes ingresar letras" required >
                                <span>Nombre</span>
                                <i></i>
                              </div>
                            </div>
                              
                            <div class="col-md-6">
                              <div class="inputBox">
                                <input id="email" name="email" type="email" required oninvalid="this.setCustomValidity('Debes ingresar tu correo electronico')" oninput="this.setCustomValidity('')">
                                <span>Email</span>
                                <i></i>
                              </div>
                            </div>
                          </div>
                            
                            <div class="inputBox mb-4">
                                <input id="subject" name="subject" type="text" pattern="^[A-Za-z ]*$" title="Solo puedes ingresar letras" required>
                                <span>Asunto</span>
                                <i></i>
                            </div>
                            <div class="inputBox mb-4">
                                <textarea  id="message" name="message" required oninvalid="this.setCustomValidity('Debes ingresar un mensaje')" oninput="this.setCustomValidity('')"></textarea>
                                <span>Mensaje</span>
                                <i></i>
                            </div>
                            <div class="d-flex justify-content-center">
                                <!-- <input class="enter" type="submit" value="Login"> -->
                                <input id="contact-submit" name="contact-submit" class="btn button-color px-5" type="submit" value="Enviar">
                            </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-3 mt-4 header-bg-color paragraph-style">
        <div class="container px-5">
          <ul class="nav justify-content-around border-bottom pb-3 mb-3 px-5">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img class="icon-size" src="../img/fb_logo.png"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img class="icon-size" src="../img/github.png"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img class="icon-size" src="../img/gorjeo.png"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img class="icon-size" src="../img/instagram.png"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img class="icon-size" src="../img/linkedin.png"></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"><img class="icon-size" src="../img/whatsapp.png"></a></li>
          </ul>
        </div>
        <p class="text-center text-body-secondary">&copy; 2023 Erick Antonio Muñoz Meza Company, Inc</p>
    </footer>
    
    <!-- <script src="../js/contactus.js"></script> -->
    <script src="../js/script.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>
</html>