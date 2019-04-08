<?php
class HELPER
{
    public static function convertPersianNumbersToEnglish($number)
    {
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $num = range(0, 9);
        return (int)str_replace($persian, $num, $number);
    }
    public static function DigitsToEnglish($str)
    {
        return str_replace(['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'], ['0','1','2','3','4','5','6','7','8','9'],$str);

    }
    public static function DigitsToPersian($str)
    {
        return str_replace(['0','1','2','3','4','5','6','7','8','9'],['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'], $str);

    }

    public static function convertArbicCharsToPersian($text)
    {
        return str_replace(array('ي', 'ك'), array('ی', 'ک'), $text);
    }
    public static function IsPostBack()
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
        // …

    } 
    public static function Post($fieldname)
    {
        if(isset($_POST["$fieldname"]))
        {
            return ($_POST["$fieldname"]);    
        }
        return false;
        
        // …

    }

}
?>