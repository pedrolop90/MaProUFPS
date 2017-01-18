<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["equipo"]) || isset($_SESSION["maraton"])) {
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
        <script src="js/docente.js"></script>
        <title>Ajustes</title>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel pane-sesion">
                <form name="formulario" id="formulario" method="post" action="" autocomplete="">
                    <div class="ufps-panel" >
                        <h1 class="ufps-text-center">Actualizar Datos Del Docente</h1>

                        <div class="ufps-row">
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                                <label>Nombre</label>
                            </div>
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                                <input required id="nombreDocente" class="ufps-input-line" placeholder="Nombre del Docente" type="text" name="nombre">
                            </div>
                        </div>
                        <div class="ufps-row">
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                                <label>Apellido</label>
                            </div>
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                                <input required id="apellidoDocente" class="ufps-input-line" placeholder="Apellido del Docente" type="text" name="apellido">
                            </div>
                        </div>
                        <div class="ufps-row">
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                                <label>Correo Electronico</label>
                            </div>
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                                <input required id="correoDocente" class="ufps-input-line" placeholder="Correo del Docente" type="emil" name="correo">
                            </div>
                        </div>
                        <div class="ufps-row">
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                                <label>Contraseña</label>
                            </div>
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                                <input required id="contraseña1Docente" class="ufps-input-line" placeholder="Contraseña" type="password" name="contraseña1">
                            </div>
                        </div>
                        <div class="ufps-row">
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                                <label>Validar Contraseña</label>
                            </div>
                            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                                <input required id="contraseña2Docente" class="ufps-input-line" placeholder="Validar Contraseña" type="password" name="contraseña2">
                            </div>
                        </div>
                        <div class="ufps-row">
                            <input id="enviar" class="ufps-btn ufps-center-block" type="button" onclick="actualizarDocente()" value="Actualizar">
                        </div>
                        <div class="ufps-row">

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
        include_once '../../utilidad/piepagina.php';
        ?>
    </body>
</html>
