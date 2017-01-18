<?php
require_once '../../../controlador/Controlador.php';
$nombre = $_POST["nombre"];
$fecha_inicio = $_POST["fecha_inicio"];
$hora_inicio = $_POST["hora_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$hora_fin = $_POST["hora_fin"];
$tamaño=$_POST["tamaño"];
$visibilidad=$_POST["visibilidad"];
$problemas = array();
for ($index = 0; $index < $tamaño; $index++) {
    $problemas[$index]=$_POST["problema$index"];
}
$controlador = new Controlador();
$mensaje = "";
session_start();
if ($controlador->registrarMaraton($_SESSION["docente"]["usuario"], $nombre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin,$problemas,$visibilidad)) {
    $mensaje = "1";
} else {
    $mensaje = "hubo un problema con los datos introducidos";
}
echo $mensaje;
