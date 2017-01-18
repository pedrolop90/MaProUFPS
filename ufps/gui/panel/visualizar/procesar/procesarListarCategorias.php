<?php
require_once '../../../controlador/Controlador.php';
$controlador=new Controlador();
$arreglo=$controlador->listarCategorias();
$codigo="";
for ($index = 0; $index < count($arreglo); $index++) {
    $codigo.='<input type="checkbox" name="categoria" id="c_'.$arreglo[$index]["id_categoria"].'" class="'.$arreglo[$index]["id_categoria"].'"><label for="c_'.$arreglo[$index]["id_categoria"].'">'.$arreglo[$index]["nombre"].'</label>';
}
echo $codigo;