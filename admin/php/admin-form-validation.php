<?php
require 'connectDB.php';
session_start();

// LOGIN validation
if(isset($_POST['login-admin'])){

    if(!isset($_POST['username']) || !isset($_POST['password'])){
        echo 'Campo vacio';
        exit(0);
    }

    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $query = "SELECT * FROM usuarios WHERE USERNAME = '$username' and IS_ADMIN = 1";
    $query_run = mysqli_query($conexion, $query);

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $user){
            if($user['ACTIVE'] == 0){
                echo 'Administrador inactivo';
                $_SESSION['message'] = "El usuario esta inactivo";
                $_SESSION['message_color'] = "warning";
                header("Location: ../pages/login.php");
                exit(0);
            }
            if($user['IS_ADMIN'] == 1){
                $_SESSION['is_admin'] = true;
            }
            
            if($username == $user['USERNAME'] && $password == $user['PASSWORD']){
                echo 'Inicio sesion';
                $_SESSION['id_user'] = $user['ID_USER'];
                $_SESSION['active'] = $user['ACTIVE'];
                $_SESSION['username'] = $user['USERNAME'];
                $_SESSION['photo'] = $user['PHOTO'];
                header("Location: ../index.php");
                exit(0);
            }else{
                echo 'No existe usuario';
                $_SESSION['message'] = "Usuario o contraseña incorrectos";
                $_SESSION['message_color'] = "warning";
                header("Location: ../login.html");
                exit(0);
            }
        }
    }else{
        echo 'No existen usuarios';
        $_SESSION['message'] = "No existe el usuario";
        $_SESSION['message_color'] = "warning";
        header("Location: ../login.html");
        exit(0);
    }

}

// SIGNUP validation
if(isset($_POST['register-admin'])){

    if(!isset($_POST['name']) || !isset($_POST['lastname']) || !isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['repassword']) || !isset($_FILES['image-upload'])){
        echo 'Campo vacio';
        exit(0);
    }

    $name = mysqli_real_escape_string($conexion, $_POST['name']);
    $lastname = mysqli_real_escape_string($conexion, $_POST['lastname']);
    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $phone = mysqli_real_escape_string($conexion, $_POST['phone']);
    $address = mysqli_real_escape_string($conexion, $_POST['address']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $repassword = mysqli_real_escape_string($conexion, $_POST['repassword']);
    $image = $_FILES['image-upload']['name'];
    $tmp_name = $_FILES['image-upload']['tmp_name'];
    $location = "../img/user-images/";

    // change name
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $_POST['username'] . '.' .$ext;
    $target_path = $location.$filename;
    $uploaded = move_uploaded_file($tmp_name, $target_path);
    if(!$uploaded){
        echo "Image NOT uploades <br>";
    }
    if(empty($ext)){
        $filename = 'asdas';
    }
    

    $query = "INSERT INTO usuarios VALUES(null, '$username','$name','$lastname','$address','$phone','$email','$repassword','$filename',1, 1)";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo "succesfully inserted";
        $_SESSION['id_user'] = $user['ID_USER'];
        $_SESSION['active'] = $user['ACTIVE'];
        $_SESSION['username'] = $user['USERNAME'];
        header("Location: ../login.html");
        exit(0);
    }else{
        echo "Could not insert";
        header("Location: /signup.php");
        exit(0);
    }

}

// FORGOT PASS validation
if(isset($_POST['forgot-admin'])){

}

// DELETE ADMIN
if(isset($_POST['delete-admin'])){
    $adminID = mysqli_real_escape_string($conexion, $_POST['delete-admin']);

    $query = "DELETE FROM usuarios WHERE ID_USER = '$adminID'";
    $query_run = mysqli_query($conexion, $query);
    if($query_run){
        $_SESSION['message'] = 'Eliminado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../admin-page.php");
        exit(0);
    }else{
        $_SESSION['message'] = 'No se pudo eliminar';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../admin-page.php");
        exit(0);
    }
}

if(isset($_POST['delete-user'])){
    $userID = mysqli_real_escape_string($conexion, $_POST['delete-user']);

    $query = "DELETE FROM usuarios WHERE ID_USER = '$userID'";
    $query_run = mysqli_query($conexion, $query);
    if($query_run){
        $_SESSION['message'] = 'Eliminado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../user-page.php");
        exit(0);
    }else{
        $_SESSION['message'] = 'No se pudo eliminar';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../user-page.php");
        exit(0);
    }
}

if(isset($_POST['delete-tutorial'])){
    $tutoID = mysqli_real_escape_string($conexion, $_POST['delete-tutorial']);

    $query = "DELETE FROM `tutos y libros` WHERE ID = '$tutoID'";
    $query_run = mysqli_query($conexion, $query);
    if($query_run){
        $_SESSION['message'] = 'Eliminado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../tutorial-page.php");
        exit(0);
    }else{
        $_SESSION['message'] = 'No se pudo eliminar';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../tutorial-page.php");
        exit(0);
    }
}

if(isset($_POST['delete-comment'])){
    $commentID = mysqli_real_escape_string($conexion, $_POST['delete-comment']);

    $query = "DELETE FROM contactanos WHERE ID_COMENTARIO = '$commentID'";
    $query_run = mysqli_query($conexion, $query);
    if($query_run){
        $_SESSION['message'] = 'Eliminado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../comments-page.php");
        exit(0);
    }else{
        $_SESSION['message'] = 'No se pudo eliminar';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../comments-page.php");
        exit(0);
    }
}


?>