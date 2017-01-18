<?php

require_once '../../../../negocio/basedatos/mysql/dto/CategoriaDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/ICategoriaDAO.php';

class CategoriaDAO extends Conexion implements ICategoriaDAO {

    public function listarCategorias() {
        $arreglo = array();
        $sql = "select e1.id_categoria,e1.nombre,e1.descripcion from categoria e1";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute();
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $arreglo;
    }

}
