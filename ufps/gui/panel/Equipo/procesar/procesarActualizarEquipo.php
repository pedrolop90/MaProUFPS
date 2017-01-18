<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$nombre=$_POST["nombre"];
$contraseña=$_POST["contraseña"];
$mensaje="";
session_start();
if($controlador->actualizarEquipo($_SESSION["equipo"]["usuario"], $nombre, $contraseña)){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;