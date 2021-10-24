
//Variables
var btn_inicio_index = document.getElementById("btn_inicio");
var btn_carrito_index = document.getElementById("btn_carrito");
var btn_registro_index = document.getElementById("btn_registro");
var btn_cerrar_index = document.getElementById("btn_cerrar");
var btn_ordenes_index = document.getElementById("btn_ordenes");
var btn_libros_index = document.getElementById("btn_libros");

//Eventos
btn_inicio_index.onclick = function(){referencia('./iniciar.php')};
btn_carrito_index.onclick = function(){referencia('./carrito.html')};
btn_registro_index.onclick = function(){referencia('./registro.php')};
btn_cerrar_index.onclick = function(){referencia('./../index.php')};
btn_ordenes_index.onclick = function(){referencia('./ordenes.html')};
btn_libros_index.onclick = function(){referencia('./libros.html')};


//Funciones
function referencia(enlace){
    window.location.href = enlace;
}