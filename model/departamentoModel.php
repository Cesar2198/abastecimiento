<?php
class DepartamentoModel extends Model{
    protected $autoIncrement = true;
    protected $primarykey = "id";
    protected $table = "departamentos";
    protected $fields = [
        "id",
        "departamento",
        "codigo"
    ];

    function __construct()
    {
        parent::__construct($this);
    }
}





?>