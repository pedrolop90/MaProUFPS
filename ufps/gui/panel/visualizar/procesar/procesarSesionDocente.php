<?php
require_once '../../../controlador/Controlador.php';
$usuario=$_POST["nombre_usuario"];
$contraseña=$_POST["contraseña"];
$controlador=new Controlador();
$mensaje="";
if($controlador->iniciarDocente($usuario, $contraseña)){
    $mensaje="1";
    session_start();
    $_SESSION["docente"]=array("usuario"=>$usuario,"estado"=>true,"mostrar"=>-1);
}else{
    $mensaje="datos incorrectos";
}
echo $mensaje;