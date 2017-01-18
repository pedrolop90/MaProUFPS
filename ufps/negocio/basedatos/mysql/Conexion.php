<?php
require_once 'Config.php';
class Conexion{
    protected $db_conexion;
    
    function conexion(){
        try{
        $this->db_conexion=new PDO(DB_HOST,DB_USER,DB_PASS);
        $this->db_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db_conexion->exec("set character set ".DB_CHARSET);
        }  catch (Exception $e){
            echo "ocurrio un error ".$e->getMessage()." en la linea ".$e->getLine();
        }
    }
    
}