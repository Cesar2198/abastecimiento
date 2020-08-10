<?php

class RolModel extends Model{
    protected $autoIncrement = false;
    protected $primarykey = "id";
    protected $table = "roles";
    protected $fields = [
        "id",
        "nombre",
        "descripcion"
    ];
    protected $skipfields = [
        "descripcion"
    ];
    function __construct()
    {
        parent::__construct($this);
    }
}



?>