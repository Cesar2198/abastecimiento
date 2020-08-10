
    <?php
    require_once 'libs/database.php';
    require_once 'libs/model.php';
    //require_once 'libs/app.php';

    require_once 'config/config.php';

    // $app = new App();
    $ctrl = isset($_GET["controller"]) ? $_GET["controller"] : null;
    $method = isset($_GET["method"]) ? $_GET["method"] : null;




    $archivoController = 'controller/' . $ctrl . '.php';

    if (file_exists($archivoController)) {
        require_once $archivoController;

        // inicializar controlador
        $controller = new $ctrl;

        // # elementos del arreglo

        if ($method != null) {
            if (method_exists($controller, $method)) {
                if (isset($method)) {
                    $rawInput = file_get_contents('php://input');
                    $input = json_decode($rawInput, true);
                    $query = $input['query'];

                    $output = $result->toArray();
                     echo $output;
                   // echo $controller->{$method}();
                } else {
                    echo $controller->list();
                }
            } else {
                $items = [
                    "message" => "method not exists"
                ];
                echo json_encode($items);
            }
        } else {
            echo $controller->list();
        }
    } else {
        $items = [
            "message" => "MINI API REST FRAMEWORK"
        ];
        echo json_encode($items);
    }

    ?>
