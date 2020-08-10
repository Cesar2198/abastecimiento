<?php



class Usuario extends Model{
    protected $autoIncrement = true;
    protected $primarykey = "id";
    protected $table = "usuarios";
    protected $fields = [
        "id",
        "nombrecompleto",
        "telefono",
        "correo",
        "passwd",
        "rol"
    ];
    protected $skipfields = [
        "passwd"
    ];
    function __construct()
    {
        parent::__construct($this);
    }
}








?>