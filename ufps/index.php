<?php
session_start();
$_SESSION["usuario"] = array("usuario" => "usuario","estado"=>true,"mostrar"=>-1);
header("Location: gui/panel/visualizar/visualizarRankingGeneral.php");

