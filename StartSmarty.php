<?php

require('smarty-libs/Smarty.class.php');

class StartSmarty {

    static function configuration(){
    

    $smarty = new Smarty();

    // definizione directory di lavoro di Smarty 
    $smarty->template_dir = 'smarty-dir/templates';   // directory dei template
    $smarty->compile_dir = 'smarty-dir/templates_c';
    $smarty->cache_dir = 'smarty-dir/cache';
    $smarty->config_dir = 'smarty-dir/configs';

    return $smarty;

    }

}
  
?>