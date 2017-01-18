<?php
require_once '../../../../negocio/basedatos/mysql/dto/EventoDTO.php';
interface IEventoDAO{
    function registrarEvento(EventoDTO $evento);
    function listarEventosNoInscritasPorEquipo(EventoDTO $evento);
    function inscribirseEvento(EventoDTO $evento);
    function listarEventosInscritasPorEquipo(EventoDTO $evento);
    function eliminarEvento(EventoDTO $evento);
    function desinscribirseEvento(EventoDTO $evento);
    function listarEventosDocente(EventoDTO $evento);
    function CargarProblemasMaraton(EventoDTO $evento);
}
