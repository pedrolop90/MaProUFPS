
<header>
    <div class="ufps-container ufps-navbar ufps-navbar-dark" id="menu">
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
                Docente
            </div>
            <div class="ufps-navbar-left">
                <a href="../Docente/Ajustes.php" class="ufps-navbar-btn"> <div class="ufps-tooltip"><image src="../../imagenes/ajustes2.png"/>
                        <span class="ufps-tooltip-content-bottom">Ajustes</span>
                    </div></a>
            </div>
            <div class="ufps-navbar-right">
                <div class="ufps-navbar-left">
                    <a href="../visualizar/cerrarSesion.php" class="ufps-navbar-btn"> <div class="ufps-tooltip"><image src="../../imagenes/salir1.png"/>
                            <span class="ufps-tooltip-content-bottom">Salir</span>
                        </div></a>
                </div>
            </div>
            <div class="ufps-navbar-right">
                <div class="ufps-dropdown" id="dropdown6">
                    <button onclick="openDropdown('dropdown6')" class="ufps-dropdown-btn">Maraton</button>
                    <div class="ufps-dropdown-content">
                        <a href="../Docente/registrarEvento.php">Crear</a>
                        <a href="../Docente/eliminarEvento.php">Eliminar</a>
                    </div>
                </div>
                <div class="ufps-dropdown" id="dropdown7">
                    <button onclick="openDropdown('dropdown7')" class="ufps-dropdown-btn">Problema</button>
                    <div class="ufps-dropdown-content">
                        <a href="../Docente/registraEjercicio.php">Crear</a>
                        <a href="../Docente/eliminarProblemasPropios.php">Eliminar</a>
                    </div>
                </div>
                <a href="../visualizar/visualizarRankingGeneral.php" class="ufps-navbar-btn">Ranking General</a>
                <a href="../visualizar/visualizarRankingMaratones.php" class="ufps-navbar-btn">Ranking Maratones</a>
            </div>


        </div>
    </div>
</header>
