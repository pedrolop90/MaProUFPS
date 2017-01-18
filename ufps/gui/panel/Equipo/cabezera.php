
<header>
    <div class="ufps-container ufps-navbar ufps-navbar-dark" id="menu">
        <div class="ufps-container">
            <div class="ufps-navbar-left">
                <div class="ufps-navbar-corporate ufps-navbar-left">
                    <img src="../../lib/img/logo_ufps.png" alt="Logo UFPS">
                </div>
            </div>
            <div class="ufps-navbar-brand">
                <div class="ufps-btn-menu" onclick="toggleMenu('menu')">
                    <div class="ufps-btn-menu-bar"> </div>
                    <div class="ufps-btn-menu-bar"> </div>
                    <div class="ufps-btn-menu-bar"> </div>
                </div>
                Equipo
            </div>
            <div class="ufps-navbar-left">
                <a href="../Equipo/Ajustes.php" class="ufps-navbar-btn"> <div class="ufps-tooltip"><image src="../../imagenes/ajustes2.png"/>
                        <span class="ufps-tooltip-content-bottom">Ajustes</span>
                    </div></a>
            </div>
            <div class="ufps-navbar-left ufps-col-desktop-3">
                <input style="color:black; margin-top: 20px;" type='text'  onkeyup="buscarMaraton(this)" class='ufps-input-line ufps-navbar-light' id='maraton_buscada' placeholder="Buscar Maraton por Id,Nombre ó Profesor">
            </div>
            
            <div class="ufps-navbar-right">
                <div class="ufps-navbar-left">
                    <a href="../visualizar/cerrarSesion.php" class="ufps-navbar-btn"> <div class="ufps-tooltip"><image src="../../imagenes/salir1.png"/>
                            <span class="ufps-tooltip-content-bottom">Salir</span>
                        </div></a>
                </div>
            </div>
            <div class="ufps-navbar-right">
                <a href="../Equipo/maratonesActivas.php" class="ufps-navbar-btn">Maratones Inscritas</a>
                <a href="../Equipo/proximasMaratones.php" class="ufps-navbar-btn">Proximas Maratones</a>
                <a href="../visualizar/visualizarRankingGeneral.php" class="ufps-navbar-btn">Ranking General</a>
                <a href="../visualizar/visualizarRankingMaratones.php" class="ufps-navbar-btn">Ranking Maratones</a>
            </div>

        </div>
    </div>
</header>
