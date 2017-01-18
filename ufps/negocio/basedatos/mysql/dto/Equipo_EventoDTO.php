<?php
class Equipo_EventoDTO{
    
    private $id_equipo;
    private $id_evento;
    private $ejercicios;
    private $tiempo;
    private $intentos;
    private $nick_equipo;
    
    function Equipo_EventoDTO($id_equipo,$id_evento,$ejercicios,$tiempo,$intentos,$nick_equipo){
        $this->id_equipo=$id_equipo;
        $this->id_evento=$id_evento;
        $this->ejercicios=$ejercicios;
        $this->tiempo=$tiempo;
        $this->intentos=$intentos;
        $this->nick_equipo=$nick_equipo;
        
    }
    
    function getId_equipo() {
        return $this->id_equipo;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getEjercicios() {
        return $this->ejercicios;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function getIntentos() {
        return $this->intentos;
    }

    function getNick_equipo() {
        return $this->nick_equipo;
    }

    function setId_equipo($id_equipo) {
        $this->id_equipo = $id_equipo;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setEjercicios($ejercicios) {
        $this->ejercicios = $ejercicios;
    }

    function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    function setIntentos($intentos) {
        $this->intentos = $intentos;
    }

    function setNick_equipo($nick_equipo) {
        $this->nick_equipo = $nick_equipo;
    }


}
