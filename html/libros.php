<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    
    <link rel="stylesheet" href="./../css/estilos_globales.css">
    <link rel="stylesheet" href="./../css/libros.css">
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
            <div id="consulta">
                <table id="tabla_busqueda">
                    <tbody>
                        <?php

                            $busquedaLibros = "SELECT * FROM libro;";
                            $consulta = mysqli_query($conn, $busquedaLibros);

                            while($datos = mysqli_fetch_array($consulta)){ ?>
                                <tr>
                                    <td> <img src = <?php echo $datos['imagen'] ?> width="50" height="75"> </td>
                                    <td> <b><?php echo $datos['titulo'] ?></b> </td>
                                    <td> <?php echo $datos['autor'] ?> </td>
                                    <td> <?php echo $datos['editorial'] ?> </td>
                                    <td width="40px"> <?php echo $datos['edicion'] ?> </td>
                                    <td width="120px"> <?php echo $datos['publicacion'] ?> </td>
                                    <td width="120px"> <?php echo $datos['genero'] ?> </td>
                                    <td>
                                        <form action="./libro.php" method="POST" id="iniciar">
                                            <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                            <button id="btn_libs" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="./../php/eliminarLibro.php" method="POST" id="iniciar">
                                            <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                            <button id="btn_libs_red" class="btn_opciones_G" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>

                        <?php } ?>
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="centrar">
        <div id="agregar">
        <form action="./../php/insertarLibro.php" method="POST"  class="forms">
            <label>Titulo</label>
            <input  value="" type="text" name="titulo" autocomplete="off" require>
            <br>
            <label>Autor</label>
            <input  value="" type="text" name="autor" autocomplete="off" require>
            <br>
            <label>Editorial</label>
            <input  value="" type="text" name="editorial" autocomplete="off" require>
            <br>
            <label>Edicion</label>
            <input  value="" type="text" name="edicion" autocomplete="off" require>
            <br>
            <label>Paginas</label>
            <input  value="" type="text" name="paginas" autocomplete="off" require>
            <br>
            <label>Publicacion</label>
            <input  value="2021-01-01" type="text" name="publicacion" autocomplete="off" require>
            <br>
            <label>Genero</label>
            <input  value="" type="text" name="genero" autocomplete="off" require>
            <br>
            <label>Precio al cliente</label>
            <input  value="" type="text" name="precioc" autocomplete="off" require>
            <br>
            <label>Precio al proveedor</label>
            <input  value="" type="text" name="preciop" autocomplete="off" require>
            <br>
            <label>Disponibles</label>
            <input  value="" type="text" name="disponibles" autocomplete="off" require>
            <br>
            <label>Imagen(Enlace)</label>
            <input  value="./../Recursos/italiano.jpg" type="text" name="imagen" autocomplete="off" require>
            <br>

            <button  class="btn_forms" id="btn_libs_red" class="btn_opciones_G" type="submit">Agregar Libro</button>
        </form>
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>