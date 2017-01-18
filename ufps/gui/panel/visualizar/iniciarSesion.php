<?php
session_start();
if (isset($_SESSION["equipo"]) || isset($_SESSION["admin"]) || isset($_SESSION["docente"]) || isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <script src="js/usuario.js"></script>
        <title>Iniciar Sesion</title>
        <script>
            window.addEventListener("load", function () {
                document.getElementsByClassName("ufps-tab-content")[0].style.display = "block";
                document.getElementsByClassName("ufps-tab-links")[1].className += " ufps-tab-active";
            }, false);
        </script>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel pane-tab">
                <div class="ufps-tab-container" id="tabs">
                    <ul class="ufps-tabs row">
                        <li class="ufps-col-netbook-4"><a class="ufps-tab-links" onclick="openTab(event, 'docente1', 'tabs')">
                                <div class="ufps-tooltip"><image id="equipo" src="../../imagenes/docente.png"/>
                                    <span class="ufps-tooltip-content-right">Docente</span>
                                </div></a></li>
                        <li class="ufps-col-netbook-4"><a class="ufps-tab-links" onclick="openTab(event, 'equipo1', 'tabs')">
                                <div class="ufps-tooltip"><image id="equipo" src="../../imagenes/equipo.png"/>
                                    <span class="ufps-tooltip-content-right">Equipo</span>
                                </div></a></li>
                        <li class="ufps-col-netbook-4"><a class="ufps-tab-links" onclick="openTab(event, 'admin1', 'tabs')">
                                <div class="ufps-tooltip"><image id="equipo" src="../../imagenes/admin.png"/>
                                    <span class="ufps-tooltip-content-right">Administrador</span>
                                </div></a></li>
                    </ul>
                    <div id="equipo1" class="ufps-tab-content">
                        <?php
                        require_once '../Equipo/sesionEquipo.php';
                        ?>
                    </div>
                    <div id="docente1" class="ufps-tab-content">
                        <?php
                        require_once '../Docente/sesionDocente.php';
                        ?>
                    </div>
                    <div id="admin1" class="ufps-tab-content">
                        <?php
                        require_once '../Admin/sesionAdmin.php';
                        ?>
                    </div>
                </div>
                <div class="ufps-alert" id="notificacion">
                    <span class="ufps-close-alert-btn">x</span>
                    <span id="mensaje"> Alerta de ejemplo.</span>
                </div>
            </div>
        </div>
        <?php
        include_once '../../utilidad/piePagina.php';
        ?>
    </body>
</html>
