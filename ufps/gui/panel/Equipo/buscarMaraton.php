<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["docente"]) || isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <script src="js/equipo.js"></script>
        <title>Maratones Inscritas</title>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <form name="formulario" id="formulario" action="" method="post">
                <?php
                require_once '../visualizar/busquedaAvanzadaMaraton.php';
                ?>
                <div class="ufps-panel" >
                    <h1 class="ufps-text-center">Maratones Encontradas</h1>
                    <table class="ufps-table ufps-table-inserted ufps-text-center">
                        <thead>
                            <tr>
                                <th data-field="id">id</th>
                                <th data-field="id">Profesor</th>
                                <th data-field="nombre">Nombre</th>
                                <th data-field="fechaI">Fecha de Inicio</th>
                                <th data-field="horaI">Hora de Inicio</th>
                                <th data-field="fechaF">Fecha del Final</th>
                                <th data-field="horaF">Hora del Final</th>
                                <th data-field="Accion">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo">

                        </tbody>
                    </table>
                    <div id="noEncontrado"></div>
                </div>
            </form>
            <div class="ufps-alert" id="notificacion">
                <span class="ufps-close-alert-btn">x</span>
                <span id="mensaje"> Alerta de ejemplo.</span>
            </div>
        </div>
        <script>
            window.addEventListener("load", function () {
                buscarMaraton();
                document.getElementById("maraton_buscada").focus();
                noComenzar = true;
            }, false);
            function comenzar() {
                var arreglo = document.querySelectorAll(".checkbox > input[type='checkbox']");
                for (var i = 0; i < arreglo.length; i++) {
                    arreglo[i].addEventListener("click", function () {
                        buscarMaraton();
                    }, false);
                }
                noComenzar = false;
            }
        </script>
        <?php
        include_once '../../utilidad/piepagina.php';
        ?>
    </body>
</html>
