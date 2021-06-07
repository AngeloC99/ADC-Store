<?php

require('Smarty/smarty-libs/Smarty.class.php');
class StartSmarty {

    public static function configuration(){
        $smarty = new Smarty();

        // definizione directory di lavoro di Smarty
        $smarty->template_dir = 'Smarty/smarty-dir/templates';   // directory dei template
        $smarty->compile_dir = 'Smarty/smarty-dir/templates_c';
        $smarty->cache_dir = 'Smarty/smarty-dir/cache';
        $smarty->config_dir = 'Smarty/smarty-dir/configs';

        return $smarty;

    }

}

?>