
<?php
session_start();
if (isset($_SESSION["admin"]) || isset($_SESSION["docente"])) {
    header("Location: ../visualizar/visualizarRankingGeneral.php");
}
if ($_SESSION["maraton"]["mostrar"] == -1) {
    header("Location:procesar/procesarCargarProblema.php");
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
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <title>Enviar Ejercicio</title>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>
        <div class="ufps-container">
            <div class="ufps-panel">
                <form action="" method="post" id="formulario" name="formulario" onsubmit="enviarEjercico()">
                    <h1 class="ufps-text-center">Enviar Ejercicio</h1>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-12">
                            <select id="ejercicio">
                                <option value="" disabled selected>Elegir Ejercicio</option>
                                <?php
                                echo $_SESSION["maraton"]["mostrar"];
                                $_SESSION["maraton"]["mostrar"] = -1;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <textarea id="solucion"  placeholder="solucion"></textarea>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <button id="enviar"class="ufps-btn" type="submit" >Enviar</button>
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
