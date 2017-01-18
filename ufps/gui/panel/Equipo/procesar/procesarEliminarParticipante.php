<?php
require_once '../../../controlador/Controlador.php';
$id_participante=$_POST["id_participante"];
$controlador=new Controlador();
$mensaje="";
if($controlador->eliminarParticipante($id_participante)){
    $mensaje="1";
}else{
    $mensaje="datos incorrectos";
}
echo $mensaje;