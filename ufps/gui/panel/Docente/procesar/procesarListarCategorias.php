<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$arreglo=$controlador->listarCategorias();
$codigo="";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<option id='".$arreglo[$index]["id_categoria"]."' value='".$arreglo[$index]["id_categoria"]."'>".$arreglo[$index]["nombre"]." - ".$arreglo[$index]["descripcion"]."</option>";
}
echo $codigo;
session_start();
$_SESSION["docente"]["mostrar"]=$codigo;
header("Location:../registraEjercicio.php");