<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ordenes</title>
    
    <link rel="stylesheet" href="./../css/estilos_globales.css">
    <link rel="stylesheet" href="./../css/ordenes.css">
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
            <div id="ordenes">
                <table id="tabla_busqueda">
                    <theader>
                        <th>_</th>
                        <th>Orden</th>
                        <th>Comprador</th>
                        <th>Importe</th>
                        <th>Cantidad</th>
                        <th>Cliente</th>
                        <th>Proveedor</th>
                        <th>En Carrito</th>

                        <th>Retiro</th>
                        <th>Mensaj.</th>
                        <th>Tarjeta</th>
                        <th>Cheque</th>
                    </theader>
                    <tbody>
                        <?php

                            $busquedaOrdenes = "SELECT * FROM orden;";
                            $consulta = mysqli_query($conn, $busquedaOrdenes);

                            while($datos = mysqli_fetch_array($consulta)){ 

                                $usu = $datos['id_usuario_fk'];
                                $busquedaUsu = "SELECT * FROM usuario WHERE id_usuario_pk = '$usu';";
                                $consultaUsu= mysqli_query($conn, $busquedaUsu);
                                $datosUsu = mysqli_fetch_array($consultaUsu);

                                $usu = $datos['id_usuario_fk'];
                                $busquedaUsu = "SELECT * FROM usuario WHERE id_usuario_pk = '$usu';";
                                $consultaUsu= mysqli_query($conn, $busquedaUsu);
                                $datosUsu = mysqli_fetch_array($consultaUsu);
                                
                                
                                ?>
    
                                <tr>
                                    <td width="40px">
                                        <form action="./ordenes.php" method="POST" id="iniciar">
                                            <input  value=<?php echo $datos['id_orden_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                            <button id="btn_lib_ord" class="btn_opciones_G" type="submit">Pedidos</button>
                                        </form>
                                    </td>

                                    <td width="40px"> <?php echo $datos['id_orden_pk'] ?> </td>
                                    <td width="120px"> <?php echo $datosUsu['nombre'] ?> </td>
                                    <td width="80px"> <?php echo $datos['importe_total'] ?> </td>
                                    <td width="40px"> <?php echo $datos['cantidad_total'] ?> </td>
                                    <td width="40px"> <?php echo $datos['compra_normal'] ?> </td>
                                    <td width="40px"> <?php echo $datos['compra_proveedor'] ?> </td>
                                    <td width="40px"> <?php echo $datos['carrito'] ?> </td>


                                    <td width="40px"> <?php echo $datos['id_envio_retiro_fk'] ?> </td>
                                    <td width="40px"> <?php echo $datos['id_envio_mensj_fk'] ?> </td>
                                    <td width="40px"> <?php echo $datos['id_pago_tarjeta_fk'] ?> </td>
                                    <td width="40px"> <?php echo $datos['id_pago_cheque_fk'] ?> </td>

                                </tr>

                        <?php } ?>
                        
                    </tbody>

                </table>
            </div>
            <div id="pedidos">

                <table id="tabla_busqueda">
                    <theader>
                        <th>No Pedido</th>
                        <th>Importe</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                    </theader>
                    <tbody>
                        <?php

                            $orden = $_POST['id'];

                            $busquedaPedidos = "SELECT * FROM pedido WHERE id_orden_fk = '$orden';";
                            $consulta = mysqli_query($conn, $busquedaPedidos);

                            while($datos = mysqli_fetch_array($consulta)){ 
                            $libro = $datos['id_libro_fk'];
                            $busquedaLibro = "SELECT * FROM libro WHERE id_libro_pk = '$libro';";
                            $consultaLibro = mysqli_query($conn, $busquedaLibro);
                            $datosLibro = mysqli_fetch_array($consultaLibro);

                            ?>
                                <tr>
                                    <td width="40px"> <?php echo $datos['id_pedido_pk'] ?> </td>
                                    <td width="80px"> <?php echo $datos['importe'] ?> </td>
                                    <td width="80px"> <?php echo $datosLibro['titulo'] ?> </td>
                                    <td width="80px"> <img src = <?php echo $datosLibro['imagen'] ?> width="35" height="50"> </td>

                                </tr>

                        <?php } ?>
                        
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>


