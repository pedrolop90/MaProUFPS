<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["docente"]) || (!isset($_SESSION["maraton"]) && isset($_SESSION["equipo"])) ||
        !isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["maraton"]["mostrar"] == -1) {
    header("Location:procesar/procesarMostrarEjercicios.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script src="js/maraton.js"></script>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <title>Ejercicios</title>
        <script>
            window.addEventListener("load", function () {
                document.getElementsByClassName("ufps-tab-content")[0].style.display = "block";
                document.getElementsByClassName("ufps-tab-links")[0].className += " ufps-tab-active";
            }, false);
        </script>
    </head>
    <body background="../../imagenes/main-bg.png">
        <div class="ufps-container">
            <div class="ufps-panel pane-sesion">
                <h1>Problemas De La Maraton <?php echo $_SESSION["maraton"]["usuario"]; ?></h1>
                <div class="ufps-tab-container" id="tabs">
                    <?php
                    echo $_SESSION["maraton"]["mostrar"];
                    $_SESSION["maraton"]["mostrar"] = -1;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
