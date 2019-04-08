<?php
// Plug-in functions inside plug-in files must be named: smarty_type_name
function smarty_function_controller($params, $smarty)
{
    //Edited By Keramatifar Date: 91/2/27
    if(file_exists(CONTROLLERS_DIR . 'hosting/' . $params['filename'] . '.php'))
    {
       require_once CONTROLLERS_DIR . 'hosting/' . $params['filename'] . '.php';
    } elseif(file_exists(CONTROLLERS_DIR . 'admin/' . $params['filename'] . '.php'))
    {
       require_once CONTROLLERS_DIR . 'admin/' . $params['filename'] . '.php';
    }
    elseif((file_exists(CONTROLLERS_DIR . 'front/' . $params['filename'] . '.php')))
    {
        require_once CONTROLLERS_DIR . 'front/' . $params['filename'] . '.php';
        
    }
    elseif((file_exists(CONTROLLERS_DIR . 'userpanel/'. $params['filename'] . '.php')))
        require_once CONTROLLERS_DIR . 'userpanel/' . $params['filename'] . '.php';
    elseif((file_exists(CONTROLLERS_DIR . 'shop/'. $params['filename'] . '.php')))
        require_once CONTROLLERS_DIR . 'shop/' . $params['filename'] . '.php';
    elseif((file_exists(CONTROLLERS_DIR . 'portal/'. $params['filename'] . '.php')))
        require_once CONTROLLERS_DIR . 'portal/' . $params['filename'] . '.php';
    elseif((file_exists(CONTROLLERS_DIR . 'academy/'. $params['filename'] . '.php')))
        require_once CONTROLLERS_DIR . 'academy/' . $params['filename'] . '.php';
    elseif((file_exists(CONTROLLERS_DIR . 'hosting/'. $params['filename'] . '.php')))
        require_once CONTROLLERS_DIR . 'hosting/' . $params['filename'] . '.php';
    //***Edited By Keramatifar Date: 91/2/27
    else
    echo CONTROLLERS_DIR .'/' . $params['filename'] . '.php';

  $className = str_replace(' ', '',
                           ucfirst(str_replace('_', ' ',
                                               $params['filename'])));

  // Create presentation object
  $obj = new $className();

  if (method_exists($obj, 'init'))
  {
    $obj->init();
  }

  // Assign template variable
  $smarty->assign($params['assign'], $obj);
}
?>
