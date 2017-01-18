<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["docente"]) || isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Participante</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <script src="js/equipo.js"></script>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <form name="formulario" id="formulario" method="post" action="" enctype="">
                <div class="ufps-panel pane-sesion" >
                    <h1 class="ufps-text-center">Registrar Participante</h1>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Nombre Participante</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="nombre" class="ufps-input-line"  placeholder="Nombre" type="text" name="nombre" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Apellido Participante</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="apellido" class="ufps-input-line" placeholder="Apellido" type="text" name="apellido" required="" >
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Codigo Participante</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="codigo" class="ufps-input-line" placeholder="Codigo" type="number" name="codigo" required="" maxlength="5" minlength="5">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Correo Electronico</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="correo" class="ufps-input-line" placeholder="Correo Electronico" type="gmail" name="correo" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <input id="registrar" class="ufps-btn ufps-center-block" type="button" onclick="registrarParticipante()" value="Registrar">
                    </div>
                    <div class="ufps-row">
                    </div>
                    <div class="ufps-alert" id="notificacion">
                        <span class="ufps-close-alert-btn">x</span>
                        <span id="mensaje"> Alerta de ejemplo.</span>
                    </div>
                </div>
            </form>

        </div>
        <?php
        include_once '../../utilidad/piepagina.php';
        ?>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
    </body>
</html>
