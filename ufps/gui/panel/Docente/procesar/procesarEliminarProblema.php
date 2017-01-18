<?php

require_once '../../../controlador/Controlador.php';
$id_problema=$_POST["id_problema"];
$controlador=new Controlador();
$mensaje="";
if($controlador->eliminarProblema($id_problema)){
    $mensaje="1";
}else{
    $mensaje="hubo un problema con los datos introducidos";
}
echo $mensaje;
