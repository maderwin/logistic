<?php if ( ! defined( "B_PROLOG_INCLUDED" ) || B_PROLOG_INCLUDED !== true ) {
    die();
}

use PHPMailer\PHPMailer;

define( 'SMTP_HOST_URL', '127.0.0.1' );
define( 'SMTP_HOST_PORT', '25' );
define( 'SMTP_SECURE', false );
define( 'SMTP_AUTH', false );
define( 'SMTP_USER_NAME', '' );
define( 'SMTP_USER_PASSWORD', '' );

function custom_mail( $to, $subject, $message, $additionalHeaders = '', $additional_parameters = '', $attachments = [] ) {
    $mail = new PHPMailer\PHPMailer();

    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();


    $mail->Host = SMTP_HOST_URL;
    $mail->Port = SMTP_HOST_PORT;

    if ( SMTP_AUTH ) {
        $mail->SMTPAuth = SMTP_AUTH;
        $mail->Password = SMTP_USER_PASSWORD;
        $mail->Username = SMTP_USER_NAME;
    }

    if ( SMTP_SECURE ) {
        $mail->SMTPSecure = SMTP_SECURE;
    }

    $eol = CAllEvent::GetMailEOL();

    $arHeaders = explode( $eol, $additionalHeaders );

    foreach($arHeaders as $header){
        if(! preg_match('/^(From:|Content-T|Bcc|Cc)/i', $header)) {
            $mail->addCustomHeader($header);
        }
        if(preg_match('/^(Content-Type: text\/html)/i', $header)){
            $mail->isHTML(true);
        }
    }

    if ( preg_match( '/From: (.+)/i', $additionalHeaders, $matches ) ) {
        $from = $matches[1];
    } else {
        $from = COption::GetOptionString( 'main', 'email_from' );
    }
    if ( preg_match( '/Bcc: (.+)/i', $additionalHeaders, $matches ) ) {
        $mail->addBCC($matches[1]);
    }

    if ( preg_match( '/Cc: (.+)/i', $additionalHeaders, $matches ) ) {
        $mail->addCC($matches[1]);
    }
    foreach ($attachments as $attachment){
        $mail->addAttachment($attachment);
    }

    $mail->From = $from;
    $mail->FromName = 'Impocar';

    $mail->addAddress( $to );
    $mail->Subject = $subject;
    $mail->Body    = $message;



    if ( ! $mail->send() ) {
//        $bugReport = "!mail!: ".$to."\n".print_r($arHeaders, true)."\n".$message;
//        addMessage2Log($bugReport);
        return false;
    }

//    $bugReport = "mail!: ".$to."\n".print_r($arHeaders, true)."\n".$message;
//    addMessage2Log($bugReport);

    return true;
}
