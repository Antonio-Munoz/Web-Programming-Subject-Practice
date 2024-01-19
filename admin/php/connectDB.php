<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'projectdb';

$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conexion){
    die('Connection failed'.mysqli_connect_error());
}

?>  