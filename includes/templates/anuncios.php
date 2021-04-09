<?php
    //importar la conexíon
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();
    //consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //leer los resultados
    $resultado = mysqli_query($db,$query);

    //mostrar


?>

<div class="contenedor-anuncios">
            <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <div class="anuncio">
                    <img loading="lazy" src="/imagenes/<?= $propiedad['imagen']; ?>" alt="anuncio uno">
                <div class="contenido-anuncio">
                    <h3><?= $propiedad['titulo'] ?></h3>
                    <p><?= $propiedad['descripcion'] ?></p>
                    <p class="precio">$<?= $propiedad['precio'] ?></p>
                    <ul  class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="baños">
                            <p><?= $propiedad['wc'] ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="cochera">
                            <p><?= $propiedad['estacionamiento'] ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="camas">
                            <p><?= $propiedad['habitaciones'] ?></p>
                        </li>
                    </ul>   <!--iconos caracteristicas-->

                    <a href="anuncio.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>

                </div> <!--contenido anuncio-->
            </div>  <!--anuncio-->
            <?php endwhile ?>

        </div> <!--anuncios-->

<?php 

    //cerrar la conexíon
    mysqli_close($db);
?>