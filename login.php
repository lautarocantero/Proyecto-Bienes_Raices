<?php 

    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

    //autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        //sanitizacion y validacin del mail
        $email = mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );   //VALIDAR EL EMAIL
        $password = mysqli_real_escape_string($db,$_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio";
        }
        
        if(empty($errores)){
            //revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db,$query);

            if($resultado->num_rows){
                //revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);  //traer todos los datos del usuario

                //verificar si el password es correcto
                $auth = password_verify($password,$usuario['password']); //compara ambos passwords
    
                if($auth){
                    //usuario autenticado
                    session_start();    //INICIAR SESION DEL USUARIO

                    //llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email']; 
                    $_SESSION['login'] = true; 

                    header('Location:/admin/pro/index.php');

                }else{
                    $errores[] = "El password es incorrecto";
                }
                
            }else{
                $errores[] ="El usuario no existe";
            }

        }

    }

    //incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <p>Usuario = admin@gmail.com</p>
    <p>Contraseña = 123456</p>
    <main class="contenedor">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error) :  ?>
            <div class="alerta error">
                <?= $error ?>
            </div>
        <?php endforeach; ?>

        <form action="" class="formulario contenido-centrado" method="POST">
            <fieldset>
                <legend>Email y Password </legend>
                    
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu password" required>

            </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton-verde">
        </form>


    </main>

<?php 
    incluirTemplate('footer');

?>
    