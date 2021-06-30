<?php


class CFrontController
{
    /**
     * Funzione che permette di visualizzare una pagina 401 Unauthorised, con relativa intestazione HTTP, se l'utente tenta di accedere ad una pagina per la quale non è autorizzato.
     */
    public static function unauthorized() {
        header("HTTP/1.1 401 Unauthorized");
        header("Location: ".$GLOBALS['path'] ."GestioneSchermate/recupera401");
        die;
    }

    public static function run(string $path)
    {
        ini_set('session.gc_probability', 10);
        ini_set('session.gc_maxlifetime',3600);
        $method = $_SERVER['REQUEST_METHOD'];

        error_reporting(E_ERROR | E_PARSE);

        setcookie("cookie_test", "cookie_value", time()+3600);
        if ($_COOKIE["cookie_test"] == "cookie_value") {
            $cookie = true;//i cookie sono abilitati
        }
        else {
            $cookie = false;
        }


        if($cookie==true) {
            if ($path === "/~rommy/ADC-Store/" || $path === "/ADC-Store/" || $path === "/ADC-Store/index.php") {
                CGestioneSchermate::showHome();
            } else {
                error_reporting(E_ERROR | E_PARSE);

                $gs = CGestioneSessioni::getInstance();
                $res = explode("/", $path);

                array_shift($res);
                array_shift($res);
                array_shift($res);

                if ($res[0] != '') {

                    $controller = "C" . $res[0];
                    $dir = 'Control';
                    $eledir = scandir($dir);

                    if (in_array($controller . ".php", $eledir)) {
                        if (isset($res[1])) {
                            $function = $res[1];
                            if (method_exists($controller, $function)) {

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
                } else {
                    $controller = "CGestioneSchermate";
                    $function = "showHome";
                    $controller::$function();
                }
            }
        }


        else{
            CGestioneSchermate::showCookie();

            }}





}