<?php
// Plug-in functions inside plug-in files must be named: smarty_type_name
function smarty_function_set_assets()
{


    $string = $smarty->fetch();
    /*if (Smarty::$_MBSTRING) 
    {
        require_once(SMARTY_PLUGINS_DIR . 'shared.mb_str_replace.php');

        return smarty_mb_str_replace($search, $replace, $string);
    }                       */
    $result = str_replace('<link href="','<link href="themes/admin/template_rtl/'  , $string);
    return $result;
}

?>
