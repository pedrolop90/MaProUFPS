<?php
require_once '../../../controlador/Controlador.php';
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];
$controlador=new Controlador();
$mensaje="";
session_start();
if($controlador->actualizarDocente($nombre, $apellido, $correo, $contraseña,$_SESSION["docente"]["usuario"])){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;