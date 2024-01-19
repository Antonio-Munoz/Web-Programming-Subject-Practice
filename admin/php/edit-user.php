<?php
require 'connectDB.php';
session_start();

$adminID = $_GET['id'];

$query = "SELECT * FROM usuarios WHERE ID_USER = '$adminID'";
$query_run = mysqli_query($conexion, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-dark" onload="onloadPage()">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="../user-page.php" class="btn btn-danger">
                                                <i class="bi bi-chevron-left"></i>
                                                Volver
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="text-center font-weight-light mb-4">Actualizar usuario</h3>
                                </div>

                                <?php
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach ($query_run as $admin) {
                                        $_SESSION['id_user'] = $admin['ID_USER'];   
                                        $_SESSION['photo'] = $admin['PHOTO'];
                                ?>
                                
                                <div class="card-body">
                                    <form action="crud-admin.php" method="post" enctype="multipart/form-data"> 
                                        <div class="row mb-3">
                                            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                                              <div id="imagePreview">
                                                <img id="uploadPreview" src="../../img/user-images/<?php echo $admin['PHOTO']?>" class="form-control img-error rounded-circle"/>
                                              </div>
                                              
                                              <!-- <input type="file" id="image-upload" name="image-upload" class="f" accept="image/*"> -->
                                              <div class="input-group mb-3">
                                                  <input type="file" class="form-control" name="image-upload" id="image-upload" accept="image/*">
                                                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                              </div>
                                            </div>
                                        </div>
                                          
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="name" value="<?php echo $admin['NAME']; ?>" type="text" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" name="lastname" value="<?php echo $admin['LASTNAME']; ?>" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Apellido</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" name="username" value="<?php echo $admin['USERNAME']; ?>" type="text" placeholder="Usuario" />
                                            <label for="inputEmail">Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputAddress" name="address" value="<?php echo $admin['ADDRESS']; ?>" type="text" placeholder="Address" />
                                            <label for="inputEmail">Direccion</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" value="<?php echo $admin['EMAIL']; ?>" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Correo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPhone" name="phone" value="<?php echo $admin['PHONE']; ?>" type="tel" placeholder="Telefono" />
                                            <label for="inputEmail">Telefono</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><input id="update-user" name="update-user" value="Actualizar" type="submit" class="btn btn-success btn-block"/></div>
                                        </div>
                                    </form>

                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="mt-5" id="layoutAuthentication_footer">
            <footer class=" py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Erick Antonio Muñoz Meza 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>