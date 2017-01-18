<?php

require_once '../../../../negocio/basedatos/mysql/dto/ParticipanteDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/IParticipanteDAO.php';

class ParticipanteDAO extends Conexion implements IParticipanteDAO {

    function ParticipanteDAO() {
        parent::conexion();
    }

    public function actualizarParticipante(\ParticipanteDTO $participante) {
        $val = false;
        $sql = "update participante  set nombre=? ,apellido=?,codigo=?,correo=?  where id_participante=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($participante->getNombre(),$participante->getApellido(),$participante->getCodigo(),$participante->getCorreo(),$participante->getId()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

    public function listarParticipantesPorEquipo(\ParticipanteDTO $participante) {
        $arreglo = array();
        $sql = "select p1.id_participante,p1.nombre,p1.apellido,p1.codigo,p1.correo from equipo e1 join participante p1 on e1.usuario=? and e1.id_equipo=p1.id_equipo";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($participante->getEquipo()));
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $arreglo;
    }

    public function eliminarParticipante(\ParticipanteDTO $participante) {
        echo $participante->getId()."__";
        $val = false;
        $sql = "update participante set id_equipo=0 where id_participante=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->Execute(array($participante->getId()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

    private function buscarIdEquipo(ParticipanteDTO $participante) {
        $sql = "select e1.id_equipo from equipo e1 where e1.usuario=?";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($participante->getEquipo()));
        $re = $stmt->fetch()[0];
        $stmt->closeCursor();
        return $re;
    }

    public function registrarParticipante(ParticipanteDTO $participante) {
        $val = false;
        $sql = "select p1.id_participante from participante p1 where p1.codigo=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($participante->getCodigo())) && $stmt->rowCount() > 0) {

            $id = $stmt->fetch()[0];
            $stmt->closeCursor();
            $equipo = $this->buscarIdEquipo($participante);
            $sql = "update participante  set id_equipo=? where id_participante=?";
            $stmt = $this->db_conexion->prepare($sql);
            if ($stmt->execute(array($equipo, $id))) {
                $val = true;
            }
        } else {
            $stmt->closeCursor();
            $equipo = $this->buscarIdEquipo($participante);
            $sql = "insert into participante values(0,?,?,?,?,?)";
            $stmt = $this->db_conexion->prepare($sql);
            if ($stmt->execute(array($equipo, $participante->getNombre(), $participante->getApellido(), $participante->getCodigo(), $participante->getCorreo()))) {
                $val = true;
            }
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

}
