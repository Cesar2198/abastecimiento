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
    function create($request){
        // var_dump($request);
        // echo $request["departamento"];
        $dep = new DepartamentoModel();
        $result = $dep->create([
            "departamento" => $request["departamento"],
            "codigo" => $request["codigo"]
        ]); 
        return json_encode($result);
    }

    function delete(){
        
    }

    function edit(){
 
    }
}
