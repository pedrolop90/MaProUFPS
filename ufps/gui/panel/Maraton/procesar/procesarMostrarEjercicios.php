<?php

require_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
session_start();
$arreglo = $controlador->listarProblemasMaraton($_SESSION["maraton"]["usuario"]);
$codigo = "";
$codigo .= '<ul class="ufps-tabs">';
for ($index1 = 0, $letra1 = 65; $index1 < count($arreglo); $index1++, $letra1++) {
    $codigo.="<li><a class='ufps-tab-links' onclick='openTab(event," . $arreglo[$index1]["id_problema"] . ", \"tabs\")'>" . chr($letra1) . "</a></li>";
}
$codigo.='</ul>';
for ($index = 0, $letra = 65; $index < count($arreglo); $index++, $letra++) {
    $codigo.='<div id="' . $arreglo[$index]["id_problema"] . '" class="ufps-tab-content">'
            . '<h1 class="ufps-text-left">Nombre: ' . $arreglo[$index]["nombre"] . '</h1>'
            . '<p class="ufps-text-left">Tiempo Limite: ' . $arreglo[$index]["tiempo_limite"] . ' segundos</p>'
            . '<p class="ufps-text-center">Enunciado:<br>' . $arreglo[$index]["enunciado"] . '</p>'
            . '<p class="ufps-text-left">Entradas:<br>' . $arreglo[$index]["entrada"] . '</p>'
            . '<p class="ufps-text-left">Salidas:<br>' . $arreglo[$index]["salida"] . '</p>'
            . '</div>';
}
echo $codigo;
$_SESSION["maraton"]["mostrar"] = $codigo;
header("Location:../Problemas.php");
