<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$arreglo=$controlador->listarDocentes();
$codigo="";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.='<input type="checkbox" name="profesor" id="p_'.$arreglo[$index]["id_docente"].'" class="'.$arreglo[$index]["id_docente"].'"><label for="p_'.$arreglo[$index]["id_docente"].'">'.$arreglo[$index]["nombre"].' '.$arreglo[$index]["apellido"].'</label>';
}
echo $codigo;