<?php
require_once '../../../../negocio/basedatos/mysql/dto/ParticipanteDTO.php';
interface IParticipanteDAO{
    
     function eliminarParticipante(ParticipanteDTO $participante);
    function registrarParticipante(ParticipanteDTO $participante);
    function actualizarParticipante(ParticipanteDTO $participante);
    function listarParticipantesPorEquipo(ParticipanteDTO $participante);
}