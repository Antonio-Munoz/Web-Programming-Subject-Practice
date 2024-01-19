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

  $id_user = $_SESSION['id_user'];
  $query = "SELECT * FROM usuarios WHERE ID_USER = $id_user";
  $query_run = mysqli_query($conexion, $query);
  if(mysqli_num_rows($query_run) > 0){
    foreach($query_run as $user){
      $name = $user['NAME'];
      $lastname = $user['LASTNAME'];
      $username = $user['USERNAME'];
      $address = $user['ADDRESS'];
      $phone = $user['PHONE'];
      $email = $user['EMAIL'];
      $photo = $user['PHOTO'];
    }
  }

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
    <title>User Profile</title>
    <link rel="shortcut icon" href="../img/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-bg-color" onload="userProfile()">

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
        <div class="container mb-5">
            <h1 class="to-hide">To hide</h1>
        </div>

        <div class="container my-5">
            <div class="row header-bg-color rounded-corners mx-5">
                <div class="col-md-12 my-3">
                  
                  <div class="row my-5">
                    <div class="col-md-10 ml-5">
                      <h1 class="text-center text-white">Mi perfil</h1>
                    </div>

                    <div class="col-md-1 d-flex justify-content-end align-items-center">
                      <div id="edit-profile">
                        <button  name="edit-profile" class="btn button-color d-flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-pencil-square mr-1" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                            Editar perfil
                        </button>
                      </div>

                      <div id="cancel-edit">
                        <button name="cancel-edit" class="btn btn-danger font-weight-bold d-flex flex-row">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-x-circle mr-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                          </svg>
                          Cancelar
                        </button>
                      </div>
                    </div>
                  </div>

                  <form id="form" action="../php/forms-validations.php" method="post" enctype="multipart/form-data">

                    <div class="row mb-4">
                      <div class="col-md-12">
                        <div class="header-bg-color d-flex flex-column justify-content-center align-items-center mx-5">
                          <!-- <img src="../img/Logo.png" class="rounded-circle img-thumbnail img-size-profile"> -->
                          <div id="imagePreview"> 
                            <img id="uploadPreview" src="../img/user-images/<?php echo $photo; ?>" class="img-size-profile rounded-circle">
                          </div>

                          <input type="file" id="inputbox-i" name="image-upload" class="paragraph-style" accept="image/*">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 px-5">
                        <div class="d-flex flex-column align-items-center">
                          <h3 class="paragraph-color d-flex justify-content-start">Nombre</h3>
                          <p class="paragraph-style"><?php echo $name .' '. $lastname ?></p>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div id="inputbox-0"   class="inputBox pt-2 ml-5">
                              <input id="name" name="name" type="text" value="<?php echo $name ?>" pattern="^[A-Za-z1-9 ]*$" title="Solo puedes ingresar letras y numeros" required autocomplete="off">
                              <span>Nombre</span>
                              <i></i>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div id="inputbox-1" class="inputBox pt-2 mr-5">
                              <input id="lastname" name="lastname" type="text" value="<?php echo $lastname ?>" pattern="^[A-Za-z1-9 ]*$" title="Solo puedes ingresar letras y numeros" required autocomplete="off">
                              <span>Apellido</span>
                              <i></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 px-5">
                        <div class="d-flex flex-column align-items-center">
                          <h3 class="paragraph-color d-flex justify-content-start">Usuario</h3>
                          <p class="paragraph-style"><?php echo $username ?></p>
                        </div>

                        <div id="inputbox-2" class="inputBox pt-2 mx-5">
                          <input id="username" name="username" type="text" value="<?php echo $username ?>" pattern="^[A-Za-z1-9 ]*$" title="Solo puedes ingresar letras y numeros" required autocomplete="off">
                          <span>Usuario</span>
                          <i></i>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 px-5">
                          <div class="d-flex flex-column align-items-center">
                              <h3 class="paragraph-color d-flex justify-content-start">Direccion</h3>
                              <p class="paragraph-style"><?php echo $address ?></p>
                          </div>

                          <div id="inputbox-3" class="inputBox pt-2 mx-5">
                              <input id="address" name="address" type="text" value="<?php echo $address ?>" pattern="^[A-Za-z1-9 ]*$" title="Solo puedes ingresar letras" required autocomplete="off">
                              <span>Direccion</span>
                              <i></i>
                          </div>
                      </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 px-5">
                            <div class="d-flex flex-column align-items-center">
                                <h3 class="paragraph-color">Telefono</h3>
                                <p class="paragraph-style"><?php echo $phone ?></p>
                            </div>
                            
                            <div id="inputbox-4" class="inputBox pt-2 mx-5">
                                <input id="phone" name="phone" type="number" value="<?php echo $phone ?>" pattern="^[1-9]*$" title="Solo puedes ingresar numeros" required autocomplete="off">
                                <span>Telefono</span>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 px-5">
                        <div class="d-flex flex-column align-items-center">
                          <h3 class="paragraph-color">Correo electronico</h3>
                          <p class="paragraph-style"><?php echo $email ?></p>
                        </div>
                        
                        <div id="inputbox-5" class="inputBox pt-2 mx-5">
                          <input id="email" name="email" type="email" value="<?php echo $email ?>" required oninvalid="this.setCustomValidity('Debes ingresar tu coreo electronico')" oninput="this.setCustomValidity('')">
                          <span>Email</span>
                          <i></i>
                        </div>
                      </div>
                    </div>
                    
                    <div id="save-profile" class="row my-5">
                      <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" name="save-profile" class="btn btn-success d-flex flex-row py-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-floppy mr-2" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2z"/>
                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                          </svg>
                          Guardar
                        </button>
                      </div>
                    </div>
                    
                    <div id="close-session" class="row my-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" name="close-session" class="btn btn-danger px-5 font-weight-bold font">Cerrar sesion</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <h1 class="to-hide">To hide</h1>
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

    <!-- <script src="../js/user-profile.js"></script> -->
    <script src="../js/script.js"></script>

</body>
</html>