<?php
/**
 * Created by PhpStorm.
 * User: Keramatifar
 * Date: 20/02/2019
 * Time: 01:27 PM
 */

class Tree
{
    private
         $tablename
        ,$titleFieldName
        ,$primaryKeyFieldName
        ,$parentIdFieldName
    ;

    /**
     * Tree constructor.
     * @param $tablename
     * @param $titleFieldName
     * @param $primaryKeyFieldName
     * @param $parentIdFieldName
     */
    public function __construct($tablename, $titleFieldName, $primaryKeyFieldName, $parentIdFieldName)
    {
        $this->tablename = $tablename;
        $this->titleFieldName = $titleFieldName;
        $this->primaryKeyFieldName = $primaryKeyFieldName;
        $this->parentIdFieldName = $parentIdFieldName;
    }
    public function generateScript($elementID)
    {
        $tablename = $this->tablename;
        $titleField = $this->titleFieldName;
        $pkField = $this->primaryKeyFieldName;
        $parentField = $this->parentIdFieldName;
        $queryString = "&table=$tablename&pkField=$pkField&titleField=$titleField&parentField=$parentField";

        return <<<_END
<script>


    $('#$elementID').jstree({
            "themes" : {
                "theme" : "default-rtl",
                "dots" : true,
                "icons" : true
            },
        'core' : {
            'data' : {
                "url" : "/app/libs/treecontroller.php?action=getdata$queryString",
                "dataType" : "json" // needed only if you do not supply JSON headers
            }
            ,"check_callback" : true
        }

        ,"plugins" : [
            "dnd"
            ,"checkbox"
            ,"contextmenu"
            ,"search"
            ,"state"
            ,"themes"

        ]
    }).bind("move_node.jstree", function (e, data) {
       jQuery.post('/app/libs/treecontroller.php?action=change_parent$queryString'
           , {id:data.node.id, parentID: data.parent}
           , function(data){console.log(data)}
           )

       // console.log(data);
       // console.log(e);
        // data.rslt.o is a list of objects that were moved
        // Inspect data using your fav dev tools to see what the properties are
    }).bind("set_text.jstree", function (e, data) {
        jQuery.post('/app/libs/treecontroller.php?action=edit_text$queryString'
            , {id:data.obj.id, text: data.obj.text}
            , function(data){console.log(data)}
        )


        // data.rslt.o is a list of objects that were moved
        // Inspect data using your fav dev tools to see what the properties are
    }).bind("create_node.jstree", function (e, data) {
        jQuery.post('/app/libs/treecontroller.php?action=add_node$queryString'
            , {parentID:data.node.parent, text: data.node.text}
            , function(data){console.log(data)}
        )


        // data.rslt.o is a list of objects that were moved
        // Inspect data using your fav dev tools to see what the properties are
    }).bind("delete_node.jstree", function (e, data) {
        jQuery.post('/app/libs/treecontroller.php?action=delete_node$queryString'
            , {id:data.node.id}
            , function(data){console.log(data)}
        )


        // data.rslt.o is a list of objects that were moved
        // Inspect data using your fav dev tools to see what the properties are
    });;



    </script>
_END;

    }

}