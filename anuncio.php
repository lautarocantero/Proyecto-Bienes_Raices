<?php  
    require 'includes/funciones.php';
    
    incluirTemplate('header');
    //importar la conexíon
    require __DIR__ . '/includes/config/database.php';
    $db = conectarDB();
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location:/index.php');
    }

    //consultar
    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    //leer los resultados
    $resultado = mysqli_query($db,$query);

    //si ingreso algo inexistente
    if($resultado->num_rows === 0){
        header('Location:/index.php'); 
    }


    $propiedad = mysqli_fetch_assoc($resultado);
    // echo '<pre>';
    // var_dump($propiedad);
    // echo '</pre>';


?> 


    <main class="contenedor seccion contenido-centrado">
        <h1><?= $propiedad['titulo'] ?></h1>

            <img loading="lazy" src="imagenes/<?= $propiedad['imagen'] ?>" alt="imagen de la propiedad">
        <div class="resumen-propiedad">
            <p class="precio">$<?= $propiedad['precio'] ?></p>
            <ul  class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="baños">
                    <p><?= $propiedad['wc'] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="cochera">
                    <p><?= $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="camas">
                    <p><?= $propiedad['habitaciones'] ?></p>
                </li>
            </ul>
            <p><?= $propiedad['descripcion'] ?> </p> 
        </div>
    </main>

<?php  
    mysqli_close($db);
    incluirTemplate('footer');
?> 


    