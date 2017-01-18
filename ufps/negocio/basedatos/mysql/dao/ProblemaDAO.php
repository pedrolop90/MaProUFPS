<?php

require_once '../../../../negocio/basedatos/mysql/dto/ProblemaDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/IProblemaDAO.php';

class ProblemaDAO extends Conexion implements IProblemaDAO {

    function ProblemaDAO() {
        parent::conexion();
    }

    public function registrarProblema(ProblemaDTO $ejercicio) {
        $sql="select id_docente from docente where usuario=?";
        $stmt=$this->db_conexion->prepare($sql);
        $stmt->execute(array($ejercicio->getDocente()));
        $id=$stmt->fetch()[0];
        $stmt->closeCursor();
        $val = false;
        $sql = "insert into problema values(0,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($id, $ejercicio->getCategoria(),$ejercicio->getNombre(),  $ejercicio->getTiempoLimite(), $ejercicio->getEntrada(), $ejercicio->getSalida(), $ejercicio->getEnunciado(),$ejercicio->getEntradasT(),$ejercicio->getSalidasT()))) {
            $val = true;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }
    private function buscarDocente($id){
      $sql = "select p1.id_docente from docente p1 where p1.id_docente)?";
       
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($id));
        $res=$stmt->fetch()[0];
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $res;  
    }
    public function listarProblemas() {
      $sql = "select p1.id_problema,p1.id_docente,p1.nombre as nombreP,c1.nombre as nombreC,p1.tiempo_limite "
              . "from problema p1  join categoria c1 on p1.id_categoria=c1.id_categoria";
       
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute();
        $arreglo = array();
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        return $arreglo;
    }
    function listarProblemasPropios(ProblemaDTO $Problema){
        $id=$this->buscarDocente($Problema->getDocente());
        $sql = "select p1.id_problema,p1.id_docente,p1.nombre as nombreP,c1.nombre as nombreC,p1.tiempo_limite from problema p1  join categoria c1 on p1.id_docente=? and p1.id_categoria=c1.id_categoria";
       
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute($id);
        $arreglo = array();
        for ($index = 0; $res = $stmt->fetch(PDO::FETCH_ASSOC); $index++) {
            $arreglo[$index] = $res;
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $arreglo;
    }
    function verProblema(ProblemaDTO $problema){
        $sql="select p1.nombre,p1.enunciado,p1.entrada,p1.salida,p1.entradasT,p1.salidasT from problema p1 where  p1.id_problema=?";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($problema->getId()));
        $arreglo = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $this->db_conexion=null;
        return $arreglo;
    }

    public function eliminarProblema(ProblemaDTO $problema) {
        $var =false;
        $sql="delete from problema where id_problema=?";
        $stmt = $this->db_conexion->prepare($sql);
        if($stmt->execute(array($problema->getId()))){
            $var=true;
        }
        $stmt->closeCursor();
        $this->db_conexion=null;
        return $var;
    }
}
