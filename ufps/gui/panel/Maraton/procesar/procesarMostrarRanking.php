<?php

include_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
session_start();
$arreglo = $controlador->listarEnviosDeEquipoPorEvento($_SESSION["maraton"]["usuario"]);
$codigo ="";
for ($index1 = 0; $index1 <$arreglo[0]["ejercicios"]; $index1++) {
    $codigo.="<th data-field='p" . ($index1 + 1) . "'>p" . ($index1 + 1) . "</th>";
}
$codigo.='</tr></thead><tbody>';
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr>"
            . "<td>" . ($index + 1) . "</td>"
            . "<td>" . $arreglo[$index]["nombre"] . "</td>"
            . "<td>" . $arreglo[$index]["resueltos"] . "</td>"
            . "<td>" . $arreglo[$index]["tiempo"] . "</td>";
    for ($index2 = 0; isset($arreglo[$index]["p" + ($index2 + 1)]); $index2++) {
        $codigo.="<td>" . $arreglo[$index]["p" + ($index2 + 1)] . "</td>";
    }
    $codigo .="</tr>";
}
$codigo.="</tbody>";
echo $codigo;
$_SESSION["maraton"]["mostrar"] = $codigo;
header("Location: ../maraton.php");

