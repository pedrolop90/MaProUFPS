<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["equipo"]) || isset($_SESSION["maraton"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["docente"]["mostrar"] == -1) {
    header("Location:procesar\procesarListarProblemas.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Evento</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <script src="js/docente.js"></script>

    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <form name="formulario" id="formulario" method="post" action="" autocomplete="false" >
                <div class="ufps-panel" >
                    <h1 class="ufps-text-center">Registrar Evento</h1>

                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Nombre del evento</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="nombre" class="ufps-input-line" placeholder="Nombre del Evento" type="text" name="nombre" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Fecha de Inicio</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="fecha_inicio" class="ufps-input-line" placeholder="Fecha de Inicio" type="date" name="fecha_inicio" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Hora de Inicio</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="hora_inicio" class="ufps-input-line" placeholder="Hora de Inicio" type="time" name="hora_inicio" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Fecha de Finalizacion</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="fecha_fin" class="ufps-input-line" placeholder="Fecha de Finalizacion" type="date" name="fecha_fin" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Hora de Finalizacion</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="hora_fin" class="ufps-input-line" placeholder="Hora de Finalizacion" type="time" name="hora_fin" required="">
                        </div>
                    </div>
                    <div class="ufps-row checkbox">
                        <div class="ufps-col-desktop-2 ufps-col-desktop-push-3">
                            <input type="radio" name="busqueda" id="publico" checked=""><label for="publico">publico</label>
                        </div>   
                        <div class="ufps-col-desktop-push-5 ufps-col-desktop-1">
                            <input type="radio"name="busqueda" id="privado"><label for="privado">privado</label>
                        </div>
                    </div>
                    <div class="ufps-row" id="problemas">
                        <h2 class="ufps-text-center">Elegir Problemas</h2>
                        <table class="ufps-table ufps-table-inserted ufps-text-center">
                            <thead>
                                <tr>
                                    <th data-field="nombre">Nombre</th>
                                    <th data-field="categora">Categoria</th>
                                    <th data-field="tiempo">Tiempo</th>
                                    <th data-field="docente">Docente</th>
                                    <th data-field="ver_enunciado">Ver Enunciado</th>
                                    <th data-field="elegir">Elegir</th>
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
                    <div class="ufps-row">
                        <input id="enviar"class="ufps-btn ufps-center-block" type="button" onclick="registrarMaraton()" value="Registrar">
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
        <?php
        include_once '../../utilidad/piepagina.php';
        ?>
    </body>
</html>
