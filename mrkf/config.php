<?php
ini_set('display_errors', 'on');
session_start();
// SITE_ROOT contains the full path to the Project folder
define('SITE_ROOT', dirname(dirname(__FILE__)));
define('ADMIN_DIR', SITE_ROOT . '/admin');
define('LIB_DIR', SITE_ROOT . '/include/libs');



// Added For Error Handling Section
// These should be true while developing the web site
define('IS_WARNING_FATAL', true);
define('DEBUGGING', true);
// The error types to be reported
define('ERROR_TYPES', E_ALL);
// Settings about mailing the error messages to admin
define('SEND_ERROR_MAIL', false);
define('ADMIN_ERROR_MAIL', 'admin@mail.com');
define('SENDMAIL_FROM', 'errors@domain.com');
ini_set('sendmail_from', SENDMAIL_FROM);
// By default we don't log errors to a file
define('LOG_ERRORS', true);
//define('LOG_ERRORS_FILE', 'c:\\admin.txt'); // Windows
 define('LOG_ERRORS_FILE', SITE_ROOT . '/errors.log'); // Linux
/* Generic error message to be displayed instead of debug info
(when DEBUGGING is false) */
define('SITE_GENERIC_ERROR_MESSAGE', 'Something wrongs. please contact admin');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'dbname');
define('DB_PERSISTENCY', 'true');

define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);


define('GOOGLE_API_KEY', '');
define('TIMEZONE', 'Asia/Tehran');

define('TEMPLATE_COMPILE_DIR', SITE_ROOT . '/cache'  );




date_default_timezone_set(TIMEZONE);
 function autoload($class) 
  {
      if(substr($class, -10) == 'controller')
      {
          $classname = strtolower(str_replace('Controller', '', $class));
          return include_once "/front/controller/$classname.php";
      }
        $classname = LIB_DIR . '/class.' . strtolower($class) . '.php';
      if(strtolower($class) == 'xcrud')
        require_once LIB_DIR . '/xcrud/xcrud.php' ;
      elseif(strtolower($class) == 'smarty')
          require_once LIB_DIR . 'smarty/libs/Smarty.class.php';
      elseif(file_exists($classname))
      {
        require_once $classname ; 
      }
      else
      {
          echo "Not Found <b>$class</b>";
      }
   
    
  }
  spl_autoload_register('autoload');
ErrorHandler::SetHandler(ERROR_TYPES);
?>