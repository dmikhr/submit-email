<?
require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/semailfunc.php');

if (!isset($timeoffset)) {
	$timeoffset = 0;
}

$dtime=$_SERVER['REQUEST_TIME']+$timeoffset;
$dtime=date('d/m/Y H:i:s', $dtime);
$emailaddr=$_POST['email'];


if ($emailaddr) {

if (filter_var($emailaddr, FILTER_VALIDATE_EMAIL)) {
    $status='OK';
    $htmlpage = file_get_contents(dirname(__FILE__)."/templates/submitted.html");
    
} else {
    $status='ERROR: wrong email format';
    $htmlpage = file_get_contents(dirname(__FILE__)."/templates/submiterr.html");
  }
  
    $htmlpage = str_replace(['[domain]', '[email]'], [$url, $emailaddr], $htmlpage);
    if (!isset($redirect )) {
          print $htmlpage; 
	  }

 }

$logdata=implode("\t", array($dtime, 
                             $emailaddr, 
                             'SUBMIT', 
                             $status, 
                             $_SERVER['HTTP_USER_AGENT'], 
                             $_SERVER['REMOTE_ADDR'], 
                             $_SERVER['HTTP_ACCEPT_LANGUAGE']
                         ));

file_put_contents(dirname(__FILE__)."/logs/submission.log", $logdata.PHP_EOL, FILE_APPEND);

if ($status=='OK') {
     $serviceinfo = implode("<br>", 
                    array($_SERVER['HTTP_USER_AGENT'], 
                    $_SERVER['REMOTE_ADDR'], 
                    $_SERVER['HTTP_ACCEPT_LANGUAGE'], 
                    'Referer: '.$_SERVER['HTTP_REFERER']));
                    
     $msgtext=implode('<br>', array("Email: ${emailaddr}", "Registration time: ${dtime}", "User info:<br>${serviceinfo}"));
     $msgtext=str_replace("\t", "<br>", $msgtext);
     $response=sendemail($email_recipient , $msgtext);
    }

    if (isset($redirect )) {
		if ($status == 'OK') {
		header("Location: $redirect");
	 } else {
	    print $htmlpage; // if email has wrong format show error page instead of redirecting to other URL
	}
  }
?> 
