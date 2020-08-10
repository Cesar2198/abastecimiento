<?php
require_once 'model/UsuarioModel.php';

class Main{

    function __construct(){

        
        // echo '<pre>';
        // print_r($usuario->findAll());
        // echo '</pre>';
        
        
    }

    function list(){
        $usuario = new Usuario();
        return json_encode($usuario->get());
    }
    function create(){
        $usuario = new Usuario();
        $result =  $usuario->create([
            "nombrecompleto" => "Alex hChinque",
            "telefono" => "78451236",
            "correo" => "alexhinke97@gmail.com",
            "passwd" => null,
            "rol" => 1 
        ]);
        return json_encode($result);
    }

    function delete(){
        echo "request for delete";
    }

    function edit(){
        echo "request for edit";
    }
}
