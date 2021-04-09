<?php  
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?> 


    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>


        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
        <div class="resumen-propiedad">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed quas 
                quibusdam odio quod minus velit, dolore dignissimos. Veniam nihil 
                omnis numquam quas. Non numquam accusantium quasi. Magnam quaerat 
                eos. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Dolorem culpa magnam voluptate eaque officia similique error, 
                sequi recusandae optio, ipsa beatae consequatur sit dignissimos 
                laborum qui accusantium! Beatae, nostrum quo. Lorem ipsum, dolor sit 
                amet consectetur adipisicing elit. At, cupiditate asperiores sint 
                inventore enim eaque perferendis? Ipsa eligendi animi, assumenda 
                cupiditate debitis.
            </p> 
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque 
                provident beatae aliquam aut atque magnam non. Voluptatem voluptates 
                expedita possimus debitis architecto ipsam, harum odit facilis, deleniti 
                amet inventore ex?
            </p>
        </div>
    </main>

    <?php  incluirTemplate('footer'); ?> 

   