<?php
require_once '../../../../negocio/basedatos/mysql/dto/ProblemaDTO.php';
interface IProblemaDAO{
    
    function registrarProblema(ProblemaDTO $ejercicio);
    function listarProblemas();
    function eliminarProblema(ProblemaDTO $problema);
    function verProblema(ProblemaDTO $problema);
    function listarProblemasPropios(ProblemaDTO $problema);
}