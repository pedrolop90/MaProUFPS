<?php
include_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
$arreglo = $controlador->listarRankingGeneral();
$codigo ="";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr>"
            . "<td>" . ($index + 1) . "</td>"
            . "<td>" . $arreglo[$index]["nombre"] . "</td>"
            . "<td>" . $arreglo[$index]["aceptados"] . "</td>"
            . "<td>" . $arreglo[$index]["enviados"] . "</td>"
            . "<td>" . $arreglo[$index]["tiempo"] . "</td>"
            ."</tr>";
}
$codigo.="</tbody></table>";
if (count($arreglo) == 0) {
    $codigo .= '<br><image src="../../imagenes/lupaR.png"/>'
            . '<h3><b>No Se Encontraron Resultados</b></h3>';
}
session_start();
$_SESSION["usuario"]["mostrar"] = $codigo;
header("Location: ../../visualizar/visualizarRankingGeneral.php");
