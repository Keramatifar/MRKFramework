<?php
class Request
{
    public static function Get($parameterName, $parameterType = 'string')
    {
        if(!isset($_GET["$parameterName"]))
            return false;
            
        return $_GET["$parameterName"];
    }

    public static function printRequest($request = 'GET')
    {
        if($request == 'GET')
        {
            foreach($_GET as $key => $value)
                echo "<b>$key:</b> $value <br>";
        }
        if($request == 'POST')
        {
            foreach($_POST as $key => $value)
                echo "<b>$key:</b> $value <br>";
        }

    }
    public static function Post($parameterName, $parameterType = 'string')
    {
        if(!isset($_POST["$parameterName"]))
            return false;
            
        return $_POST["$parameterName"];
    }
    public static function Json($parameterName, $parameterType = 'string')
    {
        $input = file_get_contents('php://input');
        $json =  json_decode($input,true);
        if(!isset($json["$parameterName"]))
            return false;

        return $json["$parameterName"];
    }

    public static function isFromIranIpRange()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $iranIpRange = ['2.144.0.0', '2.147.255.255'];
        $irancellIpRange = ['2.144.0.0', '2.147.255.255'];
        echo (ip2long($iranIpRange[1]) - ip2long($iranIpRange[0]));
        return ((ip2long($ip) >= ip2long($iranIpRange[0])) && (ip2long($ip) <= ip2long($iranIpRange[1])));


    }

    public static function IsPostBack()
    {
        return ($_SERVER['REQUEST_METHOD'] == 'POST');

    }
}
?>