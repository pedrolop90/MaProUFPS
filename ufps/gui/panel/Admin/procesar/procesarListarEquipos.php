<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$arreglo=$controlador->listarEquipos();
$codigo="";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr><td>".$arreglo[$index]["usuario"]."</td><td>".$arreglo[$index]["nombre"]."</td>"
            . "<td id='campo".$index."'><div class='ufps-tooltip'>"
            . "<a onclick='eliminarEquipo(".$arreglo[$index]["id_equipo"].",this)' id='".$index."' "
            . "href='#!'><image src='../../imagenes/borrar.png'/></a><span class='ufps-tooltip-content-top'>Eliminar</span></div></td></tr>";
}
if (count($arreglo) == 0) {
    $codigo = '</tbody></table><br><image src="../../imagenes/lupaR.png"/>'
            . '<h3><b>No Se Encontraron Resultados</b></h3>';
}
echo $codigo;
session_start();
$_SESSION["admin"]["mostrar"]=$codigo;
header("Location:../eliminarEquipo.php");