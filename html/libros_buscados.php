<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Busqueda</title>
    
    <link rel="stylesheet" href="./../css/estilos_globales.css">
    <link rel="stylesheet" href="./../css/libros_buscados.css">
</head>
<body>
    <!-- Cabecera -->
    <header id="cabecera">
        <!-- Barra de busqueda -->
        <div id="busqueda">
            <form action="./libros_buscados.php" method="POST" id="iniciar">

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
            <table id="tabla_busqueda">
                <tbody>
                    <?php
                        $buscar = $_POST['buscar'];

                        $busquedaUsuario = "SELECT * FROM libro WHERE titulo LIKE '%$buscar%' OR autor LIKE '%$buscar%';";
                        $consulta = mysqli_query($conn, $busquedaUsuario);

                        while($datos = mysqli_fetch_array($consulta)){ ?>
                            <tr>
                                <td> <img src = <?php echo $datos['imagen'] ?> width="100" height="154"> </td>
                                <td> <b><?php echo $datos['titulo'] ?></b> </td>
                                <td> <?php echo $datos['autor'] ?> </td>
                                <td> <?php echo "$ " . $datos['precio_cliente']; ?> </td>
                                <td>
                                    <form action="./libro.php" method="POST" id="iniciar">
                                    <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                        <button id="btn_lib" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                    </form>
                                </td>
                            </tr>

                    <?php } ?>
                    
                </tbody>

            </table>

        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>