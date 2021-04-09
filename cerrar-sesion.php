<?php 
    session_start();
    //reiniciar a arreglo vacio
    $_SESSION = [];

    header('Location: /index.php');
?> 