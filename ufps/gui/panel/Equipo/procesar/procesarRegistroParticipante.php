<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$codigo=$_POST["codigo"];
$correo=$_POST["correo"];
$mensaje="";
session_start();
if($controlador->registrarParticipante($nombre, $apellido, $codigo,$correo,$_SESSION["equipo"]["usuario"])){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;