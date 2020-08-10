<?php
require_once 'model/RolModel.php';

class Rol{

    function __construct(){

        
        // echo '<pre>';
        // print_r($usuario->findAll());
        // echo '</pre>';
        
        
    }

    function list(){
        $rol = new RolModel();
        return json_encode($rol->get());
    }
    function create(){
        $rol = new RolModel();
        $result = $rol->create([
            "id" => 2,
            "nombre" => "artista",
            "descripcion" => "Usuario quien maneja una cuenta de artista"
        ]);
        return json_encode($result);
    }

    function delete(){
        $rol = new RolModel();
        return json_encode($rol->delete(2));
    }

    function edit(){
        echo "request for edit";
    }
}
