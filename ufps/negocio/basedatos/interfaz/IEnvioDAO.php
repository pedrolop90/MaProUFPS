<?php
require_once '../../../../negocio/basedatos/mysql/dto/EnvioDTO.php';
interface IEnvioDAO{
    
    function enviarEjercicio(EnvioDTO $envio);
    function listarEnviosDeEquipoPorEvento(EnvioDTO $envio);
}