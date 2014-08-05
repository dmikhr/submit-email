<?

// uncomment the line below if you want to set time zone diferent from server time zone
// date_default_timezone_set('Europe/Amsterdam'); // set time zone for correct timestamps in logs
// for more details visit http://php.net/manual/en/timezones.php

$url = 'mywebsite.com';

$host = "smtp.domain.com";            // SMTP server
$SMTPAuth   = true;                  // enable SMTP authentication
$SMTPSecure = "ssl";                 // sets the prefix to the servier
$Port       = 465;                   // set the SMTP port for the GMAIL server
$email_sender    = "some@email.com";  // username
$email_password   = "password";            // password
$CharSet = "utf-8";

$sender_name = 'Submission script';
$subject = 'New email was submitted';
$email_recipient = 'admin@mywebsite.com';

$notify = true; // if true - send notification to $email_recipient  address about email submission
                 // if false - just save submitted email to the log file

// comment line to disable this option
$redirect = 'http://php.net/manual/en/function.header.php'; // immediate redirect after clicking on submit button

// if date_default_timezone_set does not work properly or you want to set custom time, uncomment the line below; format: number_of_hours*60*60
//$timeoffset = -2*60*60;

?> 
