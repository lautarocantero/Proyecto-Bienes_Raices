<?php  
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?> 


    <main class="contenedor contenido-centrado">
        <h1>Nuestro Blog</h1>

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
                        <p>Escrito el <span>01/04/2021</span> Por: <span>Admin</span></p>
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
                        <p>Escrito el <span>01/04/2021</span> Por: <span>Admin</span></p>
                    </a>
                    <p>Maximizar el espacio en tu hogar con esta guia, aprende a combinar muebles
                        y colores para darle vida a tu espacio
                    </p>
                </div>
            </article>  <!--ARTICLE-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog3.webp" type="image/webp"> 
                        <source srcset="build/img/blog3.jpg" type="image/jepg"> 
                        <img src="/build/img/blog3.jpg" alt="Texto entrada blog">
                    </picture>
                </div>  <!--imagen-->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p>Escrito el <span>01/04/2021</span> Por: <span>Admin</span></p>
                    </a>
                    <p>Maximizar el espacio en tu hogar con esta guia, aprende a combinar muebles
                        y colores para darle vida a tu espacio
                    </p>
                </div>
            </article>  <!--ARTICLE-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog4.webp" type="image/webp"> 
                        <source srcset="build/img/blog4.jpg" type="image/jepg"> 
                        <img src="/build/img/blog4.jpg" alt="Texto entrada blog">
                    </picture>
                </div>  <!--imagen-->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p>Escrito el <span>01/04/2021</span> Por: <span>Admin</span></p>
                    </a>
                    <p>Maximizar el espacio en tu hogar con esta guia, aprende a combinar muebles
                        y colores para darle vida a tu espacio
                    </p>
                </div>
            </article>  <!--ARTICLE-->
    </main>

    <?php  incluirTemplate('footer'); ?> 

    