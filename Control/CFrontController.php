<?php


/**
 * CFrontController gestisce i vari reindirizzamenti all'interno del sito.
 * Class CFrontController
 */
class CFrontController
{

    /**
     * Metodo che viene richiamato ogni volta che viene effettuata una richiesta all'interno del sito. Si occupa di richiamare i vari controllori necessari per l'esecuzione della richiesta effettuata (con eventuali parametri).
     * @param string $path
     */
    public static function run(string $path)
    {
        ini_set('session.gc_probability', 10);
        ini_set('session.gc_maxlifetime', 3600);
        $method = $_SERVER['REQUEST_METHOD'];

        error_reporting(E_ERROR | E_PARSE);

        if ($path === "/~david/ADC-Store/" || $path === "/ADC-Store/" || $path === "/ADC-Store/index.php") {
            setcookie("cookie_test", "cookie_value", time() + 3600);
            CGestioneSchermate::showHome();
        } else {
            error_reporting(E_ERROR | E_PARSE);
            if ($_COOKIE["cookie_test"] == "cookie_value") {
                $cookie = true;
            } else {
                $cookie = false;
            }

            if ($cookie == true) {

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

            else {
                CGestioneSchermate::showCookie();

            }
        }
    }
}