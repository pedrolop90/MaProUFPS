<?php
session_start();
if ($_SESSION["docente"]["mostrar"] == -1) {
    header("Location:procesar\procesarListarCategorias.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Ejercicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="../../lib/css/ufps.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../lib/css/estilo.css"/>
        <script type="text/javascript" src="../../lib/js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../lib/js/ufps.min.js"></script>
        <script src="js/docente.js"></script>
        <style>
            #enunciado,#salida,#entrada,#salidasT,#entradasT{
                height:300px;

            }
        </style>
    </head>
    <body background="../../imagenes/main-bg.png">
        <?php
        include_once '../../utilidad/procesarCabecera.php';
        ?>

        <div class="ufps-container">
            <form name="formulario" id="formulario" method="post" action="" autocomplete="off" >
                <div class="ufps-panel panel-sesion" >
                    <h1 class="ufps-text-center">Registrar Ejercicio</h1>
                    <div class="ufps-row">
                        <div class="ufps-col-netbook-10 ufps-col-netbook-push-1">
                            <input required id="nombre" class="ufps-input-line" placeholder="Nombre" type="text" name="nombre" required="">
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <select id="categoria" required="">
                                <option value="" disabled selected>Elegir Categoria</option>
                                <?php
                                echo $_SESSION["docente"]["mostrar"];
                                $_SESSION["docente"]["mostrar"] = -1;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-4 ufps-col-desktop-push-4">
                            <input required id="tiempo" class="ufps-input-line" placeholder="Tiempo Maximo de Compilacion" type="text" name="tiempo" required="" >
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <textarea id="enunciado"  placeholder="Enunciado" required=""></textarea>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <textarea id="entrada"  placeholder="Entradas Iniciales" required=""></textarea>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <textarea id="salida"  placeholder="Salidas Iniciales" required=""></textarea>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <textarea id="entradasT"  placeholder="Entradas Totales" required=""></textarea>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <div class="ufps-col-desktop-12">
                            <textarea id="salidasT"  placeholder="Salidas Totales" required=""></textarea>
                        </div>
                    </div>
                    <div class="ufps-row">
                        <input id="enviar"class="ufps-btn ufps-center-block" type="button" onclick="registrarEjercicio()" value="Registrar">
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

    </body>
</html>
