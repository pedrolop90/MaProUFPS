<?php

require_once '../../../../negocio/basedatos/mysql/dto/CategoriaDTO.php';

interface ICategoriaDAO{
    
    function listarCategorias();
}