<?php
if(!isset($_SESSION["usuario"])){
    session_start();
}
if (isset($_SESSION["maraton"])) {
    include_once '../Maraton/cabezera.php';
} else if (isset($_SESSION["docente"])) {
    include_once '../Docente/cabezera.php';
} else if (isset($_SESSION["equipo"])) {
    include_once '../Equipo/cabezera.php';
} else if(isset($_SESSION["admin"])){
    include_once '../Admin/cabezera.php';
} else{
    include_once '../visualizar/cabezera.php';
}