<?php
class USERS
{
    public static function isUserLoggedIn()
    {
        return isset($_SESSION['userInfo']);
    }
    public static function isAdminLoggedIn()
    {
        //return isset($_SESSION['admin']);
        if(!self::isUserLoggedIn())
            return false;
        if(USERS::getUserInfo('RoleID') == '3')
            return true;
        return false;
    }
    public static function login($mobile, $pass)
    {
        $sql = 'CALL `sp_login`(:mobile, :pass, :ip)';
        $ip = $_SERVER['REMOTE_ADDR'];
        $params = [
            ':mobile' => $mobile
            ,':pass' => $pass
            ,':ip' => $ip
        ];
        $result = DB::GetRow($sql, $params);
        if($result)
        {
            $permissions = SELF::getUserPermissionsFromDB($result['role_id']);
            $_SESSION['permissions'] = $permissions;
            $_SESSION['userInfo'] = $result;
            return $result;
        }
        return false;
    }

    public static function newPinForLogin($mobile)
    {
        $pass = rand(10000,99999);
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = 'CALL `sp_new_pin`(:mobile, :pass, :ip)';
        $params = [
                    ':mobile' => $mobile
                   ,':pass' => $pass
                   ,':ip' => $ip
        ];
        DB::Execute($sql, $params);
        SMS::sendSMS([$mobile], $pass);
        return true;
    }
    public static function addUserAction($actionID)
    {

        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = 'CALL sp_user_action_insert(:userID,:actionID,:ip)';
        $params = [
                    ':userID' => USERS::getUserInfo('id')
                   ,':actionID' => $actionID
                   ,':ip' => $ip
        ];
        return DB::Execute($sql, $params);


    }
    public static function getUserInfo($param = null)
    {
        // return 'محمد کرامتی فر';
        if(is_null($param))
            return $_SESSION['userInfo'];
        else
            return $_SESSION['userInfo']["$param"];
    }
    public static function adminSecutiry($pageID,$return = '')
    {
        if(!USERS::isUserLoggedIn())
        {
           // echo 'Not Loggedin';
            header("location: /login.php?return=$return");

        }
        else
        {
         //   echo 'loggedin';
          //  print_r($_SESSION['userInfo']);
        }
        if(!USERS::isAdminLoggedIn())
        {
           // echo 'Not Access';
            die('access denied');
        }
        else
        {
           // echo 'has access';
        }
    }
    public static function temporaryRegister()
    {

        $userID = DB::GetOne("CALL sp_users_temp_register()");
        setcookie('tempUserID',$userID,(time() + (30 * 24 * 60 * 60)), '/');
        return $userID;

    }
    public static function register()
    {

    }
    public static function forgotPassword()
    {

    }
    public static function getUserID()
    {
        if(SELF::isUserLoggedIn())
            return SELF::getUserInfo('id');

        if(isset($_COOKIE['tempUserID']))
            return $_COOKIE['tempUserID'];

        return SELF::temporaryRegister();
    }

    public static function logout()
    {

    }

    public static function getPageSecurityID($filename, $param = 0)
    {
        $param = ($param == false) ? 0 : $param;
        $query = "SELECT id FROM permission WHERE page = '$filename' AND parameter_value = '$param'";
        return DB::GetOne($query);


    }
    public static function getPageSecurityInfo($filename, $param = 0)
    {
        $param = ($param == false) ? 0 : $param;
        $query = "SELECT id, `title` FROM permission WHERE page = '$filename' AND parameter_value = '$param'";
        return DB::GetRow($query);


    }
    public static function getUserPermissionsFromDB($roleID)
    {


            $permissions = DB::GetAll("SELECT * FROM security WHERE role_id = $roleID");
            $result = [];
            foreach ($permissions as $p)
            {
                $result[$p['permission_id']]=
                        [
                            'read' => $p['read']
                           ,'create' => $p['create_per']
                           ,'delete' => $p['delete']
                           ,'search' => $p['search']
                           ,'print' => $p['print']
                           ,'export' => $p['export']
                           ,'update' => $p['update']
                           ,'recycle' => $p['recycle']

                            ];



            }
            return $result;


    }


    public static function getUserPagePermissions($pageID)
    {
        if(SELF::isUserLoggedIn())
        {

            $permissions = $_SESSION['permissions'];
           // print_r($permissions);
            return $permissions["$pageID"];
        }
    }
    public static function getUserPageItemPermission($pageID, $permission )
    {
        return true;
        if(SELF::isUserLoggedIn())
        {

            $permissions = $_SESSION['permissions'];
           // print_r($permissions);
            return $permissions["$pageID"]["$permission"];
        }
    }

    public static function crudInstance($pageID)
    {
        $xcrud = Xcrud::get_instance();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::DELETE))
            $xcrud->unset_remove();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::SEARCH))
            $xcrud->unset_search();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::UPDATE))
            $xcrud->unset_edit();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::EXPORT))
            $xcrud->unset_csv();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::CREATE))
            $xcrud->unset_add();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::PRINT_REPORT))
            $xcrud->unset_print();

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::READ))
            return false;

        if(!SELF::getUserPageItemPermission($pageID, PERMISSIONS::RECYCLE))
            $xcrud->unset_csv();

        return $xcrud;

}



}
class  PERMISSIONS{
      const READ = 'read';
      const CREATE = 'create';
      const DELETE = 'delete';
      const SEARCH = 'search';
      const PRINT_REPORT = 'print';
      const EXPORT = 'export';
      const UPDATE = 'update';
      const RECYCLE = 'recycle';
}
?>