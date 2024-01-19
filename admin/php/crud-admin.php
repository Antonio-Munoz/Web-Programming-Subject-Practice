<?php
require 'connectDB.php';
session_start();

if(isset($_POST['add-admin'])){

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
    $location = "../../img/user-images/";

    // change name
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $_POST['username'] . '.' .$ext;
    $target_path = $location.$filename;
    $uploaded = move_uploaded_file($tmp_name, $target_path);
    if(!$uploaded){
        echo "Image NOT uploades <br>";
    }
    if(empty($ext)){
        $filename = '';
    }
    

    $query = "INSERT INTO usuarios VALUES(null, '$username','$name','$lastname','$address','$phone','$email','$repassword','$filename',1, 1)";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo "succesfully inserted";
        $_SESSION['message'] = 'Administrador agregado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../admin-page.php");
        exit(0);
    }else{
        echo "Could not insert";
        $_SESSION['message'] = 'Administrador agregado correctamente';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../admin-page.php");
        exit(0);
    }
    
}

if(isset($_POST['add-user'])){
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
    $location = "../../img/user-images/";

    // change name
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $_POST['username'] . '.' .$ext;
    $target_path = $location.$filename;
    $uploaded = move_uploaded_file($tmp_name, $target_path);
    if(!$uploaded){
        echo "Image NOT uploades <br>";
    }
    if(empty($ext)){
        $filename = '';
    }
    

    $query = "INSERT INTO usuarios VALUES(null, '$username','$name','$lastname','$address','$phone','$email','$repassword','$filename',1, 0)";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo "succesfully inserted";
        $_SESSION['message'] = 'Administrador agregado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../user-page.php");
        exit(0);
    }else{
        echo "Could not insert";
        $_SESSION['message'] = 'Administrador agregado correctamente';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../user-page.php");
        exit(0);
    }
}

if(isset($_POST['add-tutorial'])){
    if(!isset($_POST['category']) || !isset($_POST['date']) || !isset($_POST['title']) || !isset($_POST['autor']) || !isset($_POST['content']) || !isset($_POST['link']) || !isset($_FILES['image-upload'])){
        echo 'Campo vacio';
        exit(0);
    }

    $category = mysqli_real_escape_string($conexion, $_POST['category']);
    $date = mysqli_real_escape_string($conexion, $_POST['date']);
    $title = mysqli_real_escape_string($conexion, $_POST['title']);
    $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
    $content = mysqli_real_escape_string($conexion, $_POST['content']);
    $link = mysqli_real_escape_string($conexion, $_POST['link']);
    $state = mysqli_real_escape_string($conexion, $_POST['state']);
    $keyWords = mysqli_real_escape_string($conexion, $_POST['key-words']);

    $image = $_FILES['image-upload']['name'];
    $tmp_name = $_FILES['image-upload']['tmp_name'];
    $location = "../../img/tutorial-images/";

    // change name
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = $_POST['autor'] . '.' .$ext;
    $target_path = $location.$filename;
    $uploaded = move_uploaded_file($tmp_name, $target_path);
    if(!$uploaded){
        echo "Image NOT uploades <br>";
    }
    if(empty($ext)){
        $filename = '';
    }
    

    $query = "INSERT INTO `tutos y libros` VALUES(null, '$category','$filename','$title','$date','$autor','$keyWords','$content','$link','$state')";
    $query_run = mysqli_query($conexion, $query);

    if($query_run){
        echo "succesfully inserted";
        $_SESSION['message'] = 'Tutorial agregado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../tutorial-page.php");
        exit(0);
    }else{
        echo "Could not insert";
        $_SESSION['message'] = 'Tutorial agregado correctamente';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../tutorial-page.php");
        exit(0);
    }
}

if(isset($_POST['add-comment'])){
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
        header("Location: ../comments-page.php");
        exit(0);
    }else{
        echo 'not inserted';
        $_SESSION['message'] = "No se pudo enviar el mensaje, intentalo de nuevo";
        $_SESSION['message_color'] = 'warning';
        header("Location: ../comments-page.php");
        exit(0);
    }
}

// UPDATE ADMIN
if(isset($_POST['update-admin'])){

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
    $location = "../../img/user-images/";

    if(empty($image)){
        $photo = $userPhoto;
        echo $photo;
    }else{
        if(unlink($location.$userPhoto)){
            echo 'last image deleted <br>';
        }
        // change name
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = $username . '.' .$ext;
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
        $_SESSION['message'] = 'Administrador actualizado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../admin-page.php");
        exit(0);
    }else{
        echo "No se pudo actualizar";
        $_SESSION['message'] = 'No se pudo actualizar';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../admin-page.php");
        exit(0);
    }

}

// UPDATE ADMIN
if(isset($_POST['update-user'])){

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
    $location = "../../img/user-images/";

    if(empty($image)){
        $photo = $userPhoto;
        echo $photo;
    }else{
        if(unlink($location.$userPhoto)){
            echo 'last image deleted <br>';
        }
        // change name
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = $username . '.' .$ext;
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
        $_SESSION['message'] = 'Usuario actualizado correctamente';
        $_SESSION['message_color'] = 'success';
        header("Location: ../user-page.php");
        exit(0);
    }else{
        echo "No se pudo actualizar";
        $_SESSION['message'] = 'No se pudo actualizar';
        $_SESSION['message_color'] = 'warning';
        header("Location: ../user-page.php");
        exit(0);
    }

}

?>