<?php
require_once '../../../controlador/Controlador.php';
$id_evento=$_POST["id_evento"];
$controlador=new Controlador();
$mensaje="";
session_start();
if($controlador->eliminarSubcripcionMaraton($_SESSION["equipo"]["usuario"],$id_evento)){
    $mensaje="1";
}else{
    $mensaje="datos incorrectos";
}
echo $mensaje;