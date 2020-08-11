<?php
require_once 'model/municipioModel.php';

class Municipio{


    function __construct(){

        
    }

    function list(){
        $municipio = new MunicipioModel();
        return json_encode($municipio->get());
    }
    function create($request){
        $mun = new MunicipioModel();
        $result = $mun->create([
            "municipio" => $request["municipio"],
            "iddep" => $request["iddep"]
        ]); 
        return json_encode($result);
    }

    function delete(){
        
    }

    function edit(){
        
    }
}
