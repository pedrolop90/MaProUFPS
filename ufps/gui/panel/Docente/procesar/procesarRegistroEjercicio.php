<?php
require_once '../../../controlador/Controlador.php';
$nombre=$_POST["nombre"];
$categoria=$_POST["categoria"];
$tiempo=$_POST["tiempo"];
$entrada=$_POST["entrada"];
$salida=$_POST["salida"];
$enunciado=$_POST["enunciado"];
$entradasT=$_POST["entradasT"];
$salidasT=$_POST["salidasT"];
$controlador=new Controlador();
$mensaje="";
session_start();
if($controlador->registrarEjercicio($_SESSION["docente"]["usuario"],$nombre,$categoria,$tiempo,$entrada,$salida,$enunciado,$entradasT,$salidasT)){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;