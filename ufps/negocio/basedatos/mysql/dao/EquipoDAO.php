<?php

require_once '../../../../negocio/basedatos/mysql/dto/EquipoDTO.php';
require_once '../../../../negocio/basedatos/mysql/dto/ParticipanteDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/IEquipoDAO.php';

class EquipoDAO extends Conexion implements IEquipoDAO {

    function EquipoDAO() {
        parent::conexion();
    }
    
    
    
    public function listarEquipos() {
        $arreglo = array();
        $sql = "select id_equipo,usuario,nick as nombre from equipo";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute();
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        $this->db_conexion=null;
        return $arreglo;
    }

    public function actualizarEquipo(\EquipoDTO $equipo) {
        $val = false;
        $sql = "update equipo  set nombre=? ,contraseña=? where usuario=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($equipo->getNick(), password_hash($equipo->getContraseña(), PASSWORD_DEFAULT), $equipo->getUsuario()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

    public function eliminarEquipo(EquipoDTO $equipo) {
        $val = false;
        $sql = "delete from equipo  where id_equipo=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($equipo->getUsuario()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

    public function iniciarEquipo(EquipoDTO $equipo) {
        $val = false;
        $sql = "select e1.contraseña from equipo e1 where e1.usuario=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($equipo->getUsuario())) && $stmt->rowCount() > 0) {
            $contraseña = $stmt->fetch()[0];
            $stmt->closeCursor();
            if (password_verify($equipo->getContraseña(),$contraseña)) {
                $sql = "select * from equipo e1 where e1.usuario=? and e1.contraseña=?";
                $stmt = $this->db_conexion->prepare($sql);
                if ($stmt->execute(array($equipo->getUsuario(),$contraseña)) && $stmt->rowCount() > 0) {
                    $val = true;
                }
            }
        }
        $stmt->closeCursor();
        $this->db_conexion=null;
        return $val;
    }

    public function registrarEquipo(\EquipoDTO $equipo) {
        $val = false;
        $sql = "insert into equipo values(0,?,?,?);";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($equipo->getUsuario(), password_hash($equipo->getContraseña(), PASSWORD_DEFAULT), $equipo->getNick()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }
    public function listarRankingGeneral(){
        $arreglo = array();
        $sql = "select r1.enviados,r1.aceptados,e1.nick as nombre,r1.tiempo from ranking_general r1 join equipo e1 on r1.id_equipo=e1.id_equipo order by 2,3";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute();
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        $this->db_conexion=null;
        return $arreglo;
    }
}
