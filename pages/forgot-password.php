<?php
session_start();
$show = false;
if(isset($_SESSION["id_user"]) && $_SESSION["id_user"] && $_SESSION['active'] == 1){  
  $show = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="shortcut icon" href="../img/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body class="body-bg-color" onload="forgotPass()">

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
                    echo "
                      <li class=\"nav-item mr-1\">
                        <a class=\"nav-link\" href=\"tutoriales.php\">Tutoriales</a>
                      </li>
                      <li class=\"nav-item ml-1\">
                        <a href=\"perfil.php\" class=\"d-flex justify-content-center align-items-center\">
                          <img src=\"../img/Logo.png \" class=\"d-inline rounded-circle icon-size\">
                          <h1 class=\"h5 pt-2 pl-1\">".$_SESSION['username']."</h1>
                        </a>
                      </li>
                    ";
                  }else{
                    echo "
                      <li class=\"nav-item\">
                        <a href=\"login.php\" class=\"btn button-color d-inline-flex align-items-center px-4\">
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
        <div class="container my-5 px-5">
            <div class="row header-bg-color rounded-corners">

                <div class="col-md-12 my-3">
                    <div class="flex-column">
                        <h1 class="text-center text-white my-5">Reestablecer contraseña</h1>
                        <span id="email-result"></span>

                        <?php
                          include('../php/message.php');
                        ?>

                        <form id="form-password" class="container" action="../php/forms-validations.php" method="post">
                            <div class="inputBox mx-5">
                                <input id="email-forgot" name="email-forgot" type="email" required oninvalid="this.setCustomValidity('Debes ingresar tu correo electronico')" oninput="this.setCustomValidity('')">
                                <span>Correo</span>
                                <i></i>
                            </div>
                            
                            <div class="container mt-1 px-5 d-flex">
                              <p class="paragraph-style text-left">Ingresa tu correo, al cual se enviara un enlace para reestablecer tu contraseña.</p>
                            </div>

                            <div class="mb-3 px-5">
                              <input name="forgot-submit" class="btn button-color card-width" type="submit" value="Enviar">
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-3 mt-5 header-bg-color paragraph-style">
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

    <!-- <script src="../js/forgot-pass.js"></script> -->
    <script src="../js/script.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>