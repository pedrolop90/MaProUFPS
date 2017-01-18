<?php

class ProblemaDTO{
    
    private $id;
    private $docente;
    private $nombre;
    private $categoria;
    private $tiempoLimite;
    private $entrada;
    private $salida;
    private $enunciado;
    private $entradasT;
    private $salidasT;
    
    function ProblemaDTO(){
        
    }
    function __ProblemaDTO($id,$docente,$nombre,$categoria,$tiempoLimite,$entrada,$salida,$enunciado,$entradasT,$salidasT){
        $this->id=$id;
        $this->docente=$docente;
        $this->categoria=$categoria;
        $this->nombre=$nombre;
        $this->tiempoLimite=$tiempoLimite;
        $this->entrada=$entrada;
        $this->salida=$salida.
        $this->enunciado=$enunciado;
        $this->entradasT=$entradasT;
        $this->salidasT=$salidasT;
        
    }
    function getEntradasT() {
        return $this->entradasT;
    }

    function getSalidasT() {
        return $this->salidasT;
    }

    function setEntradasT($entradasT) {
        $this->entradasT = $entradasT;
    }

    function setSalidasT($salidasT) {
        $this->salidasT = $salidasT;
    }

        
    
    function getId() {
        return $this->id;
    }

    function getDocente() {
        return $this->docente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getTiempoLimite() {
        return $this->tiempoLimite;
    }

    function getEntrada() {
        return $this->entrada;
    }

    function getSalida() {
        return $this->salida;
    }

    function getEnunciado() {
        return $this->enunciado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDocente($docente) {
        $this->docente = $docente;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setTiempoLimite($tiempoLimite) {
        $this->tiempoLimite = $tiempoLimite;
    }

    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    function setSalida($salida) {
        $this->salida = $salida;
    }

    function setEnunciado($enunciado) {
        $this->enunciado = $enunciado;
    }


}