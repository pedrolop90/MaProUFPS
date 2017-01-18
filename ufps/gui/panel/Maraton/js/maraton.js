
var pos = 1;
var posD = 1;
var ajax;
var error = "divError";
var participante = "participantes";
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

function numeroDias(f1, f2) {
    var aFecha1 = f1.split('-');
    var aFecha2 = f2.split('-');
    var fFecha1 = Date.UTC(aFecha1[0], aFecha1[1] - 1, aFecha1[2]);
    var fFecha2 = Date.UTC(aFecha2[0], aFecha2[1] - 1, aFecha2[2]);
    var dif = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 *60* 24));
    return dias;
}

window.addEventListener("load", function () {
    var arreglo = document.getElementById("cronometro").innerHTML.split("__");
    document.getElementById("cronometro").innerHTML="";
    var dias = numeroDias(arreglo[0], arreglo[1]);
    var hora_fin = arreglo[3].split(":");
    var hora_actual = new Date();
    var hora = hora_actual.getHours();
    var minutos = hora_actual.getMinutes();
    var segundos = hora_actual.getSeconds();
    window.setInterval(function () {
        document.getElementById("cronometro").innerHTML = "dias: " + dias + ", horas: " + hora + ", minutos: " + minutos + ", segundos: " + segundos;
        if (hora == 0) {
            hora=24;
            dias--;
        } else if (minutos == 0) {
            minutos = 60;
            hora--;
        } else if (segundos == 0) {
            segundos = 60;
            minutos--;
        } else {
            segundos--;
        }
        if(dias==0&&hora==0&&minutos==0&&segundos==0){
            cerrarSesion();
        }
    }, 1000);
}, false);

function cerrarSesion(){
     window.locationf="../visualizar/cerrarSesion.php";
}

function notification(mensaje, tipo) {
    var noti = document.getElementById("notificacion");
    noti.style.display = "block";
    noti.style.top = ((window.innerHeight - 60)) + "px";
    noti.style.left = ((window.innerWidth / 2) - 150) + "px";
    noti.className = "ufps-alert ufps-alert-" + tipo;
    document.getElementById("mensaje").innerHTML = mensaje;
    setTimeout(function () {
        noti.style.display = "none";
        console.log("quita clase");
    }, 3000);
}

function enviarEjercico() {
    var ejercicio = document.getElementById("ejercicio").value;
    var solucion = document.getElementById("solucion").value;
    enviarEjercicioAjax(ejercicio, solucion, "divError");
}

function enviarEjercicioAjax(ejercicio, solucion, campo) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "ejercicio=" + ejercicio + "&solucion=" + solucion + "&aleatorio=" + aleatorio;
    url = "procesar/procesarEnviarEjercicio.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rta = ajax.responseText;
            alert(rta);
            if (rta.indexOf("1") >= 0) {
                formulario.action = "enviarEjercicio.php";
                formulario.submit();
                notification("ejercicio enviado", "green");
            } else {
                notification("nose pudo enviar la solucion", "red");
            }
        } else {
            notification("cargando.............", "yellow");
        }
    }
}
function abrirVentana() {
    window.open('../Maraton/Problemas.php');
}

