<?php
require_once '../../../../negocio/basedatos/mysql/dto/DocenteDTO.php';

interface IDocenteDAO{
    function registrarDocente(DocenteDTO $Docente);
    function iniciarDocente(DocenteDTO $Docente);
    function eliminarDocente(DocenteDTO $Docente);
    function listarDocentes();
    function actualizarDocente(DocenteDTO $Docente);
}