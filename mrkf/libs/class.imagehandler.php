<?php
class ImageHandler
{
    public static function ReSize($filename, $newwidth, $newheight,$path)
    {
        list($width, $height) = getimagesize($filename);
        
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);

        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        // Output

       // $path = "cache/$newwidth-$newheight/$_GET[c].jpg";
        return imagejpeg($thumb, $path);
    }
}
?>