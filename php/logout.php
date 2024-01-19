<?php
session_start();

unset($_SESSION["id_user"]);
unset($_SESSION["username"]);
unset($_SESSION["actvie"]);
unset($_SESSION['is_admin']);
session_unset();
session_destroy();
header('Location: ../index.php');
exit(0);
?>