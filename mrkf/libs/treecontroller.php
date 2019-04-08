<?php
/**
 * Created by PhpStorm.
 * User: keramatifar
 * Date: 19/02/2019
 * Time: 05:26 PM
 */
require  '../config.php';
$action = REQUEST::Get('action');
$id = REQUEST::Post('id');
$parentID = REQUEST::Post('parentID');
$text = REQUEST::Post('text');
$table = REQUEST::Get('table');
$pkFieldName = REQUEST::Get('pkField');
$parentIdFieldName = REQUEST::Get('parentField');
$titleFieldName = REQUEST::Get('titleField');
switch ($action)
{
    case 'change_parent':
        {
            echo $query = "UPDATE $table SET $parentIdFieldName = '$parentID' WHERE $pkFieldName = '$id' ";
            DB::Execute($query);
            break;
        }
     case 'delete_node':
        {
            DB::Execute("DELETE FROM $table WHERE $pkFieldName = '$id' ");
            break;
        }
      case 'edit_text':
        {
            DB::Execute("UPDATE $table SET $titleFieldName = '$text' WHERE $pkFieldName = '$id' ");
            break;
        }
       case 'add_node':
        {
            DB::Execute("INSERT INTO $table(`$titleFieldName`, `$parentIdFieldName`) VALUES('$text', $parentID)");
            break;
        }
    case 'getdata':
        {
            header("Content-type: application/json; charset=utf-8");
            $result = DB::GetAll("SELECT * from $table");
            $out= '[';
            foreach ($result as $key => $value)
            {
                if($value["$parentIdFieldName"] == '0' || $value["$parentIdFieldName"] == ''|| $value["$parentIdFieldName"] == null)
                {
                    $parent = '#';
                }
                else
                    $parent = $value["$parentIdFieldName"];

                $out .= '{ "id" : "'.$value["$pkFieldName"].'", "parent" : "'.$parent.'", "text" : "'.$value["$titleFieldName"].'" }';
                $out .=  ( $key !== count( $result ) -1 ) ? "," : "";
            }
            $out .= ']';
            echo $out;
        }



}