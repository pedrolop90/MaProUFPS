
var pos = 1;
var posD = 1;
var tiempo = 5000;

/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
 lo que se puede copiar tal como esta aqui */
function nuevoAjax() {
    var xmlhttp = false;
    try {
        // Creacion del objeto AJAX para navegadores no IE Ejemplo:Mozilla, Safari 
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            // Creacion del objet AJAX para IE
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
                xmlhttp = new XMLHttpRequest();
        }
    }
    return xmlhttp;
}

function notification(mensaje, tipo) {
    var noti = document.getElementById("notificacion");
    noti.style.display = "block";
    noti.style.top=((window.innerHeight-60))+"px";
    noti.style.left=((window.innerWidth/2)-150)+"px";
    noti.className = "ufps-alert ufps-alert-" + tipo;
    document.getElementById("mensaje").innerHTML = mensaje;
}


function iniciarEquipo() {
    var nombre_usuario_Equipo = document.getElementById("nombre_usuario_Equipo").value;
    var contraseña_Equipo = document.getElementById("contraseña_Equipo").value;
    iniciarEquipoAjax(nombre_usuario_Equipo, contraseña_Equipo);
}


function iniciarEquipoAjax(nombre_usuario, contraseña) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre_usuario=" + nombre_usuario + "&contraseña=" + contraseña + "&aleatorio=" + aleatorio;
    url = "procesar/procesarSesionEquipo.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rta = ajax.responseText;
            if (rta.indexOf("1") >= 0) {
                formularioEquipo.action = "../visualizar/visualizarRankingGeneral.php";
                formularioEquipo.submit();
            } else {
                notification("ocurrio un error al intentar ingresar", "red");
            }
        } else {
            notification("cargando..........", "yellow");
        }
    }
}

function iniciarDocente() {
    var nombre_usuario_Docente = document.getElementById("nombre_usuario_Docente").value;
    var contraseña_Docente = document.getElementById("contraseña_Docente").value;
    iniciarDocenteAjax(nombre_usuario_Docente, contraseña_Docente, "divError");
}


function iniciarDocenteAjax(nombre_usuario, contraseña, campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre_usuario=" + nombre_usuario + "&contraseña=" + contraseña + "&aleatorio=" + aleatorio;
    url = "procesar/procesarSesionDocente.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rta = ajax.responseText;
            if (rta.indexOf("1") >= 0) {
                formularioDocente.action = "../visualizar/visualizarRankingGeneral.php";
                formularioDocente.submit();
            } else {
                notification("ocurrio un error al intentar ingresar", "red");
            }
        } else {
            notification("cargando...........", "yellow");
        }
    }
}


function iniciarAdmin() {
    var nombre_usuario_Admin = document.getElementById("nombre_usuario_Admin").value;
    var contraseña_Admin = document.getElementById("contraseña_Admin").value;
    iniciarAdminAjax(nombre_usuario_Admin, contraseña_Admin, "divError");
}


function iniciarAdminAjax(nombre_usuario, contraseña, campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre_usuario=" + nombre_usuario + "&contraseña=" + contraseña + "&aleatorio=" + aleatorio;
    url = "procesar/procesarSesionAdmin.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText.indexOf("1") >= 0) {
                formularioAdmin.action = "../visualizar/visualizarRankingGeneral.php";
                formularioAdmin.submit();
            } else {
                notification("ocurrio un error al intentar ingresar", "red");
            }
        } else {
            notification("cargando..............", "yellow");
        }
    }
}

function registrarEquipo() {
    var usuario = document.getElementById("usuarioEquipo").value;
    var nombre = document.getElementById("nombreEquipo").value;
    var contraseña1 = document.getElementById("contraseña1Equipo").value;
    var contraseña2 = document.getElementById("contraseña2Equipo").value;
    registrarEquipoAjax(usuario, nombre, contraseña1, "divError");
}
function registrarEquipoAjax(usuario, nombre, contraseña, campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "usuario=" + usuario + "&nombre=" + nombre + "&contraseña=" + contraseña + "&aleatorio=" + aleatorio;
    url = "procesar/procesarRegistroEquipo.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rta = ajax.responseText;
            if (rta.indexOf("1") >= 0) {
                formularioEquipo.action = "../visualizar/visualizarRankingGeneral.php";
                formularioEquipo.submit();
            } else {
                notification("ocurrio un error al intentar registrarse", "red");
            }
        } else {
            notification("cargando...........", "yellow");
        }
    }
}


function registrarDocente() {
    var nombre = document.getElementById("nombreDocente").value;
    var apellido = document.getElementById("apellidoDocente").value;
    var usuario = document.getElementById("usuarioDocente").value;
    var correo = document.getElementById("correoDocente").value;
    var contraseña1 = document.getElementById("contraseña1Docente").value;
    var contraseña2 = document.getElementById("contraseña2Docente").value;
    registrarDocenteAjax(nombre, apellido, usuario, correo, contraseña1, "divError");
}

function registrarDocenteAjax(nombre, apellido, usuario, correo, contraseña, campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre=" + nombre + "&apellido=" + apellido + "&usuario=" + usuario + "&correo=" + correo + "&contraseña=" + contraseña + "&aleatorio=" + aleatorio;
    url = "procesar/procesarRegistroDocente.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText.indexOf("1") >= 0) {
                formularioDocente.action = "../visualizar/visualizarRankingGeneral.php";
                formularioDocente.submit();
            } else {
                notification("ocurrio un error al intentar registrarse", "red");
            }
        } else {
            notification("cargando..............", "yellow");
        }
    }
}
window.addEventListener("load",function(){
    aleatorio = Math.random();
    ajax = nuevoAjax();
    cargarCategoriasBusquedaAvanzada();
    ajax2 = nuevoAjax();
    cargarProfesoreBusquedaAvanzada();
},false);
function cargarCategoriasBusquedaAvanzada(){
    url = "../visualizar/procesar/procesarListarCategorias.php";
    parametros = "aleatorio="+aleatorio;
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector("#categoria + label + div").innerHTML=ajax.responseText;
        }
    };
}
function cargarProfesoreBusquedaAvanzada(){
    url = "../visualizar/procesar/procesarListarProfesores.php";
    parametros = "aleatorio="+aleatorio;
    ajax2.open("POST", url, true);
    ajax2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax2.send(parametros);
    ajax2.onreadystatechange = function () {
        if (ajax2.readyState == 4 && ajax2.status == 200) {
            document.querySelector("#docente + label + div").innerHTML=ajax2.responseText;
        }
    };
}
