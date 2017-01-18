<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
session_start();
$arreglo=$controlador->CargarProblemasMaraton($_SESSION["maraton"]["usuario"]);
$codigo="";
for ($index = 0,$letra=65; $index < count($arreglo); $index++,$letra++) {
    $codigo.="<option id='".$arreglo[$index]["id_problema"]."' >".chr($letra)."</option>";
}
echo $codigo;
$_SESSION["maraton"]["mostrar"]=$codigo;
header("Location:../enviarEjercicio.php");