<?php


class Model
{
    private $auto;
    private $key;
    private $tabla;
    private $campos = [];
    private $skips = [];

    function __construct($object)
    {
        $this->db = new Database();
        $array = get_object_vars($object);

        $this->auto =  $array["autoIncrement"] == 1 ? "true" : "false";
        $this->tabla = $array["table"];
        $this->key = $array["primarykey"];
        for ($i = 0; $i < count($array["fields"]); $i++) {
            array_push($this->campos, $array["fields"][$i]);
        }
        if (isset($array["skipfields"])) {
            for ($i = 0; $i < count($array["skipfields"]); $i++) {
                array_push($this->skips, $array["skipfields"][$i]);
            }
        } else {
            $this->skips = null;
        }
    }

    private function getMessage($msg = "accion exitosa")
    {
        $items = [
            "message" => $msg
        ];
        return $items;
    }

    private function generateQuery($array)
    {
        $values = "(";
        foreach ($array as $item => $value) {
            if (is_numeric($value)) {
                //$values =  $values . ":". $item . ", ";
                $values =  $values . $value . ", ";
            } else if (($value) == null) {
                $values =  $values . 'null' . ", ";
                //$values =  $values . ":". $item . ", ";
            } else {
                $values =  $values . "'" . $value . "', ";
                //$values =  $values . ":". $item . ", ";
            }
        }
        $values = substr($values, 0, (strlen($values)) - 2);
        $values =   $values .  ");";
        $columns = "";

        for ($i = ($this->auto == "true" ? 1 : 0); $i < count($this->campos); $i++) {

            if ($i == ($this->auto == "true" ? 1 : 0)) {
                $columns = $columns  . $this->campos[$i];
            } else {
                $columns = $columns . "," . $this->campos[$i];
            }
        }
        $query = "insert into " . $this->tabla . "(" .  $columns . ")"
            . "values" . $values;
        return $query;
    }

    public function getFields()
    {
        $data = $this->campos;
        $columns = "";
        if ($this->skips != null) {
            if (count($this->skips) != 1) {
                $int = array();

                for ($i = 0; $i < count($this->campos); $i++) {
                    for ($j = 0; $j < count($this->skips); $j++) {
                        if ($this->campos[$i] == $this->skips[$j]) {
                            array_push($int, $i);
                        }
                    }
                }

                for ($i = 0; $i < count($int); $i++) {
                    unset($data[$int[$i]]);
                }

                for ($i = 0; $i < count($data); $i++) {
                    if ($i == 0) {
                        $columns = $columns . $data[$i];
                    } else {
                        $columns = $columns . "," . $data[$i];
                    }
                }
            }else{
                for ($i = 0; $i < count($data); $i++) {
                    if($data[$i] != $this->skips[0]){
                        if ($i == 0) {
                            $columns = $columns . $data[$i];
                        } else {
                            $columns = $columns . "," . $data[$i];
                        }
                    }
                }
            }
        } else {
            for ($i =  (0); $i < count($this->campos); $i++) {

                if ($i == (0)) {
                    $columns = $columns  . $this->campos[$i];
                } else {
                    $columns = $columns . "," . $this->campos[$i];
                }
            }
        }
        return $columns;
    }

    public function get()
    {
        $items = array();
        try {
            // $consulta = "select " . $this->getFields() . " from " . $this->tabla;
            // echo $consulta;

            $query = $this->db->connect()->query("select " . $this->getFields() . " from " . $this->tabla);

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                /*for($i = 0; $i < count($this->campos); $i++){
                    //echo $row[$this->campos[$i]] . "<br/>";
                    $
                }*/
                $items[] = $row;
            }
        } catch (PDOException $e) {
            $items = $this->getMessage($e->errorInfo);
        }

        return $items;
    }

    public function create($array)
    {
        $items = [];
        try {
            $query = $this->generateQuery($array);
            $result = $this->db->connect()->prepare($query);
            $result->execute();
            //echo $query;
            $items = $this->getMessage("Accion: create => filas afectadas " . $result->rowCount());
        } catch (PDOException $e) {
            $items = $this->getMessage($e->errorInfo);
        }

        return $items;
    }

    public function delete($id)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("DELETE FROM " . $this->tabla . " WHERE " . $this->key . " = :id");
            $query->execute([
                'id' => $id,
            ]);
            $items = $this->getMessage("Accion: delete => filas afectadas " . $query->rowCount());
        } catch (PDOException $e) {
            $items = $this->getMessage($e->errorInfo);
        }

        return $items;
    }
}
