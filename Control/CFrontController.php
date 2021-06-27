<?php


class CFrontController
{
    public static function run(string $path)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($path === "/~rommy/ADC-Store/" || $path === "/ADC-Store/" || $path === "/ADC-Store/index.php") {
            CGestioneSchermate::showHome();
        } else {
            $res = explode("/", $path);

            array_shift($res);
            array_shift($res);
            array_shift($res);            

            if ($res[0] != '') {

                $controller = "C" . $res[0];
                $dir = 'Control';
                $eledir = scandir($dir);

                if(in_array($controller . ".php", $eledir)){
                    if(isset($res[1])){
                        $function = $res[1];
                        if (method_exists($controller, $function)){

                            $param = array();
                            for ($i = 2; $i < count($res); $i++) {
                                $param[] = $res[$i];
                            }
                            $num = count($param);
                            if ($num == 0) $controller::$function();
                            else if ($num == 1) $controller::$function($param[0]);
                            else if ($num == 2) $controller::$function($param[0], $param[1]);
                        }
                    }
                }
            }else{
                $controller = "CGestioneSchermate";
                $function = "showHome";
                $controller::$function();
            }

        }
    }
}