<?php

require_once '../../../../negocio/basedatos/mysql/dto/DocenteDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/IDocenteDAO.php';

class DocenteDAO extends Conexion implements IDocenteDAO {

    function DocenteDAO() {
        parent::conexion();
    }

    public function listarDocentes() {
        $arreglo = array();
        $sql = "select d1.id_docente,d1.nombre,d1.apellido from docente d1";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute();
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        $this->db_conexion=null;
        return $arreglo;
        
    }

    public function iniciarDocente(\DocenteDTO $Docente) {
        $val = false;
        $sql = "select e1.contrasela from docente e1 where e1.usuario=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($Docente->getUsuario())) && $stmt->rowCount() > 0) {
            $contraseña = $stmt->fetch()[0];
            $stmt->closeCursor();
            if (password_verify($Docente->getContraseña(), $contraseña)) {
                echo "x";
                $sql = "select * from docente e1 where e1.usuario=? and e1.contrasela=?";
                $stmt = $this->db_conexion->prepare($sql);
                if ($stmt->execute(array($Docente->getUsuario(), $contraseña)) && $stmt->rowCount() > 0) {
                    $val = true;
                }
            }
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

    public function registrarDocente(\DocenteDTO $Docente) {
        $val = false;
        $sql = "insert into docente values(0,?,?,?,?,?);";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($Docente->getNombre(), $Docente->getApellido(),  $Docente->getCorreo(),$Docente->getUsuario(), password_hash($Docente->getContraseña(), PASSWORD_DEFAULT)))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }
    
    public function actualizarDocente(DocenteDTO $Docente) {
        $val = false;
        $sql = "update docente  set nombre=? ,apellido=?,correo=?,contraseña=? where usuario=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($Docente->getNombre(),$Docente->getApellido(),$Docente->getCorreo(),password_hash($Docente->getContraseña(), PASSWORD_DEFAULT),$Docente->getId()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }
    
    public function eliminarDocente(DocenteDTO $Docente) {
        $val = false;
        $sql = "select e1.contraseña from docente e1 where e1.usuario=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($Docente->getUsuario())) && $stmt->rowCount() > 0) {
            $contraseña = $stmt->fecht()[0];
            $stmt->closeCursor();
            if (password_verify($Docente->getContraseña(), $contraseña)) {
                $sql = "delete  from docente e1 where e1.usuario=? and e1.contraseña=?";
                $stmt = $this->db_conexion->prepare($sql);
                if ($stmt->execute(array($Docente->getUsuario(), $contraseña))) {
                    $val = true;
                }
            }
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

}
