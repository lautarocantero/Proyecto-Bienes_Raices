<?php  
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?> 


    <main class="contenedor">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen-nosotros">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp"> 
                    <source srcset="build/img/nosotros.jpg" type="image/jepg"> 
                    <img loading="lazy" src="/build/img/nosotros.jpg" alt="Nosotros">
                </picture>
            </div>  <!--imagen nosotros-->
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed quas 
                    quibusdam odio quod minus velit, dolore dignissimos. Veniam nihil 
                    omnis numquam quas. Non numquam accusantium quasi. Magnam quaerat 
                    eos. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Dolorem culpa magnam voluptate eaque officia similique error, 
                    sequi recusandae optio, ipsa beatae consequatur sit dignissimos 
                    laborum qui accusantium! Beatae, nostrum quo. Lorem ipsum, dolor sit 
                    amet consectetur adipisicing elit. At, cupiditate asperiores sint 
                    inventore enim eaque perferendis? Ipsa eligendi animi, assumenda 
                    cupiditate debitis.</p>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique 
                    odit totam sit, esse doloribus ratione? Repudiandae nihil accusamus 
                    saepe numquam repellendus, quisquam officiis vero ullam, iure 
                    dignissimos quibusdam. Earum, recusandae!</p>

            </div>


        </div>  <!--nosotros-->
    </main>

        <section class="contenedor seccion">
            <h1>Más sobre Nosotros </h1>
            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, et, asperiores rerum vitae 
                        pariatur doloremque atque consequatur tempora eveniet temporibus laboriosam sunt fugit 
                        aspernatur quibusdam cupiditate, non quis debitis quisquam!</p>
                </div>  <!--icono-->

                <div class="icono">
                    <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, et, asperiores rerum vitae 
                        pariatur doloremque atque consequatur tempora eveniet temporibus laboriosam sunt fugit 
                        aspernatur quibusdam cupiditate, non quis debitis quisquam!</p>
                </div>  <!--icono-->

                <div class="icono">
                    <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                    <h3>Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, et, asperiores rerum vitae 
                        pariatur doloremque atque consequatur tempora eveniet temporibus laboriosam sunt fugit 
                        aspernatur quibusdam cupiditate, non quis debitis quisquam!</p>
                </div>  <!--icono-->
            </div> <!--iconos nosotros-->
        </section>
    

        <?php  incluirTemplate('footer'); ?> 

    