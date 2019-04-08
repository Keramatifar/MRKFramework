<?php
 class SMS
    {
        public static function sendSMS(array $numbers, $textMessage)
        {

            $Mobiles      = $numbers; // all mobile add in this array => support one or more
            $isFlash = false; // falsh sms => open quick in phone and after close message , cleare from phone ;

            $res ='';

            mb_internal_encoding("utf-8");
           /*
            "; // sms text// the text or body for sending          */
            $textMessage= mb_convert_encoding($textMessage,"UTF-8"); // encoding to utf-8
            // OR
            //$textMessage=iconv($encoding, 'UTF-8//TRANSLIT', $textMessage); // encoding to utf-8
            // OR
            //$textMessage =  utf8_encode( $str); // encoding to utf-8

            $parameters['signature'] = SMS_SERVICE_SIGNATURE;
            $parameters['from' ]= SMS_SERVICE_NUMBER;
            $parameters['to' ]  = $Mobiles;
            $parameters['text' ]=$textMessage;
            $parameters[ 'isFlash'] = $isFlash;
            $parameters['udh' ]= ""; // this is string  empty
            $parameters['success'] = 0x0; // return refrence success count // success count is number of send sms  success
            $parameters[ 'retStr'] = array( 0  ); // return refrence send status and mobile and report code for delivery


            try 
            {
                $con = new SoapClient(SMS_SERVICE_URL);

                $responseSTD = (array) $con ->SendGroupSMS($parameters); 
                $responseSTD['SendGroupSMSResult'];  /// print status of request // difrent between SendGroupSMSResult and success count 
                // maybe you can send request success but success count and retStr be diferent ;

                //'#';
                //echo $responseSTD['success'];

                //echo '#';
                $responseSTD['retStr'] = (array) $responseSTD['retStr'];


                if       ( $responseSTD['success']>1)
                {

                    foreach ($responseSTD['retStr']['string'] as $key => $val)

                    {
                        $res.= '@';
                        $res.= $val;
                        $res.= '<br>';
                        // pattern => mobile;sendstatus;reportId
                        //@09331001391;0;124172151191542323
                        //@09331001391;0;115161825942015958 
                    }

                }
                else if ( $responseSTD['success']==1)
                {
                    $res .=  '<br /> اطلاعات کاربری برای شما SMS شد';  $responseSTD['retStr']['string'];
                }
                else    
                {
                    $res .= 'مشکلی در ارسال SMS بوجود آمده است، لطفا با تلفن 77655673 تماس بگیرید';
                }
            }
            catch (SoapFault $ex) 
            {
                $res .='<br />' . $ex->faultstring;  
            }
            return $res;
        }
    }
?>
