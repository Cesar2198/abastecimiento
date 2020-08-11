<?php
require_once 'model/reportesModel.php';

class Reporte{


    function __construct(){

        
    }

    function list(){
        $rep = new ReporteModel();
        return json_encode($rep->get());
    }
    function create($request){
        $rep = new ReporteModel();
        $idmun = $rep->sqlQuery("select m.id from departamentos d, municipios m where m.municipio like '%".$request["municipio"]."%' and d.departamento like '%".$request["departamento"]."%'  and d.id=m.iddep; ");
        if(isset($idmun["code"]) && $idmun["code"] == 1){
            echo "Esta con problemas";
        }else{
            if(count($idmun) != 0){
                $result = $rep->create([
                            "dui" => $request["dui"],
                            "referencia" => $request["referencia"],
                            "localidad" => $request["localidad"],
                            "pais" => $request["pais"],
                            "cantidad" => $request["cantidad"],
                            "idMun" => $idmun[0]["id"]
                ]);
                return json_encode($result);
            }else{
                return json_encode($rep->getMessage("No se puede crear porque no se encuentra el municipio", 1));
            }
        }
    }

    function delete(){
        
    }

    function edit(){
        
    }
}
?>