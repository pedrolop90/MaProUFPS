<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$arreglo=$controlador->listarProblemas();
$codigo="";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr><td>".$arreglo[$index]["nombreP"]."</td>"
            . "<td>".$arreglo[$index]["nombreC"]."</td>"
            ."<td>".$arreglo[$index]["tiempo_limite"]."</td>"
            ."<td>".$arreglo[$index]["id_docente"]."</td>"
            ."<td id='campos".$index."'><div class='ufps-tooltip'>"
            . "<a onclick='verProblema(".$arreglo[$index]["id_problema"].",this)' id='s".$index."' "
            . "href='#modal1' ><image src='../../imagenes/lupaR.png'/></a><span class='ufps-tooltip-content-top'>Ver Problema</span></div></td>"
            . "<td id='campo".$index."'><div class='ufps-tooltip'>"
            . "<a onclick='asginarProblemaEvento(this)' id='".$arreglo[$index]["id_problema"]."' href='#!'>"
            . "<image src='../../imagenes/agregar1.png'/></a><span class='ufps-tooltip-content-top'>Agregar</span></div></td></tr>";
}
if (count($arreglo) == 0) {
    $codigo = '</tbody></table><br><image src="../../imagenes/lupaR.png"/>'
            . '<h3><b>No Se Encontraron Resultados</b></h3>';
}
echo $codigo;
session_start();
$_SESSION["docente"]["mostrar"]=$codigo;
header("Location:../registrarEvento.php");