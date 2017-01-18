
<form name="formularioEquipo" id="formularioEquipo" method="post" action="" >
    <div class="ufps-panel" >
        <h1 class="ufps-text-center">Registrar Equipo</h1>

        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Usuario del Equipo</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="usuarioEquipo" class="ufps-input-line" placeholder="Usuario del Equipo" type="text" name="usuarioEquipo" required="">
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Nombre del Equipo</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="nombreEquipo" class="ufps-input-line" placeholder="Nombre del Equipo" type="text" name="nombreEquipo" required="" >
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Contraseña</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="contraseña1Equipo" class="ufps-input-line" placeholder="Contraseña" type="password" name="contraseña1Equipo" required="" >
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Validar Contraseña</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="contraseña2Equipo" class="ufps-input-line" placeholder="Validar Contraseña" type="password" name="contraseña2Equipo" required="">
            </div>
        </div>
        <div class="ufps-row">
            <input id="enviar" class="ufps-btn ufps-center-block" type="button" onclick="registrarEquipo()" value="Registrar">
        </div>
        <div class="ufps-row">

        </div>
    </div>
</form>