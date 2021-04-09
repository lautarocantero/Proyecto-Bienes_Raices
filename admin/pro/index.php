<?php

    require '../../includes/funciones.php';
        
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /login.php');
    }


    //importar la conexión
    require '../../includes/config/database.php';
    $db = conectarDB();
    //escribir el query
    $query = "SELECT * FROM propiedades";

    //consultar datos
    $resultadoConsulta = mysqli_query($db,$query);

    //mostrar datos

    //muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null ;   //si existe ponelo, sino mandale null

    IF($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if($id){
            //eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db,$query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../../imagenes/' . $propiedad['imagen']);
            // echo "/imagenes/${$propiedad['imagen']}";
            
            // exit;

            //eliminr la propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db,$query);

            if($resultado){
                header('Location: /admin/pro/index.php?resultado=3');
            }

        }

    }

    //incluye un template
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de bienes Raices</h1>
    <?php if( intval($resultado) === 1): ?> <!--pasar a int -->
        <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif(intval($resultado) === 2) :  ?>
            <p class="alerta exito">Anuncio actualizado correctamente</p>
            <?php elseif(intval($resultado) === 3) :  ?>
            <p class="alerta exito">Anuncio Eliminado correctamente</p>
    <?php  endif ?>
        
    
    <a href="/admin/pro/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!--Muestra los resultados -->
            <?php  while($propiedad = mysqli_fetch_assoc($resultadoConsulta)) :        ?>
            <tr>
                <td>    <?= $propiedad['id']?>  </td>
                <td>    <?= $propiedad['titulo']?>  </td>
                <td>    <img src="/imagenes/<?= $propiedad['imagen']?>" class="imagen-tabla"></td>
                <td>    $<?= $propiedad['precio']?> </td>
                <td>
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?= $propiedad['id'] ?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/admin/pro/actualizar.php?id=<?= $propiedad['id'] ?> " class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php  endwhile ?>
        </tbody>
    </table>
    
</main>


<?php 
    //cerrar la conexíon, es opcional pero mejor cerrarlo
    mysqli_close($db);
    incluirTemplate('footer');

?>