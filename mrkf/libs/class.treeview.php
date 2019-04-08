<?php
    
Class Treeview
{
     public

         $treeResult
        ,$prefix
     ;
     private

       $queryArray
      ,$dbh
     ;
     public function __construct($db_host, $db_username, $db_password, $db_name)
    {
        /* Create connection only if not exist and store in $dbh (Database Handler) private member */
        if(!isset($this->dbh))
        {
            try
            {
                /* Create connection */
                $this->dbh = mysqli_connect($db_host,$db_username, $db_password, $db_name);
                /* change character set to utf8 */
                mysqli_set_charset($this->dbh, "utf8");
            }
            catch (Exception $error)
            {
                /* Create and output an error if connecting faild*/
                trigger_error("Something happend and not connected to database");
                return $error;
            }
        }


        
        
    }

    /**
     * @param int $parent
     * @param $tablename the target table name
     * @param string $primaryKeyField (Target database table primary key (it is usually id))
     * @param string $titleFieldName (Title field of database table that will appears in treeview items)
     * @param string $parentRelationFieldName (The field that is used to create relation between items)
     * @param string $jqueryNoConfilictPerfix (When we have multiple treeview(s) in a single web page we need this prefix to prevent of HTML same id errors )
     */
   public function CreateTreeview($tablename, $primaryKeyField = 'id', $titleFieldName = 'title', $parentRelationFieldName = 'parent_id', $jqueryNoConfilictPerfix = 'tree_1', $where = '')
    {
        $query = "
         Select 
            t.$primaryKeyField
           ,t.$titleFieldName
           ,t.$parentRelationFieldName 
           ,(select count($primaryKeyField) FROM $tablename WHERE $parentRelationFieldName = t.$primaryKeyField ) childs
         FROM $tablename t $where
         ";
        $result = mysqli_query($this->dbh,$query) ;
        while ($row = mysqli_fetch_assoc($result))
        {
            //
            // Wrap the row array in a parent array, using the id as they key
            // Load the row values into the new parent array
            //
            $this->queryArray[$row['id']] = array(
                'id' => $row[$primaryKeyField]
               ,'title' => $row[$titleFieldName]
               ,'parent_id' => $row[$parentRelationFieldName]
               ,'childs' => $row['childs']
            );
        }
        $this->generate_tree_list($this->queryArray);

    }
   private function generate_tree_list($array, $parent = 0)
    {

        //
        // Reset the flag each time the function is called
        //
        $has_children = false;
         $childs = '';
        //
        // Loop through each item of the list array
        //
        foreach($array as $key => $value)
        {
            //
            // For the first run, get the first item with a parent_id of 0 (= root category)
            // (or whatever id is passed to the function)
            //
            // For every subsequent run, look for items with a parent_id matching the current item's key (id)
            // (eg. get all items with a parent_id of 2)
            //
            // This will return false (stop) when it find no more matching items/children
            //
            // If this array item's parent_id value is the same as that passed to the function
            // eg. [parent_id] => 0   == $parent = 0 (true)
            // eg. [parent_id] => 20  == $parent = 0 (false)
            //
            if ($value['parent_id'] == $parent)
            {

                //
                // Only print the wrapper ('<ul>') if this is the first child (otherwise just print the item)
                // Will be false each time the function is called again
                //
                if ($has_children === false)
                {
                    //
                    // Switch the flag, start the list wrapper, increase the level count
                    //
                    $has_children = true;


                    $this->treeResult .= " <ul class='parent insRootClose'>"  ;

                }


                {
                    if($value['childs'] > 0)
                    {
                        $childs = "($value[childs])";
                        $checkbox = '';
                        $this->treeResult .= 
                    
                        "<li id='$this->prefix$value[id]' onclick='expandNode(this.id);'><ins  my='$this->prefix$value[id]' >&nbsp;</ins> $value[title] $childs "
                    ;
                    }
                    else
                    {
                        $checkbox = '<input type="checkbox" name="treeChk[]">';
                        $this->treeResult .= 
                    '<li>'
                       . " $checkbox $value[title] "
                    ;
                    }
                    
                }



                $this->generate_tree_list($array, $key);

                //
                // Close the item
                //
                $this->treeResult .= '</li>';


            }

        }

        //
        // If we opened the wrapper above, close it.
        //
        if ($has_children === true) $this->treeResult .= '</ul>';


    }

    public function __destruct()
    {
        
    }

}
?>