<?php
session_start();
if (isset($_SESSION["docente"]) || isset($_SESSION["equipo"]) || isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["admin"]["mostrar"] == -1) {
    header("Location:procesar\procesarListarEquipos.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="js/admin.js"></script>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <title>Eliminar Equipo</title>
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
                            <h1 class="ufps-text-center">Eliminar Equipos</h1>
                            <table class="ufps-table ufps-table-inserted ufps-text-center">
                                <thead>
                                    <tr>
                                        <th data-field="nombre">Usuario</th>
                                        <th data-field="nombre">Nombre</th>
                                        <th data-field="resueltos">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    echo $_SESSION["admin"]["mostrar"];
                                    $_SESSION["admin"]["mostrar"] = -1;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <div class="ufps-alert" id="notificacion">
                    <span class="ufps-close-alert-btn">x</span>
                    <span id="mensaje"> Alerta de ejemplo.</span>
                </div>
            </div>
        </div>
        <?php
        require_once '../../utilidad/piepagina.php';
        ?>
    </body>
</html>
