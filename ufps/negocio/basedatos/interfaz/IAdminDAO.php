<?php
require_once '../../../../negocio/basedatos/mysql/dto/AdminDTO.php';
interface IAdminDAO{
    function iniciarAdmin(AdminDTO $admin);
    
}