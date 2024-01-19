<?php
session_start();

if($_GET['logout']){
    unset($_SESSION["id_user"]);
    unset($_SESSION["username"]);
    unset($_SESSION["actvie"]);
    unset($_SESSION['is_admin']);
    unset($_SESSION['message']);
    session_unset();
    session_destroy();
    header('Location: ../login.html');
    exit(0);
}

?>