<?
require_once 'controllers/errores.php';

class App{

    function __construct(){
        echo "<p>Nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        echo $url;

        /*$archivoController = 'controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            // inicializar controlador
            $controller = new $url[0];
            
            // # elementos del arreglo
            $nparam = sizeof($url);

            if(isset($url[1])){
                $controller->{$url[1]}();
            }else{
                $controller->list();
            }
        }else{
            echo "error";
        }*/
    }
}

?>