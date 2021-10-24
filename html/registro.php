<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrarme</title>
    <link rel="stylesheet" href="./../css/registro.css">
    <link rel="stylesheet" href="./../css/estilos_globales.css">
</head>
<body>

    <!-- Cabecera -->
    <header id="cabecera">
        <!-- Barra de busqueda -->
        <div id="busqueda">
            <form action="./html/libros_buscados.php" method="POST" id="iniciar">

                <button id="btn_buscar" class="btn_opciones_G" type="submit">BUSCAR</button>
                <input  value="" type="text" name="buscar" autocomplete="off" id="campo_busqueda" class="campo_busqueda_G">
                <a href="./../index.php">
                    <p id="logo_principal" class="btn_opciones_G">PAGINA PRINCIPAL</p>
                </a>
                <p id="bienvenido" class="btn_opciones_G">Bienvenido 
                    <?php  
                        error_reporting(0); 
                        $nom = $_SESSION['nombre']; 
                        if(!($nom == null || $nom == '')){
                            echo $_SESSION['nombre'];
                        }
                    ?>
                </p>
            </form>
        </div>
        <!-- Opciones de la pagina (inicio de sesion, registro) -->
        <div id="opciones">
            <form action="./carrito.php">
                 <button id="btn_carrito" class="btn_opciones_G">CARRITO</button>
            </form>
            <button id="btn_inicio" class="btn_opciones_G">Iniciar Sesion</button>
            <button id="btn_registro" class="btn_opciones_G">Registrarme</button>
            <form action="./../php/destruir.php">
                <button id="btn_cerrar" class="btn_opciones_G">Cerrar Sesion</button>
            </form>
            <button id="btn_ordenes" class="btn_opciones_G">Ordenes</button>
            <button id="btn_libros" class="btn_opciones_G">Libros</button>
        </div>
    </header>

    <!-- Contenido principal -->
    <div id="contenido">
        <div id="libros">
            <form action="./../php/registro.php" method="POST" id="registro">
                <label>Nombre</label>
                <input value="" type="text" name="nombre" autocomplete="off" required>
                <br>
                <label>Usuario</label>
                <input value="" type="text" name="usuario" autocomplete="off" required>
                <br>
                <label>Telefono</label>
                <input value="" type="text" name="telefono" autocomplete="off">
                <br>
                <label>Correo</label>
                <input value="" type="email" name="correo" autocomplete="off" required>
                <br>
                <label>Domicilio</label>
                <input value="" type="text" name="domicilio" autocomplete="off" required>
                <br>
                <label>CP</label>
                <input value="" type="text" name="cp" autocomplete="off" required>
                <br>
                <label>Contraseña</label>
                <input value="" type="password" name="pass" required>
                <br>

                <button class="btn_inSesion" class="btn_opciones_G" type="submit">Registrarme</button>
            </form>
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>
    
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>