<?php
require 'config/mailler/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
// fix utf-8
$mail->CharSet = 'UTF-8';

$mail->Username = 'luongitbkap@gmail.com';                 // SMTP username
$mail->Password = 'luongitbkap!%@$';                           // SMTP password
$mail->SMTPSecure = 'ssl';  // tls                          // Enable TLS encryption, `ssl - 465` also accepted
$mail->Port = 465; // 587                             
$mail->From = 'luongitbkap@gmail.com';
$mail->FromName = 'Tiêu đề mail';
$mail->addAddress('c1812mbkaptech@gmail.com', 'Tên người nhận');

$mail->WordWrap = 50;                                 // Set word 
$mail->isHTML(true);                                  // Set email format to HTML
$table ='<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>STT</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
	</tr>
	<tr>
		<th>1</th>
		<th>Abc</th>
		<th>5200</th>
		<th>12</th>
	</tr>
	<tr>
		<th>1</th>
		<th>Abc</th>
		<th>5200</th>
		<th>12</th>
	</tr>
	<tr>
		<th>1</th>
		<th>Abc</th>
		<th>5200</th>
		<th>12</th>
	</tr>
</table>';
$mail->Subject = 'Here is the subject';
$mail->Body    = $table;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>

