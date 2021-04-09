<?php

    require '../../includes/funciones.php';
        
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /admin/pro/index.php');
    }

    //base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();

    //consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);

    //validar formulario 
    //arreglo con mensajes de errores
    $errores = [];
    $titulo = '';
    $precio = '';
        // $imagen = '';
    $descripcion = '';
    $habitaciones = '';
    $banios = '';
    $estacionamiento = '';
    $vendedorId = '';


    //ejecutar el codigo luego de validarlo
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($_FILES);
        // echo '</pre>';

        //sanitizar lo que se ingrese, es decir que no afecte negativamente mi slq
        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] ) ;
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] ) ;
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] ) ;
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] ) ;
        $banios = mysqli_real_escape_string( $db, $_POST['banios'] ) ;
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] ) ;
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] ) ;
        $creado = date('Y/m/d');

        // //asignar files a una variable
         $imagen = $_FILES['imagen'];
        // var_dump($imagen['name']);  //si esta vacio no se subio una imagen
        // exit;

        //validacion

        if(!$titulo){
            $errores[] = "Debes insertar un titulo";
        }

        if(!$precio){
            $errores[] = "Debes insertar un precio";
        }

        if( strlen($descripcion) < 50 ) {
            $errores[] = "Debes insertar una descripcion y debe contener más de 50 carácteres";
        }

        if(!$habitaciones){
            $errores[] = "El numero habitaciones de es obligatorio";
        }

        if(!$banios){
            $errores[] = "El numero de baños es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }

        if(!$vendedorId){
            $errores[] = "Elige un vendedor";
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[] = "La imagen es obligatoria";
        }

        //validar por tamaño   (10kb maximo)
        $medida = 1000 * 100;

        if($imagen['size'] > $medida){  
            $errores[] = "La imagen es muy pesada";
        }
        

        // echo '<pre>';
        // var_dump($errores);
        // echo '</pre>';
        // exit;

        //revisar que el array de errores esté vacio

        if(empty($errores)){

            //subida de archivos

            //crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){   //ver si existe la carpeta
                mkdir($carpetaImagenes); //crear carpeta
            }

            //generarle a la imagen un nombre unico
            $nombreImagen = md5( uniqid(rand(),true )) . ".jpg";

            //subir la imagen       nombre del archivo, carpeta donde se coloca y nombre
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes  . $nombreImagen);

            //insertar en la base de  datos
            $query = "INSERT INTO propiedades (titulo,precio, imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedorId)
            VALUES ( '$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$banios','$estacionamiento','$creado','$vendedorId')";
            // echo $query;
            $resultado = mysqli_query($db,$query);

            if($resultado){
                //redirrecionar al usuario
                header('Location: /admin/pro/index.php?resultado=1');
            }
        }

    }

    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear </h1>

    <a href="/admin/pro/index.php" class="boton boton-verde">Volver </a>

    <?php foreach($errores as $error):   ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach ?>
                                                                        <!--HABILITAR ARCHIVOS-->
    <form class="formulario" method="POST" action="/admin/pro/crear.php" enctype="multipart/form-data">
        <fieldset>
             <legend>Información general de nuestra propiedad</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?= $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?= $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"> <?= $descripcion?> </textarea>

        </fieldset>
        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Cantidad de Habitaciones" min="1" max="9" value="<?= $habitaciones ?>">

            <label for="banios">Baños:</label>
            <input type="number" id="banios" name="banios" placeholder="Ej: 3" min="1" max="9" value="<?= $banios ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?= $estacionamiento ?>">

        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor">
                <option value="">--Seleccione--</option>

                <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>  
                    value="<?= $vendedor['id'] ?>"> 
                    <?= $vendedor['nombre'] . " " . $vendedor['apellido'] ; ?> </option>

                <?php endwhile ?>

            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>


<?php 
    incluirTemplate('footer');

?>