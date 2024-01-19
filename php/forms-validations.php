<?php
session_start();
require 'connectDB.php';

// LOGIN PAGE
if(isset($_POST['login-submit'])){ 

    if(!isset($_POST['username']) || !isset($_POST['password'])){
        echo 'Campo vacio';
        exit(0);
    }

    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $query = "SELECT * FROM usuarios WHERE USERNAME = '$username'";
    $query_run = mysqli_query($conexion, $query);

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $user){
            if($user['ACTIVE'] == 0){
                echo 'Usuario inactivo';
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
                header("Location: ../pages/login.php");
                exit(0);
            }
        }
    }else{
        echo 'No existen usuarios';
        $_SESSION['message'] = "No existe el usuario";
        $_SESSION['message_color'] = "warning";
        header("Location: ../pages/login.php");
        exit(0);
    }

}

// SIGNUP PAGE
if(isset($_POST['signup-submit'])){
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
    

    $query = "INSERT INTO usuarios VALUES(null, '$username','$name','$lastname','$address','$phone','$email','$repassword','$filename',1, 0)";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo "succesfully inserted";
        $_SESSION['id_user'] = $user['ID_USER'];
        $_SESSION['active'] = $user['ACTIVE'];
        $_SESSION['username'] = $user['USERNAME'];
        header("Location: ../pages/login.php");
        exit(0);
    }else{
        echo "Could not insert";
        header("Location: /signup.php");
        exit(0);
    }
}

// CONTACT PAGE
if(isset($_POST['contact-submit'])){
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['message'])){
        echo 'Campo vacio';
        exit(0);
    }

    $name = mysqli_real_escape_string($conexion, $_POST['name']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $subject = mysqli_real_escape_string($conexion, $_POST['subject']);
    $message = mysqli_real_escape_string($conexion, $_POST['message']);

    $query = "INSERT INTO contactanos VALUES(null,'$name','$email','$subject','$message')";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo 'suxxesful inserted';
        $_SESSION['message'] = "Mensaje enviado";
        $_SESSION['message_color'] = 'success';
        header("Location: ../pages/contacto.php");
        exit(0);
    }else{
        echo 'not inserted';
        $_SESSION['message'] = "No se pudo enviar el mensaje, intentalo de nuevo";
        $_SESSION['message_color'] = 'warning';
        header("Location: ../pages/contacto.php");
        exit(0);
    }
}

// FORM UPDATE USER PROFILE INFO
if(isset($_POST["save-profile"])){
    $iduser = $_SESSION["id_user"];
    $userPhoto = $_SESSION["photo"];
    // $photo = mysqli_real_escape_string($conexion, $_POST["image-upload"]);
    $name = mysqli_real_escape_string($conexion, $_POST["name"]);
    $lastname = mysqli_real_escape_string($conexion, $_POST['lastname']);
    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $address = mysqli_real_escape_string($conexion, $_POST['address']);
    $phone = mysqli_real_escape_string($conexion, $_POST['phone']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);

    $image = $_FILES['image-upload']['name'];
    $tmp_name = $_FILES['image-upload']['tmp_name'];
    $location = "../img/user-images/";

    if(empty($image)){
        $photo = $userPhoto;
        echo $photo;
    }else{
        if(unlink($location.$userPhoto)){
            echo 'last image deleted <br>';
        }
        // change name
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = $_POST['username'] . '.' .$ext;
        $target_path = $location.$filename;
        $uploaded = move_uploaded_file($tmp_name, $target_path);
        if(!$uploaded){
            echo "Image NOT uploades <br>";
        }
        $photo = $filename;
    }

    $query = "UPDATE usuarios SET USERNAME='$username', NAME='$name', LASTNAME='$lastname', ADDRESS='$address', PHONE='$phone', EMAIL='$email', PHOTO='$photo' WHERE ID_USER = '$iduser'";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo "Informacion actualizada";
        $_SESSION['photo'] = $photo;
        header("Location: ../pages/perfil.php");
        exit(0);
    }else{
        echo "No se pudo actualizar";
        header("Location: ../index.php");
        exit(0);
    }

}

if(isset($_POST["close-session"])){
    // session_write_close();
    // session_reset();
    unset($_SESSION["id_user"]);
    unset($_SESSION["username"]);
    unset($_SESSION["actvie"]);
    unset($_SESSION['is_admin']);
    session_unset();
    session_destroy();
    header('Location: ../index.php');
    exit(0);
}

// FORM TO RECOVER PASSWORD
if(isset($_POST['forgot-submit'])){
    ini_set('SMTP','localhost'); 
    ini_set('smtp_port',25);

    $email = mysqli_real_escape_string($conexion, $_POST['email-forgot']);
    if(mail($email, "Reestablecer contraseña", "Esta es tu contraseña, te sugerimos que la cambies para evitar eventos desafortunados")){
        $_SESSION['message'] = 'Mensaje enviado';
        $_SESSION['message_color'] = 'success';
        header("Location: ../pages/forgot-password.php");
    }else{
        $_SESSION['message'] = 'No se pudo enviar el correo, intentelo de nuevo';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../pages/forgot-password.php");
    }
    
}

?>