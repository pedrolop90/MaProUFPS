<?php

require_once '../../../../negocio/basedatos/mysql/dao/ConexionApi.php';
require_once '../../../../negocio/basedatos/mysql/dto/EnvioDTO.php';
require_once '../../../../negocio/basedatos/mysql/Conexion.php';
require_once '../../../../negocio/basedatos/interfaz/IEnvioDAO.php';

class EnvioDAO extends Conexion implements IEnvioDAO {

    private $api;
    private $token = "a8caf15ddaa18d37b7719f16c83d0b3ffcbd49a8";

    public function EnvioDAO() {
        parent::conexion();
        $this->api = new HackApi();
        $this->api->set_client_secret($this->token);
    }

    private function traerNombreEquipo($id) {
        $sql = "select p.nick from equipo p where p.id_equipo=?";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($id));
        $val = $stmt->fetch()[0];
        $stmt->closeCursor();
        return $val;
    }

    public function listarEnviosDeEquipoPorEvento(EnvioDTO $envio) {
        $equipos = array();
        $resultado = array();
        $sql = "select distinct e1.id_equipo from equipo_evento e1 where e1.id_evento=?";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($envio->getId_evento()));
        for ($index = 0; ($val = $stmt->fetch(PDO::FETCH_ASSOC)); $index++) {
            $equipos[$index] = $val["id_equipo"];
        }
        $stmt->closeCursor();
        for ($index1 = 0; $index1 < count($equipos); $index1++) {
            $resultado[$index1]["nombre"] = $this->traerNombreEquipo($equipos[$index1]);
            $resultado[$index1]["tiempo"] = 0;
            $sql = "select DISTINCT a1.problema,a1.aceptados,a2.errados
from 
(select  e2.id_equipo as equipo,e1.id_problema as problema,count(e3.id_problema_evento_problema)  as aceptados
			from problema_evento e1  join equipo_evento e2 on e1.id_evento=? and  e2.id_evento=e1.id_evento
			and e2.id_equipo=? left join envio e3 on e3.id_problema_evento_evento=e1.id_evento
            and e3.id_resultado=1
			group by  e2.id_equipo,e1.id_problema)a1,
(select  e2.id_equipo as equipo,e1.id_problema as problema,count(e3.id_problema_evento_problema)  as errados
			from problema_evento e1  join equipo_evento e2 on e1.id_evento=? and  e2.id_evento=e1.id_evento
			and e2.id_equipo=? left join envio e3 on e3.id_problema_evento_evento=e1.id_evento
            and e3.id_resultado=0
			group by  e2.id_equipo,e1.id_problema)a2";
            $stmt = $this->db_conexion->prepare($sql);
            $stmt->execute(array($envio->getId_evento(), $equipos[$index1],$envio->getId_evento(), $equipos[$index1]));
            $contador = 0;
            for ($index2 = 0; ($val = $stmt->fetch(PDO::FETCH_ASSOC)); $index2++) {
                if ($val["aceptados"] > 0) {
                    $contador++;
                    $resultado[$index1]["p" + ($index2 + 1)] = 1;
                    $resultado[$index1]["exito"] = true;
                } else {
                    $resultado[$index1]["p" + ($index2 + 1)] = $val["errados"];
                    $resultado[$index1]["exito"] = false;
                }
            }
            $resultado[0]["ejercicios"]=$index2;
            $resultado[$index1]["resueltos"] = $contador;
            $stmt->closeCursor();
        }
        
        $this->db_conexion = null;
        return $resultado;
    }

    public function enviarEjercicio(EnvioDTO $envio) {
        $val = false;
        $sql = "select id_problema_evento from problema_evento where id_problema=? and id_evento=?";
        $stmt = $this->db_conexion->prepare($sql);
        if ($stmt->execute(array($envio->getId_problema(), $envio->getId_evento())) && $stmt->rowCount() > 0) {
            $id = $stmt->fetch()[0];
            $stmt->closeCursor();
            $sql = "insert into envio values(0,?,?,?,?)";
            $stmt = $this->db_conexion->prepare($sql);
            if ($stmt->execute(array($id, $envio->getId_evento(), $envio->getId_equipo(), $this->comprobarSolucion($envio)))) {
                $val = true;
            }
        }
        $stmt->closeCursor();
        $this->db_conexion = null;
        return $val;
    }

    private function comprobarSolucion(EnvioDTO $envio) {
        $ch = curl_init();
        $arreglo = $this->IOProblemas($envio->getId_problema());
        $this->api->init("JAVA", curl_escape($ch, $envio->getResultado()), $arreglo["entradasT"]);
        $this->api->run();
        curl_close($ch);
        //falta colocar un metodo que quite los espacios en blanco
        $resultados = $this->api->output_html;
        $resultados = trim($resultados);
        if (str_replace("<br>", "", $resultados) == str_replace(" ", "", $arreglo["salidasT"])) {
            return 1;
        } else {
            return 0;
        }
    }

    private function IOProblemas($id_problema) {
        $sql = "select p1.entradasT,p1.salidasT from problema p1 where p1.id_problema=?";
        $stmt = $this->db_conexion->prepare($sql);
        $stmt->execute(array($id_problema));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $res;
    }

}
