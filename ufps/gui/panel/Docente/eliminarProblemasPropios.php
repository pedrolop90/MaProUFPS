<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["equipo"]) || isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["docente"]["mostrar"] == -1) {
    header("Location:procesar\procesarProblemasPropios.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <script src="js/docente.js"></script>
        <title>Eliminar Problemas</title>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel">
                <form method="post" action="" id="formulario" name="formulario">
                    <div class="ufps-row">
                        <div class="ufps-col-12">
                            <h1 class="ufps-text-center">Eliminar Problemas</h1>
                            <table class="ufps-table ufps-table-inserted ufps-text-center">
                                <thead>
                                    <tr>
                                        <th data-field="nombre">Nombre</th>
                                        <th data-field="fechaI">Categoria</th>
                                        <th data-field="horaI">Tiempo Limite</th>
                                        <th data-field="fechaF">Ver Problema</th>
                                        <th data-field="eliminar">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    echo $_SESSION["docente"]["mostrar"];
                                    $_SESSION["docente"]["mostrar"] = -1;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="modal1" class="ufps-modal">
                            <div class="ufps-modal-content">
                                <div class="ufps-modal-header">
                                    <span class="ufps-modal-close">×</span>
                                    <h2 id="titulo" class="ufps-text-center"></h2>
                                </div>
                                <div class="ufps-modal-body">
                                    <p id="enunciado" class="ufps-text-center"></p>
                                    <p id="entradas" class="ufps-text-left"></p>
                                    <p id="salidas" class="ufps-text-left"></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="ufps-alert" id="notificacion">
                        <span class="ufps-close-alert-btn">x</span>
                        <span id="mensaje"> Alerta de ejemplo.</span>
                    </div>
            </div>
        </div>
        <?php
        include_once '../../utilidad/piepagina.php';
        ?>
    </body>
</html>
