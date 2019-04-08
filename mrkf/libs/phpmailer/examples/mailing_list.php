<?php

//error_reporting(E_STRICT | E_ALL);
ini_set('display_errors', 'On');

date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

$mail = new PHPMailer;

$body = file_get_contents('contents.html');

$mail->isSMTP();
$mail->Host = 'barnamenevis.email';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->Port = 25;
$mail->Username = 'info@keramatifar.ir';
$mail->Password = 'mrkf@k.ir';
$mail->setFrom('info@keramatifar.ir', 'Newsletter');
$mail->addReplyTo('info@barnamenevis.co', 'Newsletter Re');

$mail->Subject = "Your Login Inforamation";

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop
$mail->msgHTML($body);
//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
$mysql = mysqli_connect('ns1.barnamenevis.pm', 'mrkfsql', 'mrkf!mysql#84');
mysqli_select_db($mysql, 'hosting');
$result = mysqli_query($mysql, 'SELECT fullname , email,address FROM users');

foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
    $mail->addAddress($row['email'], $row['fullname']);
    if (!empty($row['address'])) {
        $mail->addStringAttachment($row['address'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
    }

    if (!$mail->send()) {
        echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $row['fullname'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
        //Mark it as sent in the DB
       /* mysqli_query(
            $mysql,
            "UPDATE mailinglist SET sent = true WHERE email = '" .
            mysqli_real_escape_string($mysql, $row['email']) . "'"
        );                                                           */
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}
