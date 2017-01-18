
<form name="formularioDocente" id="formularioDocente" method="post" action="" autocomplete="false"  >
    <div class="ufps-panel" >
        <h1 class="ufps-text-center">Registrar Docente</h1>

        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Nombre</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="nombreDocente" class="ufps-input-line" placeholder="Nombre del Docente" type="text" name="nombre" required="">
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Apellido</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="apellidoDocente" class="ufps-input-line" placeholder="Apellido del Docente" type="text" name="apellido" required="" >
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Usuario</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="usuarioDocente" class="ufps-input-line" placeholder="Usuario del Docente" type="text" name="usuario" required="" >
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Correo Electronico</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="correoDocente" class="ufps-input-line" placeholder="Correo del Docente" type="emil" name="correo" required="" >
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Contraseña</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="contraseña1Docente" class="ufps-input-line" placeholder="Contraseña" type="password" name="contraseña1" required="">
            </div>
        </div>
        <div class="ufps-row">
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-2">
                <label>Validar Contraseña</label>
            </div>
            <div class="ufps-col-netbook-4 ufps-col-netbook-push-3">
                <input required id="contraseña2Docente" class="ufps-input-line" placeholder="Validar Contraseña" type="password" name="contraseña2" required="" >
            </div>
        </div>
        <div class="ufps-row">
            <input id="enviar" class="ufps-btn ufps-center-block" type="button" onclick="registrarDocente()" value="Registrar">
        </div>
        <div class="ufps-row">

        </div>
    </div>
</form>
