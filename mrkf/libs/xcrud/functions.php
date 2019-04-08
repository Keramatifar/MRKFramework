<?php
function publish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}
function unpublish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $xcrud)
{
    $xcrud->set_exception('ban_reason', 'Lol!', 'error');
    $postdata->set('ban_reason', 'lalala');
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function date_example($postdata, $primary, $xcrud)
{
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime', $created);
}

function movetop($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function dateConvertToPersian($value, $fieldname, $primary_key, $row, $xcrud)
{
   //return '<i class="icon-user"></i>' . $value;
   //2017-07-24 05:37:08
   $t = explode(' ', $value);
   $date = explode('-',$t[0]);
   $time = explode(':',$t[1]);
   $cal = new jCalendar();
   
   //return $cal->mktime($date[0], $date[1], $date[2], $time[0], $time[1], $time[2]);
   $result = $cal->gregorian_to_jalali($date[0], $date[1], $date[2]);
  // print_r($result);
   
   return  "$result[0]/$result[1]/$result[2]";
}
function nice_input($value, $field, $priimary_key, $list, $xcrud)
{
  // print_r($field);
    return '<div class="input-prepend input-append">' 
        . '<span class="add-on">$</span>'
        . '<input type="text" name="'.$xcrud->fieldname_encode($fieldname).'" value="'.$value.'" class="xcrud-input" />'
        . '<span class="add-on">.00</span>'
        . '</div>';
}
function SKU($postdata, $xcrud){
    include_once 'class.jcalendar.php';
    //$cal = new jCalendar();
    //$cal->farsiDigits = false;
    //date_default_timezone_set('ASIA/TEHRAN');
   // echo $cal->date('y/m/d', time());
      //$date = $cal->date('y') . $cal->date('m') . $cal->date('d') ; 
      $date = date('y') . date('m') . date('d') ; 
  $shopID = $postdata->get('shops_id');
   
 /* $db = Xcrud_db::get_instance();
  $count  = $db->query('SELECT count(*) FROM product_colors  WHERE shops_id = ' .$shopID);  */
  
  $sku = '';
  if($shopID <= 9) 
    $sku = $date . '0' . $shopID;
  else
    $sku = $date  . $shopID;
  
  $sku .= rand(1000,9999);
  echo "<script> alert($sku)</script><h3>SKU: $sku</h3>"; 
  
    $postdata->set('sku', $sku);
}


