<?php
require_once '../../../../negocio/basedatos/mysql/dto/DocenteDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EquipoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/AdminDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ParticipanteDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EventoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ProblemaDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EnvioDTO.php';
interface INegocio{
    //equipo
    function registrarEquipo(EquipoDTO $equipo);
    function iniciarEquipo(EquipoDTO $equipo);
    function actualizarEquipo(EquipoDTO $equipo);
    function listarEquipos();
    function eliminarEquipo(EquipoDTO $equipo);
    function listarRankingGeneral();
    
    //participante
    function eliminarParticipante(ParticipanteDTO $participante);
    function registrarParticipante(ParticipanteDTO $participante);
    function actualizarParticipante(ParticipanteDTO $participante);
    function listarParticipantesPorEquipo(ParticipanteDTO $participante);
    
    //evento
    function registrarEvento(EventoDTO $evento);
    function listarEventosNoInscritasPorEquipo(EventoDTO $evento);
    function inscribirseEvento(EventoDTO $evento);
    function listarEventosInscritasPorEquipo(EventoDTO $evento);
    function eliminarEvento(EventoDTO $evento);
    function desinscribirseEvento(\EventoDTO $evento);
    function listarEventosDocente(EventoDTO $evento);
    function buscarFechasEvento(EventoDTO $evento);
    function buscarMaraton(EventoDTO $evento);
    
    //docente
    function registrarDocente(DocenteDTO $docente);
    function iniciarDocente(DocenteDTO $docente);
    function eliminarDocente(DocenteDTO $docente);
    function listarDocentes();
    function actualizarDocente(DocenteDTO $docente);
    
    //admin
    function iniciarAdmin(AdminDTO $admin);
    
    //ejercicio
    function registrarProblema(ProblemaDTO $problema);
    function listarProblemas();
    function verProblema(ProblemaDTO $problema);
    function eliminarProblema(ProblemaDTO $problema);
    
    //categoria
    function listarCategorias();
    function listarCategoriasBusquedaAvanzada($eventos);
    //envio
    function enviarEjercicio(EnvioDTO $envio);
    function CargarProblemasMaraton(EventoDTO $evento);
    function listarProblemasMaraton(EventoDTO $evento);
    function listarEnviosDeEquipoPorEvento(EnvioDTO $envio);
}
