<?php
require 'connectDB.php';
session_start();

$adminID = $_GET['id'];

$query = "SELECT * FROM contactanos WHERE ID_COMENTARIO = '$adminID'";
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
                                            <a href="../comments-page.php" class="btn btn-danger">
                                                <i class="bi bi-chevron-left"></i>
                                                Volver
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="text-center font-weight-light mb-4">Actualizar comentario</h3>
                                </div>

                                <?php
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach ($query_run as $comment) {
                                        $_SESSION['id_comment'] = $comment['ID_COMENTARIO'];   
                                        // $_SESSION['photo'] = $admin['PHOTO'];
                                ?>
                                
                                <div class="card-body">
                                    <form action="crud-admin.php" method="post" enctype="multipart/form-data"> 
                                          
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="name" value="<?php echo $comment['NAME']; ?>" type="text" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" name="email" value="<?php echo $comment['EMAIL']; ?>" type="email" placeholder="Ingresa un correo" />
                                                    <label for="inputLastName">Correo</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" name="username" value="<?php echo $comment['SUBJECT']; ?>" type="text" placeholder="Asunto" />
                                            <label for="inputEmail">Asunto</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputAddress" name="address" value="<?php echo $comment['MESSAGE']; ?>" type="text" placeholder="Address" />
                                            <label for="inputEmail">Mensaje</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><input id="update-comment" name="update-comment" value="Actualizar" type="submit" class="btn btn-success btn-block"/></div>
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