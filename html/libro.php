<?php 
    include("./../php/conexion.php");
    session_start();

    $id = $_POST['id'];

    $busquedaUsuario = "SELECT * FROM libro WHERE id_libro_pk = '$id';";
    $consulta = mysqli_query($conn, $busquedaUsuario);
    $datos = mysqli_fetch_array($consulta);

    $genero = $datos["genero"];
    //$busquedaGenero = "SELECT * FROM libro WHERE genero = '$genero' LIMIT 3";
    $busquedaGenero = "SELECT * FROM libro ORDER BY RAND() LIMIT 3";
    $consulta2 = mysqli_query($conn, $busquedaGenero);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Libro</title>
    <link rel="stylesheet" href="./../css/estilos_globales.css">
    <link rel="stylesheet" href="./../css/libro.css">
    
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

    <! Contenido principal >
    <div id="contenido_libro">
        <div id="libro_todo">
            <div id="imagen_libro">
                <td id="img"><img src = <?php echo $datos['imagen'] ?> ></td>
            </div>
            <div id="informacion">
                <p id="titulo"> <?php echo $datos['titulo'] ?> </p>
                <p class="info"><b>Autor: </b><?php echo $datos['autor'] ?> </p>
                <p class="info"><b>Editorial: </b><?php echo $datos['editorial'] ?> </p>
                <p class="info"><b>Edicion: </b><?php echo $datos['edicion'] ?> </p>
                <p class="info"><b>Paginas: </b><?php echo $datos['paginas'] ?> </p>
                <p class="info"><b>Publicacion: </b><?php echo $datos['publicacion'] ?> </p>
                <p class="info"><b>Genero: </b><?php echo $datos['genero'] ?> </p>
                <p class="info"><b>Disponibles: </b><?php echo $datos['disponibles'] ?> </p>
            </div>
            <div id="pago">
                <p id="precio">Precio: <?php echo "$ " . $datos['precio_cliente']; ?> </p>
                <form action="./../php/agregarCarrito.php" method="POST" id="iniciar">
                    <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="idlib" autocomplete="off" class="ocultos">
                    <input  value=<?php echo $_SESSION['id_usuario_pk'] ?> type="text" name="idusu" autocomplete="off" class="ocultos">
                    <button id="agregar_carrito" class="btn_opciones_G">Añadir al Carrito</button>
                    <button id="compra_proveedor" class="btn_opciones_G">Comprar a Proveedor</button>
                </form>
                
            </div>
            <div id="recomendacion">
            <h2>Recomendaciones</h2><br>
                <table>
                    <tbody id="tabla_rec">
                        <?php
                            while($recomendaciones = mysqli_fetch_array($consulta2)){ ?>
                                <td> <img src = <?php echo $recomendaciones['imagen'] ?> width="110" height="160"> </td>
                                <td>
                                    <form action="./libro.php" method="POST" id="iniciar">
                                        <input  value=<?php echo $recomendaciones['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class="ocultos">
                                        <button class="c_btn_rec" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                    </form>
                                </td>
                                        
                        <?php } ?>
                    </tbody>
                    
                </table>

            </div>
        </div>

    </div>

    <! Pie de pagina >
    <footer id="pie"></footer>

    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>