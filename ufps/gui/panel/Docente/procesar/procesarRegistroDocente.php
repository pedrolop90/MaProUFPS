<?php

require_once '../../../controlador/Controlador.php';
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];
$controlador=new Controlador();
$mensaje="";
if($controlador->registrarDocente($nombre, $apellido, $usuario, $correo, $contraseña)){
    $mensaje="1";
    session_start();
    $_SESSION["docente"]=array("usuario"=>$usuario,"estado"=>true,"mostrar"=>-1);
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;