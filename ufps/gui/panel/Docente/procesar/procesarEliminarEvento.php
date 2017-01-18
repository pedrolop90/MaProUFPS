<?php

require_once '../../../controlador/Controlador.php';
$id_evento=$_POST["id_evento"];
$controlador=new Controlador();
$mensaje="";
if($controlador->eliminarEvento($id_evento)){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;