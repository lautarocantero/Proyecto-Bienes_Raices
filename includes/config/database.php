<?php

    function conectarDB() : mysqli {
        $db = mysqli_connect('localhost','root','root','bienes_raices');
    
        if(!$db){
            echo "no se conecto";
            exit;
        }

        return $db;

    } 

?>


