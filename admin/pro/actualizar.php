<?php

    require '../../includes/funciones.php';
    
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /admin/pro/index.php');
    }

    //validar la url
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); //Ver que el id si sea un numero

    if(!$id){
        header('Location:/admin/pro/index.php');
    }


    //base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //consulta para obtener las propiedades
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db,$consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // echo '<pre>';
    // var_dump($propiedad);
    // echo '</pre>';

    //consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);

    //validar formulario 
    //arreglo con mensajes de errores
    $errores = [];
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $banios = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorid'];
    $imagenPropiedad = $propiedad['imagen'];


    //ejecutar el codigo luego de validarlo
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        // exit;

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
            $carpetaImagenes = '../../imagenes/';

              //crear carpeta
            if(!is_dir($carpetaImagenes)){   //ver si existe la carpeta
                mkdir($carpetaImagenes); //crear carpeta
            }

            $nombreImagen = ''; 

            //si ya existe la imagen
            if($imagen['name']){    //si la imagen existe la remplaza
                //eliminar la imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);   //eliminar un archivo

                // //generarle a la imagen un nombre unico
                $nombreImagen = md5( uniqid(rand(),true )) . ".jpg";

                // //subir la imagen       nombre del archivo, carpeta donde se coloca y nombre
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes  . $nombreImagen);
            }else{      //si yo no elegi ninguna imagen, todo sigue igual
                $nombreImagen = $propiedad['imagen'];
            }

            

            //insertar en la base de  datos
            $query = "UPDATE propiedades SET titulo = '${titulo}',precio = '${precio}',  
            imagen = '${nombreImagen}',descripcion = '${descripcion}',habitaciones = ${habitaciones},wc = ${banios},
            estacionamiento = ${estacionamiento},vendedorid = ${vendedorId} WHERE id = ${id} ";

            // echo $queryz;

            // exit;

            $resultado = mysqli_query($db,$query);

            if($resultado){
                //redirrecionar al usuario
                header('Location: /admin/pro/index.php?resultado=2');
            }
        }

    }

    
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin/pro/index.php" class="boton boton-verde">Volver </a>

    <?php foreach($errores as $error):   ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach ?>
                                                                        <!--HABILITAR ARCHIVOS-->
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
             <legend>Información general de nuestra propiedad</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?= $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?= $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg">

            <img src="/imagenes/<?= $imagenPropiedad ?>" alt="imagen- <?= $propiedad['titulo'] ?>" class="imagen-small">

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

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

    </form>

</main>


<?php 
    incluirTemplate('footer');

?>