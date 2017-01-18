<?php
require_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
$arreglo = $controlador->listarProblemasPropios($_SESSION["docente"]["usuario"]);
$codigo = "";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<td>" . $arreglo[$index]["nombreP"] . "</td>"
            . "<td>" . $arreglo[$index]["nombreC"] . "</td>"
            . "<td>" . $arreglo[$index]["tiempo_limite"] . "</td>"
            . "<td id='campo1".$index."'><div class='ufps-tooltip'>"
            . "<a onclick='verProblema(".$arreglo[$index]["id_problema"].",this)' id='".$index."' "
            . "href='#!'><image src='../../imagenes/lupaR.png'/></a><span class='ufps-tooltip-content-top'>Ver Problema</span></div></td>"
            . "<td id='campo".$index."'><div class='ufps-tooltip'>"
            . "<a onclick='eliminarProblema(".$arreglo[$index]["id_problema"].",this)' id='".$index."' "
            . "href='#!'><image src='../../imagenes/borrar.png'/></a><span class='ufps-tooltip-content-top'>Eliminar</span></div></td></tr>";
}
if (count($arreglo) == 0) {
    $codigo = '</tbody></table><br><image src="../../imagenes/lupaR.png"/>'
            . '<h3><b>No Se Encontraron Resultados</b></h3>';
}
echo $codigo;
session_start();
$_SESSION["docente"]["mostrar"]=$codigo;
header("Location:../eliminarProblemasPropios.php");