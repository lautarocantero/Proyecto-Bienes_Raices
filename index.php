<?php  
    declare(strict_types=1);    //mejor control de codigo
    require 'includes/funciones.php';
    incluirTemplate('header',$inicio = true);
?> 

    <main class="contenedor seccion">
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

    </main> <!--main-->

    <section class="section contenedor">
        <h2>Casas y Depas en Venta</h2>

        <?php
        $limite = 3;
        include 'includes/templates/anuncios.php' 
         ?>
        
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">
                Ver Todas
            </a>
        </div>
    </section> <!--section contenedor-->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="nosotros.php" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp"> 
                        <source srcset="build/img/blog1.jpg" type="image/jepg"> 
                        <img src="/build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>  <!--imagen-->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el <span>01/04/2021</span> Por: <span>Admin</span></p>
                    </a>
                    <p>Consejos para construir una terraza en el techo de tu casa con los
                        mejores materiales y ahorrando dinero
                    </p>
                </div>
            </article>  <!--ARTICLE-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp"> 
                        <source srcset="build/img/blog2.jpg" type="image/jepg"> 
                        <img src="/build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>  <!--imagen-->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el <span>01/04/2021</span> Por: <span>Admin</span></p>
                    </a>
                    <p>Maximizar el espacio en tu hogar con esta guia, aprende a combinar muebles
                        y colores para darle vida a tu espacio
                    </p>
                </div>
            </article>  <!--ARTICLE-->
        </section>  <!--blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una forma excelente, muy buena atención y la 
                    casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>-Lautaro Cantero</p>
            </div>
        </section>

    </div>

    <?php  incluirTemplate('footer'); ?> 

    