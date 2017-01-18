<?php
session_start();
if ($_SESSION["usuario"]["mostrar"] == -1) {
    header("Location: ../visualizar/procesar/procesarRankingGeneral.php");
}
if (isset($_SESSION["maraton"])) {
    if (isset($_SESSION["maraton"]["usuario"])) {
        header("Location: ../Maraton/maraton.php");
    }
    header("Location: ../visualizar/cerrarSesion.php");
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
        <script src="../equipo/js/equipo.js"></script>
        <title>Ranking General</title>
        
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel">
                <form name="formulario" id="formulario"  action="" method="post">
                    <h1 class="ufps-text-center ">Ranking General</h1>
                    <table class="ufps-table ufps-table-inserted ufps-text-center">
                        <thead>
                            <tr>
                                <th data-field="posicion">Posicion</th>
                                <th data-field="nombre">Nombre</th>
                                <th data-field="resueltos">Resueltos</th>
                                <th data-field="Intentos">Intentos</th>
                                <th data-field="tiempo">Tiempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $_SESSION["usuario"]["mostrar"];
                            $_SESSION["usuario"]["mostrar"] = -1;
                            ?>

                        <div class="ufps-alert" id="notificacion">
                            <span class="ufps-close-alert-btn">x</span>
                            <span id="mensaje"> Alerta de ejemplo.</span>
                        </div>
                </form>
            </div>
        </div>
        <?php
        include_once '../../utilidad/piepagina.php';
        ?>

    </body>
</html>
