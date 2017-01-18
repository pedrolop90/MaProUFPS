<?php
require_once '../../../../negocio/basedatos/mysql/dao/EquipoDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/DocenteDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/AdminDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/ParticipanteDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/EventoDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/ProblemaDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/CategoriaDAO.php';
require_once '../../../../negocio/basedatos/mysql/dao/EnvioDAO.php';
class DAOFactory{
    
    function obtenerEquipo(){
        return new EquipoDAO;
    }
    function obtenerDocente(){
        return new DocenteDAO();
    }
    function obtenerAdmin(){
        return new AdminDAO();
    }
    function obtenerParticipante(){
        return new ParticipanteDAO();
    }
    function obtenerEvento(){
        return new EventoDAO();
    }
    function obtenerProblema(){
        return new ProblemaDAO;
    }
    function obtenerCategoria(){
        return new CategoriaDAO;
    }
    function obtenerEnvio(){
        return new EnvioDAO;
    }
}
