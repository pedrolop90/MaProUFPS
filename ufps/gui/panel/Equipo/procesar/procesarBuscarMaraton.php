<?php

require_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
$consulta = $_POST["busqueda"];
session_start();
$busquedas=array();
$tamaño=$_POST["cantidad_busquedas"];
for($i =0;$i<$tamaño;$i++){
    $busquedas[$i]=$_POST["busqueda_".$i];
}
$arreglo = $controlador->buscarMaraton($_SESSION["equipo"]["usuario"], $consulta,$busquedas);
$codigo = '';
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr><td>" . $arreglo[$index]["id_evento"] . "</td><td>" . $arreglo[$index]["profesor"] . "</td>"
            . "<td>" . $arreglo[$index]["nombre"] . "</td>"
            . "<td>" . $arreglo[$index]["fecha_inicio"] . "</td>"
            . "<td>" . $arreglo[$index]["hora_inicio"] . "</td><td>" . $arreglo[$index]["fecha_fin"] . "</td><td>" . $arreglo[$index]["hora_fin"] . "</td>"
            . "<td id='campo" . $arreglo[$index]["id_evento"] . "'><div class='ufps-tooltip'>";
    if ($arreglo[$index]["estado"] != null) {
        $codigo.= "<a onclick='ingresarMaraton(" . $arreglo[$index]["id_evento"] . ",this)' id='" . $index . "' href='#!'>"
                . "<image src='../../imagenes/ingresar5.png'/></a>"
                . "<span class='ufps-tooltip-content-top'>Ingresar</span></div></td>";
    } else {
        $fecha = date("Y-m-d");
        if ($arreglo[$index]["fecha_fin"] < $fecha) {
            $codigo.= "<a onclick='verReporteMaraton(" . $arreglo[$index]["id_evento"] . ",this)' id='" . $index . "' "
                    . "class='' href='#!'><image src='../../imagenes/reporte2.png'/></a>"
                    . "<span class='ufps-tooltip-content-top'>Reporte</span></div></td></tr>";
        } else {
            $codigo.= "<a onclick='inscribirseMaraton(" . $arreglo[$index]["id_evento"] . ",this)' id='" . $index . "' "
                    . "class='' href='#!'><image src='../../imagenes/agregar1.png'/></a>"
                    . "<span class='ufps-tooltip-content-top'>Inscribirse</span></div></td></tr>";
        }
    }
}
echo $codigo;
