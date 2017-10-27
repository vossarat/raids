<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller{
	
	
	public function testsend()
	{
		$mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
		try{
			$mail->isSMTP(); // tell to use smtp
			$mail->CharSet = "utf-8"; // set charset to utf8
			$mail->SMTPAuth = true;  // use smpt auth
			$mail->SMTPSecure = "tls"; // or ssl
			$mail->Host = "mail.tarassov.pro";
			$mail->Port = 25; // most likely something different for you. This is the mailtrap.io port i use for testing. 
			$mail->Username = "info";
			$mail->Password = "ABC123abc";
			$mail->setFrom("info@tarassov.pro", "Firstname Lastname");
			$mail->Subject = "Test";
			$mail->MsgHTML("This is a test");
			$mail->addAddress("d.tarassov@akmzdrav.kz", "Recipient Name");
			$mail->send();
		} catch(phpmailerException $e){
			dd($e);
		} catch(Exception $e){
			dd($e);
		}
		die('success');
	}
}

/*define('SMTP_HOST', 'smtp.yandex.ru');
define('SMTP_AUTH', true);
define('SMTP_USERNAME', 'advers.autoterm@yandex.ru');
define('SMTP_PASSWORD', '2706864');
define('SMTP_SECURE', 'tsl');
define('SMTP_PORT', '587');
define('SMTP_FROM', 'advers.autoterm@yandex.ru');

$mail = new PHPMailer;
    $mail->CharSet = "UTF-8";

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = SMTP_AUTH;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port = SMTP_PORT;

    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';

    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    $mail->Subject = "Оплата заказа через Альфа Банк";

    $mail->setFrom(SMTP_FROM);*/