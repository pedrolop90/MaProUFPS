<?php

include_once  '../../../controlador/Controlador.php';
$controlador = new Controlador();
session_start();
$busquedas=array();
$tamaño=$_POST["cantidad_busquedas"];
for($i =0;$i<$tamaño;$i++){
    $busquedas[$i]=$_POST["busqueda_".$i];
}
$arreglo = $controlador->listarMaratonesNoInscritas($_SESSION["equipo"]["usuario"],$busquedas);
$codigo = "";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr><td>".$arreglo[$index]["id_evento"]."</td><td>" . $arreglo[$index]["nombre"] . "</td><td>" . $arreglo[$index]["fecha_inicio"] . "</td>"
            . "<td>" . $arreglo[$index]["hora_inicio"] . "</td><td>" . $arreglo[$index]["fecha_fin"] . "</td><td>" . $arreglo[$index]["hora_fin"] . "</td>"
            . "<td id='campo" . $index . "'><div class='ufps-tooltip'>"
            . "<a onclick='inscribirseMaraton(".$arreglo[$index]["id_evento"].",this,true)' id='". $index ."' "
            . "class='' href='#!'><image src='../../imagenes/agregar1.png'/></a>"
            . "<span class='ufps-tooltip-content-top'>inscribirse</span></div></td></tr>";
}
echo $codigo;
