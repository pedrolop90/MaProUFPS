<?php

require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$usuario=$_POST["usuario"];
$nombre=$_POST["nombre"];
$contraseña=$_POST["contraseña"];
$mensaje="";
if($controlador->registrarEquipo($usuario, $nombre, $contraseña)){
    $mensaje="1";
    session_start();
    $_SESSION["equipo"]=array("usuario"=>$usuario,"estado"=>true,"mostrar"=>-1,"arreglo"=>null);
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;