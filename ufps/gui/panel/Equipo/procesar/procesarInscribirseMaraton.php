<?php

require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$id_evento=$_POST["id_evento"];
$mensaje="";
session_start();
if($controlador->inscribirseEvento($_SESSION["equipo"]["usuario"],$id_evento)){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;