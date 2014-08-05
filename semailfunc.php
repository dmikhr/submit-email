<?

define('HOST', $host);
define('SMTPAuth', $SMTPAuth);
define('SMTPSecure', $SMTPSecure);
define('Port', $Port);
define('EMAIL_SENDER', $email_sender);
define('EMAIL_PASW', $email_password);
define('CharSet', $CharSet);
define('SENDER_NAME', $sender_name);
define('SUBJECT', $subject);
define('NOTIFY', $notify);


require_once(dirname(__FILE__).'/phpmailer/class.phpmailer.php');

function sendemail($address, $body) {

$mail             = new PHPMailer();

$address64 = base64_encode($address);

$mail->IsSMTP(); // telling the class to use SMTP

$mail->Host       = HOST; // SMTP server
//$mail->SMTPDebug  = 2;   // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = SMTPAuth;                  // enable SMTP authentication
$mail->SMTPSecure = SMTPSecure;                 // sets the prefix to the servier
$mail->Host       = HOST;      // sets SMTP server
$mail->Port       = Port;                   // set the SMTP port for the GMAIL server
$mail->Username   = EMAIL_SENDER ;  // username
$mail->Password   = EMAIL_PASW;            // password
$mail->CharSet = CharSet;
$mail->SetFrom(EMAIL_SENDER, SENDER_NAME);
$mail->AddReplyTo(EMAIL_SENDER, SENDER_NAME);
$mail->Subject    = SUBJECT;
$mail->MsgHTML($body);
$mail->AddAddress($address);

if (NOTIFY) { 
 if(!$mail->Send()) {
	return $mail->ErrorInfo;
 } else {
	return 1;
 }
}

}
?>
