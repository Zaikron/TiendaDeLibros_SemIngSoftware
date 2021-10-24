<?php include("./php/conexion.php") ?>
<?php session_start(); 

    $masVendidos = "SELECT id_libro_fk, SUM( importe ) AS total
                    FROM  pedido
                    GROUP BY id_libro_fk
                    ORDER BY total DESC LIMIT 3;";
    $consulta2 = mysqli_query($conn, $masVendidos);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Libros</title>
    
    <link rel="stylesheet" href="./css/estilos_globales.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>

    <!-- Cabecera -->
    <header id="cabecera">
        <!-- Barra de busqueda -->
        <div id="busqueda">
            <form action="./html/libros_buscados.php" method="POST" id="iniciar">

                <button id="btn_buscar" class="btn_opciones_G" type="submit">BUSCAR</button>
                <input  value="" type="text" name="buscar" autocomplete="off" id="campo_busqueda" class="campo_busqueda_G">
                <a href="./index.php">
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
            <form action="./html/carrito.php">
                 <button id="btn_carrito" class="btn_opciones_G">CARRITO</button>
            </form>
            <button id="btn_inicio" class="btn_opciones_G">Iniciar Sesion</button>
            <button id="btn_registro" class="btn_opciones_G">Registrarme</button>
            <form action="./php/destruir.php">
                <button id="btn_cerrar" class="btn_opciones_G">Cerrar Sesion</button>
            </form>
            <button id="btn_ordenes" class="btn_opciones_G">Ordenes</button>
            <button id="btn_libros" class="btn_opciones_G">Libros</button>
        </div>
    </header>

    <div id="imagen"></div>

    <!-- Contenido principal -->
    <div id="contenido">
        <div id="libros">
            <h2>Los Mas Vendidos</h2>
            <br>
            <table>
                <tbody id="tabla_rec">
                    <?php

                        while($recomendaciones = mysqli_fetch_array($consulta2)){ 
                            $idLib = $recomendaciones['id_libro_fk'];
                            $conLibro = "SELECT * FROM libro WHERE id_libro_pk = '$idLib';";
                            $consulta3 = mysqli_query($conn, $conLibro);
                            $topVendidos = mysqli_fetch_array($consulta3)
                            
                            ?>
                            <td width="100px"> <img src = <?php echo "./php/" . $topVendidos['imagen']; ?> width="110" height="160"> </td>
                            <td width="100px"> <?php echo $topVendidos['titulo'] ?> </td>
                            <td width="100px">
                                <form action="./html/libro.php" method="POST" id="iniciar">
                                    <input  value=<?php echo $topVendidos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class="ocultos">
                                    <button class="c_btn_rec" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                </form>
                            </td>
                                    
                    <?php } ?>
                </tbody>
                
            </table>
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>

    <script type="text/javascript" src="./scripts/botones.js"></script>
</body>
</html>