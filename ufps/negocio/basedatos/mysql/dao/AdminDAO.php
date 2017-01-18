<?php
require_once '../../../../negocio/basedatos/mysql/dto/AdminDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/IAdminDAO.php';

class AdminDAO extends Conexion implements IAdminDAO {

    function AdminDAO() {
        parent::conexion();
    }

    public function iniciarAdmin(\AdminDTO $adminDTO) {
        $val = false;
         $sql = "select * from admin e1 where e1.usuario=? and e1.contraseña=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($adminDTO->getUsuario(), $adminDTO->getContraseña())) && $stmt->rowCount() > 0) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

}
