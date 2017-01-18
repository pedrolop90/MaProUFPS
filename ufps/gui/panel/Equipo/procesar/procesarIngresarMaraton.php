<?php
include_once '../../../controlador/Controlador.php';
$controlador = new Controlador();
$id_evento=$_POST["id_evento"];
$arreglo=$controlador->buscarFechasEvento($id_evento);
$fecha_inicio=$arreglo[0]["fecha_inicio"];
$fecha_fin=$arreglo[0]["fecha_fin"];
$hora_inicio=$arreglo[0]["hora_inicio"];
$hora_fin=$arreglo[0]["hora_fin"];
session_start();
$_SESSION["maraton"]=array("usuario"=>$id_evento,"estado"=>true,"mostrar"=>-1,"fecha_inicio"=>$fecha_inicio,"fecha_fin"=>$fecha_fin,"hora_inicio"=>$hora_inicio,"hora_fin"=>$hora_fin);
echo "1";