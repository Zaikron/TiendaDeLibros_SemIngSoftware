<?php include("./php/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Libros</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/estilos_globales.css">
</head>
<body>


    <! Cabecera >
    <header id="cabecera">
        <! Barra de busqueda >
        <div id="busqueda">
            <form action="">
                <button id="btn_buscar" class="btn_opciones_G">BUSCAR</button>
                <input id="campo_busqueda" class="campo_busqueda_G">
                <a href="./index.html">
                    <p id="logo_principal" class="btn_opciones_G">PAGINA PRINCIPAL</p>
                </a>
                <p id="bienvenido" class="btn_opciones_G">Bienvenido</p>
            </form>
        </div>
        <! Opciones de la pagina (inicio de sesion, registro) >
        <div id="opciones">
            <button id="btn_carrito" class="btn_opciones_G">CARRITO</button>
            <button id="btn_inicio" class="btn_opciones_G">Iniciar Sesion</button>
            <button id="btn_registro" class="btn_opciones_G">Registrarme</button>
            <button id="btn_cerrar" class="btn_opciones_G">Cerrar Sesion</button>
            <button id="btn_ordenes" class="btn_opciones_G">Ordenes</button>
            <button id="btn_libros" class="btn_opciones_G">Libros</button>
        </div>
    </header>

    <div id="imagen"></div>

    <! Contenido principal >
    <div id="contenido">
        <div id="libros"></div>
    </div>

    <! Pie de pagina >
    <footer id="pie"></footer>

    <script type="text/javascript" src="./scripts/botones.js"></script>
</body>
</html>