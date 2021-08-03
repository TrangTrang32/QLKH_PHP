<?php
require 'mailler/PHPMailerAutoload.php';

function sen_mail($_email,$table){
	$mail = new PHPMailer;

	// $mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	// fix utf-8
	$mail->CharSet = 'UTF-8';

	$mail->Username = 'xaquocan@gmail.com';                 // SMTP username
	$mail->Password = 'xaquocan2000';                           // SMTP password
	$mail->SMTPSecure = 'ssl';  // tls                          // Enable TLS encryption, `ssl - 465` also accepted
	$mail->Port = 465; // 587                             
	$mail->From = 'xaquocan@gmail.com';
	$mail->FromName = 'Vencii';
	$mail->addAddress($_email, 'Tên người nhận');

	$mail->WordWrap = 50;                                 // Set word 
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Đặt hàng tại Vencii store';
	$mail->Body    = $table;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
	if(!$mail->send()) {
	    return false;
	} else {
	   return true;
	}
}
?>

