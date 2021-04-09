<?php


//importar la conexíon
require 'includes/config/database.php';
$db = conectarDB();
//crear email y password
$email = "admin@gmail.com";
$password = "123456";

//hashear password

$passwordHash = password_hash($password,PASSWORD_DEFAULT);


//query crear usuario
$query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${passwordHash}'); ";
var_dump($query);

// exit;
//agregarlo a la base de datos
mysqli_query($db,$query);