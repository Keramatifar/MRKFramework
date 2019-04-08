<?php
class LINK
{
    public static function generateProductLink($categoryTitle,$productTitle,$productID)
    {
        return "https://domain.com/" . str_replace(' ', '-',$categoryTitle)."/$productID/". str_replace(' ', '-', $productTitle) . '/';
    }
    public static function generateCategoryLink($categoryName,$categoryID)
    {
          return "https://domain.com/" . str_replace(' ', '-',$categoryName)."/$categoryID/";
    }
    public static function redirectToCorrectLink($correctLink)
    {
        if(SELF::pageLink() != $correctLink)
            header("location: $correctLink");
    }
    public static function pageLink()
    {
        return urldecode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    }
}
?>