<?php
require_once '../../../../negocio/Negocio.php';
class ServiceLocator {

	private static $instance;
    private  $negocio;

    private function  ServiceLocator() {
        // Se obtiene por instanciacion directa.
        // Pero en otros casos podria incluir invocacion remota
        // o llamado a un servicio web.
    	$this->negocio = new Negocio();
    }

    static function   getInstance() {
        if (ServiceLocator::$instance == null) {
            ServiceLocator::$instance = new ServiceLocator();
        }
        return ServiceLocator::$instance;
    }

    function getBusinessFacadeInstance() {
        return $this->negocio;
    }
	
}