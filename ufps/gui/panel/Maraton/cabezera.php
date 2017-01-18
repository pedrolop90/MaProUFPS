
<div class="ufps-navbar ufps-navbar-dark" id="menu">
    <div class="ufps-container">
        <div class="ufps-navbar-left">
            <div class="ufps-navbar-corporate">
                <img src="../../lib/img/logo_ufps.png" alt="Logo UFPS">
            </div>
        </div>
        <div class="ufps-navbar-brand">
            <div class="ufps-btn-menu" onclick="toggleMenu('menu')">
                <div class="ufps-btn-menu-bar"> </div>
                <div class="ufps-btn-menu-bar"> </div>
                <div class="ufps-btn-menu-bar"> </div>
            </div>
            MaProUFPS
        </div>
        <div class="ufps-navbar-right">
            <div class="ufps-navbar-left">
                <a href="../visualizar/cerrarSesion.php" class="ufps-navbar-btn"> <div class="ufps-tooltip"><image src="../../imagenes/salir1.png"/>
                        <span class="ufps-tooltip-content-bottom">Salir</span>
                    </div></a>
            </div>
        </div>
        <div class="ufps-navbar-right">
            <a href="#!" onclick="abrirVentana()" class="ufps-navbar-btn"><div class="ufps-tooltip"><image src="../../imagenes/lupa.png"/>
                    <span class="ufps-tooltip-content-bottom">Ver Ejercicios</span>
                </div></a>
            <a href="../Maraton/enviarEjercicio.php" class="ufps-navbar-btn"><div class="ufps-tooltip"><image src="../../imagenes/subir.png"/>
                    <span class="ufps-tooltip-content-bottom">Enviar Ejercicio</span>
                </div></a>
            <a href="maraton.php" class="ufps-navbar-btn"><div class="ufps-tooltip"><image src="../../imagenes/board.png"/>
                    <span class="ufps-tooltip-content-bottom">Tabla de Posiciones</span>
                </div></a>
        </div>
        <div class="ufps-text-center">
            <a class="ufps-navbar-btn" id="cronometro" style="font-size: 30px;">
                <?php 
                if(!isset($_SESSION["usuario"])){
                    session_start();
                }
                echo $_SESSION["maraton"]["fecha_inicio"]."__".$_SESSION["maraton"]["fecha_fin"]."__"
                        .$_SESSION["maraton"]["hora_inicio"]."__".$_SESSION["maraton"]["hora_fin"];
                ?>
            </a>
        </div>
    </div>
</div>
