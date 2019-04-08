<?php
class Response
{
    public static function printJsonAndExit($outputMessage)
    {
        echo json_encode($outputMessage);
        exit();
    }
    public static function printJsonErrorAndExit($outputMessage)
    {
        echo json_encode($outputMessage);
        exit();
    }
    public static function printJsonErrorAndContinue($outputMessage)
    {
        echo json_encode($outputMessage);
    }
    public static function printJsonFinalStatusMessage($statusCode)
    {
        echo json_encode(
            [
                'status' => $statusCode
            ]
        );
    }

}
?>