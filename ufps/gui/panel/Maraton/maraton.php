<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["docente"]) || !isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["maraton"]["mostrar"] == -1) {
    header("Location: procesar/procesarMostrarRanking.php");
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
        <title>Maraton <?php echo $_SESSION["maraton"]["usuario"]; ?></title>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel">
                <h1 class=" ufps-center ufps-text-center">Ranking Maraton <?php echo $_SESSION["maraton"]["usuario"]; ?></h1>
                <table class="ufps-table ufps-table-inserted ufps-text-center">
                    <thead>
                        <tr>
                            <th data-field="posicion">Posicion</th>
                            <th data-field="nombre">Nombre</th>
                            <th data-field="resueltos">Resueltos</th>
                            <th data-field="tiempo">Tiempo</th>
                            <?php
                            echo $_SESSION["maraton"]["mostrar"];
                            $_SESSION["maraton"]["mostrar"] = -1;
                            ?>
                </table>
                <div class="ufps-alert" id="notificacion">
                    <span class="ufps-close-alert-btn">x</span>
                    <span id="mensaje"> Alerta de ejemplo.</span>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once '../../utilidad/piePagina.php';
    ?>
    <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
</body>
</html>
