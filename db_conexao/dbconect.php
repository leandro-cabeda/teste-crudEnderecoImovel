<?php

class Conecta
{
    var $db;

    function __construct()
    {

        $this->db = new mysqli('localhost', 'root', '', 'locacao_imoveis', 3307);
    }

    public function getDb()
    {
        return $this->db;
    }
}
