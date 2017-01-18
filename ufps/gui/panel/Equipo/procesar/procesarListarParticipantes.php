<?php
require_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
session_start();
$arreglo = $controlador->listarParticipantesPorEquipo($_SESSION["equipo"]["usuario"]);
$codigo = "";
$_SESSION["equipo"]["cantidad"] = count($arreglo);
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.="<tr>"
            . "<td><input type='text' class='ufps-input-line' id='nombre_" . $arreglo[$index]["id_participante"] . "'"
            . "value='" . $arreglo[$index]["nombre"] . "'></td>"
            . "<td><input type='text' class='ufps-input-line' id='apellido_" . $arreglo[$index]["id_participante"] . "'"
            . "value='" . $arreglo[$index]["apellido"] . "'></td>"
            . "<td><input type='number' class='ufps-input-line' id='codigo_" . $arreglo[$index]["id_participante"] . "'"
            . "value='" . $arreglo[$index]["codigo"] . "' maxlength='7' ></td>"
            . "<td><input type='email' class='ufps-input-line' id='correo_" . $arreglo[$index]["id_participante"] . "'"
            . "value='" . $arreglo[$index]["correo"] . "'></td>"
            . "<td id='campo" . ($index + 10) . "'><div class='ufps-tooltip'>"
            . "<a onclick='actualizarParticipante(" . $arreglo[$index]["id_participante"] . ",this)' id='" . ($index + 10) . "' href='#!'>"
            . "<image id='equipo' src='../../imagenes/bien3.png'/></a><span class='ufps-tooltip-content-top'>Actualizar</span></div></td>"
            . "<td id='campo" . $index . "'><div class='ufps-tooltip'>"
            . "<a onclick='eliminarParticipante(" . $arreglo[$index]["id_participante"] . ",this)' id='" . $index . "' href='#!'>"
            . "<image id='equipo' src='../../imagenes/borrar.png'/></a><span class='ufps-tooltip-content-top'>Eliminar</span></div></td>"
            . "</tr>";
}
if (count($arreglo) == 0) {
    $codigo = '</tbody></table><br><image src="../../imagenes/lupaR.png"/>'
            . '<h3><b>No Se Encontraron Resultados</b></h3>';
}
echo $codigo;
$_SESSION["equipo"]["mostrar"] = $codigo;
header("Location:../Ajustes.php");
