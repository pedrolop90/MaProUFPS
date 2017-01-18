<?php
require_once '../../../../negocio/basedatos/mysql/dto/EquipoDTO.php';
interface IEquipoDAO{
    
    function registrarEquipo(EquipoDTO $equipo);
    function iniciarEquipo(EquipoDTO $equipo);
    function actualizarEquipo(EquipoDTO $equipo);
    function eliminarEquipo(EquipoDTO $equipo);
    function listarEquipos();
}

