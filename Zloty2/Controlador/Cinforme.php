<?php
    require_once "../Modelo/conectar.php";
    // include "../Modelo/configuracion.php";
    require_once "../Modelo/mantenerSesion.php";
    require_once "../Modelo/Mproducto.php";
    $id = $_POST ['idUsuario'];
    $nombre = $_SESSION['nombre'];
    
        $producto = new ProductoModelo();//llamada al metodo constructor
        $matrizproducto = $producto -> get_productoid($id);

    require_once "../Vista/php/reporte.php";

?>