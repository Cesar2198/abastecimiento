<?php
class MunicipioModel extends Model{
    protected $autoIncrement = true;
    protected $primarykey = "id";
    protected $table = "municipios";
    protected $fields = [
        "id",
        "municipio",
        "iddep"
    ];

    function __construct()
    {
        parent::__construct($this);
    }
}





?>