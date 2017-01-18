<?php
require_once '../../../controlador/Controlador.php';
$usuario=$_POST["usuario"];
$controlador=new Controlador();
$mensaje="";
if($controlador->eliminarEquipo($usuario)){
    $mensaje="1";
}else{
    $mensaje="datos incorrectos";
}
echo $mensaje;