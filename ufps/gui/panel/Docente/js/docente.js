/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var pos = 1;
var posD = 1;
var ajax;
var problemas = Array();
nMinimoProblemas = 1;
tiempo = 5000;
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
    setTimeout(function () {
        noti.style.display = "none";
        console.log("quita clase");
    }, 3000);
}

function openModal(id) {
    var modal = document.getElementById(id);
    modal.style.display = "block";
    var close = document.getElementsByClassName("ufps-modal-close");
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            modal.style.display = "none";
        }
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function registrarDocente() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var usuario = document.getElementById("usuario").value;
    var correo = document.getElementById("correo").value;
    var contraseña1 = document.getElementById("contraseña1").value;
    var contraseña2 = document.getElementById("contraseña2").value;
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
                formulario.action = "../visualizar/visualizarRankingGeneral.php";
                formulario.submit();
            } else {
                notification("ese Docente ya ha sido registrado", tiempo);
            }
        } else {
            notification("cargando..............", tiempo);
        }
    }
}

function registrarMaraton() {
    var nombre = document.getElementById("nombre").value;
    var fecha_inicio = document.getElementById("fecha_inicio").value;
    var hora_inicio = document.getElementById("hora_inicio").value;
    var fecha_fin = document.getElementById("fecha_fin").value;
    var hora_fin = document.getElementById("hora_fin").value;
    var visibilidad=1;
    if(document.getElementById("privado").checked==true){
        visibilidad=0;
    }
    registrarMaratonAjax(nombre, fecha_inicio, hora_inicio, fecha_fin, hora_fin,visibilidad,"divError");
}

function registrarMaratonAjax(nombre, fecha_inicio, hora_inicio, fecha_fin, hora_fin,visibilidad,campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre=" + nombre + "&fecha_inicio=" + fecha_inicio + "&hora_inicio=" + hora_inicio + "&fecha_fin=" + fecha_fin+"&visibilidad="+visibilidad;
    var arreglo = document.querySelectorAll("a");
    var cont = 0;
    for (var i = 0; i < arreglo.length; i++) {
        if (arreglo[i].className == "quitar") {
            parametros += "&problema" + (cont) + "=" + arreglo[i].id;
            cont++;
        }
    }
    parametros += "&tamaño=" + cont + "&hora_fin=" + hora_fin + "&aleatorio=" + aleatorio;
    url = "procesar/procesarRegistroMaraton.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var res=ajax.responseText;
            if (res.indexOf("1") >= 0) {
                formulario.action = "registrarEvento.php";
                formulario.submit();
                notification("Maraton Registrada", "green");
            } else {
                notification("no se pudo registrar el evento", "red");
            }
        } else {
            notification("cargando.........", "yellow");
        }
    }
}
function eliminarEvento(id_evento, obj) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "id_evento=" + id_evento + "&aleatorio=" + aleatorio;
    url = "procesar/procesarEliminarEvento.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText.indexOf("1") >= 0) {
                formulario.action = "eliminarEvento.php";
                formulario.submit();
                notification("evento eliminado", "green");
            } else {
                notification("no se pudo eliminar la maraton", "red");
            }
        } else {
            notification("eliminando.............", "yellow");
        }
    }
}
function registrarEjercicio() {
    var nombre = document.getElementById("nombre").value;
    var categoria = document.getElementById("categoria").value;
    var tiempo = document.getElementById("tiempo").value;
    var entrada = document.getElementById("entrada").value;
    var salida = document.getElementById("salida").value;
    var enunciado = document.getElementById("enunciado").value;
    var entradasT = document.getElementById("entradasT").value;
    var salidasT = document.getElementById("salidasT").value;
    registrarEjercicioAjax(nombre, categoria, tiempo, entrada, salida, enunciado, entradasT, salidasT, "divError");
}

function registrarEjercicioAjax(nombre, categoria, tiempo, entrada, salida, enunciado, entradasT, salidasT, campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre=" + nombre + "&categoria=" + categoria + "&tiempo=" + tiempo + "&entrada=" + entrada + "&salida=" + salida + "&enunciado=" + enunciado + "&entradasT=" + entradasT + "&salidasT=" + salidasT + "&aleatorio=" + aleatorio;
    url = "procesar/procesarRegistroEjercicio.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var res = ajax.responseText;
            if (res.indexOf("1") >= 0) {
                notification("registro exitoso", "green");
            } else {
                notification("no se puede registrar el ejercicio", "red");
            }
        } else {
            notification("cargando.............", "yellow");
        }
    }
}
function verProblema(id_problema, obj) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "id_problema=" + id_problema + "&aleatorio=" + aleatorio;
    url = "procesar/procesarVerProblema.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rta = ajax.responseText.split("____");
            document.getElementById("titulo").innerHTML = rta[0];
            document.getElementById("enunciado").innerHTML = "Enunciado <br>" + rta[1];
            document.getElementById("entradas").innerHTML = "Entradas <br>" + rta[2];
            document.getElementById("salidas").innerHTML = "Salidas <br>" + rta[3];
            openModal("modal1");
        }
    };
}
function eliminarProblema(id_problema, obj) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "id_problema=" + id_problema + "&aleatorio=" + aleatorio;
    url = "procesar/procesarEliminarProblema.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var res = ajax.responseText;
            if (res.indexOf("1") >= 0) {
                formulario.action = "eliminarProblemasPropios.php";
                formulario.submit();
                notification("ejercicio eliminado", "green");
            } else {
                notification("no se pudo eliminar el problema", "red");
            }
        } else {
            notification("eliminando................", "yellow");
        }
    }
}

function asginarProblemaEvento(obj) {
    var valor = document.getElementById(obj.id);
    if (valor.className == "agregar") {
        $('#' + obj.id).removeClass("agregar").addClass("quitar");
        valor.innerHTML = "<image src='../../imagenes/x.png'/>";
    } else {
        $('#' + obj.id).removeClass("quitar").addClass("agregar");
        valor.innerHTML = "<image src='../../imagenes/agregar1.png'/>";
    }
}


function actualizarDocente() {
    var nombre = document.getElementById("nombreDocente").value;
    var apellido = document.getElementById("apellidoDocente").value;
    var correo = document.getElementById("correoDocente").value;
    var contraseña1 = document.getElementById("contraseña1Docente").value;
    var contraseña2 = document.getElementById("contraseña2Docente").value;
    actualizarDocenteAjax(nombre, apellido, correo, contraseña1);
}
function actualizarDocenteAjax(nombre, apellido, correo, contraseña) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "nombre=" + nombre + "&apellido=" + apellido + "&correo=" + correo + "&contraseña=" + contraseña + "&aleatorio=" + aleatorio;
    url = "procesar/procesarActualizarDocente.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rta = ajax.responseText;
            if (rta.indexOf("1") >= 0) {
                formulario.action = "../Docente/Ajustes.php";
                formulario.submit();
                notification("Datos Actualizados", "green");
            } else {
                notification("ese Docente ya ha sido registrado", "red");
            }
        } else {
            notification("cargando..............", "yellow");
        }
    }
}