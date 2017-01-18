<?php
require_once '../../../controlador/Controlador.php';
$ejercicio=$_POST["ejercicio"];
$solucion=$_POST["solucion"];
$controlador=new Controlador();
$mensaje="";
session_start();
if($controlador->enviarEjercicio($_SESSION["maraton"]["usuario"],$_SESSION["equipo"]["usuario"],$ejercicio, $solucion)){
    $mensaje="1";
}else{
    $mensaje="datos incorrectos";
}
echo $mensaje;