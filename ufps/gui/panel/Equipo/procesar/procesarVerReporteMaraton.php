<?php

include_once '../../../controlador/Controlador.php';
require_once '../../TCPDF/tcpdf.php';
$controlador = new Controlador();
session_start();
if ($_SESSION["equipo"]["cantidad"] == 0) {
    $_SESSION["equipo"]["cantidad"] = $_POST["id_evento"];
} else {
    $arreglo = $controlador->listarEnviosDeEquipoPorEvento($_SESSION["equipo"]["cantidad"]);
    $codigo = '
      <link type="text/css" rel="stylesheet" href="../../../lib/css/ufps.min.css"/>
      <link type="text/css" rel="stylesheet" href="../../../lib/css/estilo.css"/>
                <div class="ufps-container">
                    <div class="ufps-panel">
                        <h1 class=" ufps-center ufps-text-center">Ranking Maraton</h1>
                        <table class="ufps-table ufps-table-inserted ufps-text-center">
                            <thead>
                                <tr>
                                    <th data-field="posicion">Posicion</th>
                                    <th data-field="nombre">Nombre</th>
                                    <th data-field="resueltos">Resueltos</th>
                                    <th data-field="tiempo">Tiempo</th>';
    if (count($arreglo) > 0) {
        for ($index1 = 0; $index1 < $arreglo[0]["ejercicios"]; $index1++) {
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
        $codigo.='</tbody></table>';
    } else {
        $codigo.='</tr></thead></table><br><image src="../../../imagenes/lupaR.png">'
                . '<h3><b>No Se Encontraron Resultados</b></h3>';
    }
    $codigo.='</div></div>';
    $pdf = new TCPDF();
    $pdf->SetTitle("reporte_maraton_" . $_SESSION["equipo"]["cantidad"]);
    $pdf->AddPage();
    $pdf->writeHTML($codigo);
    $pdf->Output("reporte_maraton_" . $_SESSION["equipo"]["cantidad"] . ".pdf", "I");
}