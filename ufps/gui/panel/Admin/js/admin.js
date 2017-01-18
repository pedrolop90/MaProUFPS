/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    setTimeout(function () {
        noti.style.display = "none";
        console.log("quita clase");
    }, 3000);
}

function eliminarEquipo(usuario, obj) {
    aleatorio = Math.random();
    ajax = nuevoAjax();
    parametros = "usuario=" + usuario + "&aleatorio=" + aleatorio;
    url = "procesar/procesarEliminarEquipo.php";
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(parametros);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText.indexOf("1") >= 0) {
                formulario.action = "eliminarEquipo.php";
                formulario.submit();
                notification("equipo eliminado", "green");
            } else {
                 notification("no se pudo eliminar el equipo", "red");
            }
        } else {
            notification("eliminando..............", "yellow");
        }
    }
}