<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$id_problema=$_POST["id_problema"];
$arreglo=$controlador->verProblema($id_problema);
echo $arreglo["nombre"]."____".$arreglo["enunciado"]."____".$arreglo["entrada"]."____".$arreglo["salida"]."____".$arreglo["entradasT"]."____".$arreglo["salidasT"];
