<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$codigo=$_POST["codigo"];
$correo=$_POST["correo"];
$id=$_POST["id"];
$mensaje="";
if($controlador->actualizarParticipante($nombre, $apellido, $codigo,$correo,$id)){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;