<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["docente"]) || isset($_SESSION["maraton"]) || !isset($_SESSION["equipo"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["equipo"]["mostrar"] == -1) {
    header("Location: procesar/procesarListarParticipantes.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar Equipo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <script src="js/equipo.js"></script>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel">
                <form name="formulario" id="formulario" method="post" action="" >
                    <h1 class="ufps-text-center">Actualizar Datos Del Equipo</h1>

                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Nombre del Equipo</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="nombre" class="ufps-input-line" placeholder="Nombre" type="text" name="nombre" required="" minlength="5" maxlength="20">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Contraseña Nueva</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="contraseña1" class="ufps-input-line" placeholder="Apellido" type="password" name="contraseña1" required="" minlength="5" maxlength="20">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                            <label>Validar Contraseña Nueva</label>
                        </div>
                        <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                            <input required id="contraseña2" class="ufps-input-line" placeholder="Codigo" type="password" name="contraseña2" required="" minlength="5" maxlength="20">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <input id="enviar"class="ufps-btn ufps-center-block" type="button" onclick="actualizarEquipo()" value="Actualizar">
                    </div>
                    <h3 class="ufps-text-center">Lista De Participantes 
                        <?php
                        if ($_SESSION["equipo"]["cantidad"] < 3) {
                            echo '<a id="agregarP" href="#!" onclick="direccionRegistrarParticipante()" class="ufps-navbar-btn">
                            <div class="ufps-tooltip"><image src="../../imagenes/agregarParticipante.png"/>
                                <span class="ufps-tooltip-content-right">Agregar Participante</span>
                            </div></a>';
                            $_SESSION["equipo"]["cantidad"] = 0;
                        }
                        ?>
                    </h3>
                    <table class="ufps-table ufps-table-inserted ufps-text-center">
                        <thead>
                            <tr>
                                <th data-field="nombre">Nombre</th>
                                <th data-field="apellido">Apellido</th>
                                <th data-field="codigo">Codigo</th>
                                <th data-field="correo">Correo</th>
                                <th data-field="editar">Actualizar</th>
                                <th data-field="eliminar">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $_SESSION["equipo"]["mostrar"];
                            $_SESSION["equipo"]["mostrar"] = -1;
                            ?>
                        </tbody>
                    </table>
                </form>
                <div class="ufps-row">
                    
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
