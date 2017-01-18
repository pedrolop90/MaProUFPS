<?php
require_once '../../../controlador/Controlador.php';
$usuario=$_POST["nombre_usuario"];
$contraseña=$_POST["contraseña"];
$controlador=new Controlador();
$mensaje="";
if($controlador->iniciarEquipo($usuario, $contraseña)){
    $mensaje="1";
    session_start();
    $_SESSION["equipo"]=array("usuario"=>$usuario,"estado"=>true,"mostrar"=>-1,"cantidad"=>0);
}else{
    $mensaje="datos incorrectos";
}
echo $mensaje;