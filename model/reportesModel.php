<?php

class ReporteModel extends Model{
    protected $autoIncrement = true;
    protected $primarykey = "id";
    protected $table = "reportes";
    protected $fields = [
        "id",
        "dui",
        "referencia",
        "localidad",
        "pais",
        "cantidad",
        "idMun"
    ];
    function __construct()
    {
        parent::__construct($this);
    }
}



?>