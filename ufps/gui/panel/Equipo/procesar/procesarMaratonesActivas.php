<?php
include_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
session_start();
$busquedas=array();
$tamaño=$_POST["cantidad_busquedas"];
for($i =0;$i<$tamaño;$i++){
    $busquedas[$i]=$_POST["busqueda_".$i];
}
$arreglo = $controlador->listarMaratonesActivasPorEquipo($_SESSION["equipo"]["usuario"],$busquedas);
$codigo = "";
for ($index = 0; $index < count($arreglo); $index++) {
    $fecha = date("Y-m-d");
    $img = "<td id='campo" . $index . "'><div class='ufps-tooltip'>"
            . "<a onclick='ingresarMaraton(" . $arreglo[$index]["id_evento"] . ",this)' id='" . $index . "' href='#!'>"
            . "<image src='../../imagenes/ingresar5.png'/></a>"
            . "<span class='ufps-tooltip-content-top'>Ingresar</span></div></td>";
    if ($arreglo[$index]["fecha_inicio"] > $fecha) {
        $img = "<td id='campo" . $index . "'><div class='ufps-tooltip'><image src='../../imagenes/ingresar6.png'/>"
                . "<span class='ufps-tooltip-content-top'>Todavia No</span></div></td>";
    }
    $codigo.="<tr><td>" .  $arreglo[$index]["id_evento"] . "</td><td>" . $arreglo[$index]["nombre"] . "</td><td>" . $arreglo[$index]["fecha_inicio"] . "</td>"
            . "<td>" . $arreglo[$index]["hora_inicio"] . "</td><td>" . $arreglo[$index]["fecha_fin"] . "</td><td>" . $arreglo[$index]["hora_fin"] . "</td>"
            . "<td id='campos" . $index . "'><div class='ufps-tooltip'>"
            . "<a onclick='eliminarSubscripcion(" . $arreglo[$index]["id_evento"] . ",this)' id='s" . $index . "'href='#!'>"
            . "<image src='../../imagenes/x.png'/></a>"
            . "<span class='ufps-tooltip-content-top'>Desuscribirse</span></div></td>"
            . "" . $img . ""
            . "</tr>";
}
echo $codigo;
