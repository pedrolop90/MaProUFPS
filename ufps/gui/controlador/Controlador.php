<?php

require_once '../../../controlador/Locator/ServiceLocator.php';
require_once '../../../../negocio/basedatos/mysql/dto/DocenteDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EquipoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/AdminDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ParticipanteDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EventoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ProblemaDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/EnvioDTO.php';

class Controlador {

    private $locator;

    function Controlador() {
        $this->locator = ServiceLocator::getInstance();
    }

    function iniciarDocente($usuario, $contraseña) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $docente = new DocenteDTO();
            $docente->setUsuario($usuario);
            $docente->setContraseña($contraseña);
            $exito = $facade->iniciarDocente($docente);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function iniciarEquipo($usuario, $contraseña) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $equipo = new EquipoDTO();
            $equipo->setUsuario($usuario);
            $equipo->setContraseña($contraseña);
            $exito = $facade->iniciarEquipo($equipo);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function registrarDocente($nombre, $apellido, $usuario, $correo, $contraseña) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $docente = new DocenteDTO();
            $docente->__DocenteDTO(0, $nombre, $apellido, $correo, $usuario, $contraseña);
            $exito = $facade->registrarDocente($docente);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function registrarEquipo($usuario, $nombre, $contraseña) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $equipo = new EquipoDTO();
            $equipo->__EquipoDTO(0, $usuario, $nombre, $contraseña);
            $exito = $facade->registrarEquipo($equipo);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function eliminarEquipo($usuario) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $equipo = new EquipoDTO();
            $equipo->setUsuario($usuario);
            $exito = $facade->eliminarEquipo($equipo);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function eliminarDocente($usuario) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $docente = new EquipoDTO();
            $docente->setUsuario($usuario);
            $exito = $facade->eliminarDocente($docente);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function actualizarEquipo($usuario, $nombre, $contraseña) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $equipo = new EquipoDTO();
            $equipo->__EquipoDTO(0, $usuario, $nombre, $contraseña);
            $exito = $facade->actualizarEquipo($equipo);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function iniciarAdmin($usuario, $contraseña) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $admin = new AdminDTO();
            $admin->__AdminDTO($usuario, $contraseña);
            $exito = $facade->iniciarAdmin($admin);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function listarEquipos() {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo;
        try {
            $arreglo = $facade->listarEquipos();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function listarParticipantesPorEquipo($equipo) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo;
        try {
            $participantes = new ParticipanteDTO();
            $participantes->setEquipo($equipo);
            $arreglo = $facade->listarParticipantesPorEquipo($participantes);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function registrarParticipante($nombre, $apellido, $codigo, $correo, $equipo) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $participante = new ParticipanteDTO();
            $participante->__ParticipanteDTO(0, $nombre, $apellido, $codigo, $correo, $equipo);
            $exito = $facade->registrarParticipante($participante);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function eliminarParticipante($id_participante) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $Participante = new ParticipanteDTO();
            $Participante->setId($id_participante);
            $exito = $facade->eliminarParticipante($Participante);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function listarMaratonesActivasPorEquipo($equipo,$busquedas) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $evento = new EventoDTO();
            $evento->setEquipo($equipo);
            $evento->setProblemas($busquedas);
            $arreglo = $facade->listarEventosInscritasPorEquipo($evento);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function listarMaratonesNoInscritas($equipo,$busquedas) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $evento = new EventoDTO();
            $evento->setEquipo($equipo);
            $evento->setProblemas($busquedas);
            $arreglo = $facade->listarEventosNoInscritasPorEquipo($evento);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function inscribirseEvento($equipo, $id_evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $evento = new EventoDTO();
            $evento->setEquipo($equipo);
            $evento->setId($id_evento);
            $exito = $facade->inscribirseEvento($evento);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function registrarMaraton($docente, $nombre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin, $problemas, $visibilidad) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $maraton = new EventoDTO();
            $maraton->__EventoDTO(0, $nombre, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin);
            $maraton->setDocente($docente);
            $maraton->setProblemas($problemas);
            $maraton->setVisibilidad($visibilidad);
            $exito = $facade->registrarEvento($maraton);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function listarMaratonesDocente($docente) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $evento = new EventoDTO();
            $evento->setDocente($docente);
            $arreglo = $facade->listarEventosDocente($evento);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function eliminarEvento($id_evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $maraton = new EventoDTO();
            $maraton->setId($id_evento);
            $exito = $facade->eliminarEvento($maraton);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function registrarEjercicio($docente, $nombre, $categoria, $tiempo, $entrada, $salida, $enunciado, $entradasT, $salidasT) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $problema = new ProblemaDTO();
            $problema->__ProblemaDTO(0, $docente, $nombre, $categoria, $tiempo, $entrada, $salida, $enunciado, $entradasT, $salidasT);
            $exito = $facade->registrarProblema($problema);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function listarProblemas() {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $arreglo = $facade->listarProblemas();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function listarProblemasPropios($equipo) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $var = new ProblemaDTO();
            $var->setDocente($docente);
            $arreglo = $facade->listarProblemas($equipo);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function verProblema($id_problema) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $problemaDTO = new ProblemaDTO();
            $problemaDTO->setId($id_problema);
            $arreglo = $facade->verProblema($problemaDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function listarCategorias() {
        $facade = $this->locator->getBusinessFacadeInstance();
        $arreglo = array();
        try {
            $arreglo = $facade->listarCategorias();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $arreglo;
    }

    function eliminarProblema($id_problema) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = false;
        try {
            $problemaDTO = new ProblemaDTO();
            $problemaDTO->setId($id_problema);
            $var = $facade->eliminarProblema($problemaDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function enviarEjercicio($evento, $equipo, $ejercicio, $solucion) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = false;
        try {
            $envio = new EnvioDTO();
            $envio->__envioDTO(0, $solucion, $equipo, $evento, $ejercicio);
            $var = $facade->enviarEjercicio($envio);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function CargarProblemasMaraton($evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $eventoDTO = new EventoDTO();
            $eventoDTO->setId($evento);
            $var = $facade->CargarProblemasMaraton($eventoDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function eliminarSubcripcionMaraton($equipo, $id_evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = false;
        try {
            $eventoDTO = new EventoDTO();
            $eventoDTO->setEquipo($equipo);
            $eventoDTO->setId($id_evento);
            $var = $facade->desinscribirseEvento($eventoDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function listarProblemasMaraton($id_Evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $eventoDTO = new EventoDTO();
            $eventoDTO->setId($id_Evento);
            $var = $facade->listarProblemasMaraton($eventoDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function actualizarParticipante($nombre, $apellido, $codigo, $correo, $id) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $participanteDTO = new ParticipanteDTO();
            $participanteDTO->__ParticipanteDTO($id, $nombre, $apellido, $codigo, $correo, 0);
            $exito = $facade->actualizarParticipante($participanteDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function actualizarDocente($nombre, $apellido, $correo, $contraseña, $id) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $exito = false;
        try {
            $docente = new DocenteDTO();
            $docente->__DocenteDTO($id, $nombre, $apellido, $correo, "", $contraseña);
            $exito = $facade->actualizarDocente($docente);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $exito;
    }

    function listarEnviosDeEquipoPorEvento($id_evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $envioDTO = new EnvioDTO();
            $envioDTO->setId_evento($id_evento);
            $var = $facade->listarEnviosDeEquipoPorEvento($envioDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function buscarFechasEvento($id_evento) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $eventoDTO = new EventoDTO();
            $eventoDTO->setId($id_evento);
            $var = $facade->buscarFechasEvento($eventoDTO);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $var;
    }

    function buscarMaraton($id_equipo, $consulta,$busquedas) {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $evento = new EventoDTO();
            $evento->setEquipo($id_equipo);
            $evento->setNombre($consulta);
            $evento->setProblemas($busquedas);
            $var = $facade->buscarMaraton($evento);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $var;
    }

    function listarRankingGeneral() {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $var = $facade->listarRankingGeneral();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $var;
    }

    function listarDocentes() {
        $facade = $this->locator->getBusinessFacadeInstance();
        $var = array();
        try {
            $var = $facade->listarDocentes();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $var;
    }
}
