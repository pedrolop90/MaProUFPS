<?php

require_once '../../../../negocio/INegocio.php';
require_once '../../../../negocio/basedatos/DAOFactory.php';
require_once '../../../../negocio/basedatos/mysql/dto/DocenteDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EquipoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/AdminDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ParticipanteDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EventoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ProblemaDTO.php';

class Negocio implements INegocio {

    private $factory;

    function Negocio() {
        $this->factory = new DAOFactory();
    }

    //equipo
    function iniciarEquipo(EquipoDTO $equipo) {
        $equipoDAO = $this->factory->obtenerEquipo();
        return $equipoDAO->iniciarEquipo($equipo);
    }

    function registrarEquipo(EquipoDTO $equipo) {
        $equipoDAO = $this->factory->obtenerEquipo();
        return $equipoDAO->registrarEquipo($equipo);
    }

    function actualizarEquipo(\EquipoDTO $equipo) {
        $equipoDAO = $this->factory->obtenerEquipo();
        return $equipoDAO->actualizarEquipo($equipo);
    }

    function listarEquipos() {
        $equipoDAO = $this->factory->obtenerEquipo();
        return $equipoDAO->listarEquipos();
    }

    function listarRankingGeneral() {
        $equipoDAO = $this->factory->obtenerEquipo();
        return $equipoDAO->listarRankingGeneral();
    }

    //participante
    function registrarParticipante(ParticipanteDTO $participante) {
        $participanteDAO = $this->factory->obtenerParticipante();
        return $participanteDAO->registrarParticipante($participante);
    }

    function eliminarParticipante(ParticipanteDTO $participante) {
        $participanteDAO = $this->factory->obtenerParticipante();
        return $participanteDAO->eliminarParticipante($participante);
    }

    function actualizarParticipante(ParticipanteDTO $participante) {
        $participanteDAO = $this->factory->obtenerParticipante();
        return $participanteDAO->actualizarParticipante($participante);
    }

    function listarParticipantesPorEquipo(\ParticipanteDTO $participante) {
        $participanteDAO = $this->factory->obtenerParticipante();
        return $participanteDAO->listarParticipantesPorEquipo($participante);
    }

    //evento
    function inscribirseEvento(\EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->inscribirseEvento($evento);
    }

    function listarEventosNoInscritasPorEquipo(EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->listarEventosNoInscritasPorEquipo($evento);
    }

    function listarEventosInscritasPorEquipo(EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->listarEventosInscritasPorEquipo($evento);
    }

    function registrarEvento(\EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->registrarEvento($evento);
    }

    function eliminarEvento(\EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->eliminarEvento($evento);
    }

    function desinscribirseEvento(\EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->desinscribirseEvento($evento);
    }

    function buscarFechasEvento(EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->buscarFechasEvento($evento);
    }

    function buscarMaraton(EventoDTO $evento) {
        $eventoDAO = $this->factory->obtenerEvento();
        return $eventoDAO->buscarEvento($evento);
    }

    //docente
    function registrarDocente(DocenteDTO $docente) {
        $docenteDAO = $this->factory->obtenerDocente();
        return $docenteDAO->registrarDocente($docente);
    }

    function iniciarDocente(DocenteDTO $docente) {
        $docenteDAO = $this->factory->obtenerDocente();
        return $docenteDAO->iniciarDocente($docente);
    }

    function listarDocentes() {
        $docenteDAO = $this->factory->obtenerDocente();
        return $docenteDAO->listarDocentes();
    }

    function actualizarDocente(DocenteDTO $docente) {
        $docenteDAO = $this->factory->obtenerDocente();
        return $docenteDAO->actualizarDocente($docente);
    }

    //admin
    function iniciarAdmin(AdminDTO $admin) {
        $adminDAO = $this->factory->obtenerAdmin();
        return $adminDAO->iniciarAdmin($admin);
    }

    function eliminarEquipo(EquipoDTO $equipo) {
        $equipoDAO = $this->factory->obtenerEquipo();
        return $equipoDAO->eliminarEquipo($equipo);
    }

    function eliminarDocente(DocenteDTO $docente) {
        $docenteDAO = $this->factory->obtenerDocente();
        return $docenteDAO->eliminarDocente($docente);
    }

    //evento
    public function listarMaratonesActivasPorEquipo(EventoDTO $eventoDTO) {
        $evento = $this->factory->obtenerEvento();
        return $evento->listarEventosInscritasPorEquipo($eventoDTO);
    }

    public function listarEventosDocente(\EventoDTO $evento) {
        $eventoDTO = $this->factory->obtenerEvento();
        return $eventoDTO->listarEventosDocente($evento);
    }

    //problema
    public function registrarProblema(ProblemaDTO $problema) {
        $problemaDTO = $this->factory->obtenerProblema();
        return $problemaDTO->registrarProblema($problema);
    }

    public function listarProblemas() {
        $problemaDTO = $this->factory->obtenerProblema();
        return $problemaDTO->listarProblemas();
    }

    public function eliminarProblema(ProblemaDTO $problema) {
        $problemaDTO = $this->factory->obtenerProblema();
        return $problemaDTO->eliminarProblema($problema);
    }

    public function listarProblemasPropios() {
        $problemaDTO = $this->factory->obtenerProblema();
        return $problemaDTO->listarProblemasPropios();
    }

    public function verProblema(ProblemaDTO $problema) {
        $problemaDTO = $this->factory->obtenerProblema();
        return $problemaDTO->verProblema($problema);
    }

    //categoria
    public function listarCategorias() {
        $categoriaDTO = $this->factory->obtenerCategoria();
        return $categoriaDTO->listarCategorias();
    }

    public function listarCategoriasBusquedaAvanzada($eventos) {
        $categoriaDTO = $this->factory->obtenerCategoria();
        return $categoriaDTO->listarCategoriasBusquedaAvanzada($eventos);
    }

    //envio

    public function enviarEjercicio(\EnvioDTO $envio) {
        $envioDTO = $this->factory->obtenerEnvio();
        return $envioDTO->enviarEjercicio($envio);
    }

    public function CargarProblemasMaraton(EventoDTO $evento) {
        $eventoDTO = $this->factory->obtenerEvento();
        return $eventoDTO->CargarProblemasMaraton($evento);
    }

    public function listarProblemasMaraton(EventoDTO $evento) {
        $eventoDTO = $this->factory->obtenerEvento();
        return $eventoDTO->listarProblemasMaraton($evento);
    }

    public function listarEnviosDeEquipoPorEvento(EnvioDTO $envio) {
        $envioDTO = $this->factory->obtenerEnvio();
        return $envioDTO->listarEnviosDeEquipoPorEvento($envio);
    }

}
