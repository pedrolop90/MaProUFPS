<?php
session_start();
if (isset($_SESSION["maraton"])) {
    $arreglo = $_SESSION["equipo"];
}
session_destroy();
session_start();
$_SESSION["equipo"] = $arreglo;
header("Location: ../../../index.php");
