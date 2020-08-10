<?php
require_once 'model/departamentoModel.php';

class Departamento{


    function __construct(){

        
        // echo '<pre>';
        // print_r($usuario->findAll());
        // echo '</pre>';
        
        
    }

    function list(){
        $Departamento = new DepartamentoModel();
        return json_encode($Departamento->get());
    }
    function create(){
    
    }

    function delete(){
 
    }

    function edit(){
 
    }
}
