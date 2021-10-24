<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pago Tarjeta</title>
    <link rel="stylesheet" href="./../css/pago_tarjeta.css">
    <link rel="stylesheet" href="./../css/estilos_globales.css">
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
            <form action="./../php/pago.php" method="POST" id="registro">
                <label>No. Tarjeta</label>
                <input value="12345" type="text" name="tarjeta" autocomplete="off" required>
                <br>
                <label>Titular</label>
                <input value="Anthony" type="text" name="titular" autocomplete="off" required>
                <br>
                <label>Emisor</label>
                <input value="BBVA" type="text" name="emisor" autocomplete="off" required>
                <br>
                <label>Fecha Caducidad</label>
                <input value="2031-01-01" type="text" name="cad" autocomplete="off" required>
                <br>
                <label>CVV</label>
                <input value="567" type="text" name="cvv" autocomplete="off" required>
                <br>
                <select name="envio">
                    <option value="Mensajeria">Mensajeria</option>
                    <option value="Retiro">Retiro</option>
                </select>
                <br>

                <?php $idOrd = $_POST['idOrd']; ?>
                <input value=<?php echo $idOrd; ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">
                <button class="btn_inSesion" class="btn_opciones_G" type="submit">Pagar</button>
            </form>
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>