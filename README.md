submit-email
============

Simple PHP script for email submission with notification to administrator email.

Features:
* HTML form for email submission (you can customize it, integrate with your website theme, add additional fields like user name, organization e.t.c)
* Script store email in log file with additional information (timestamp, user agent, IP)
* Email validation (if entered email isn't valid user will see an error message)
* After successful email submission there are 2 options: script will show html page with message for user or script can redirect user to particular URL immediately after email submission (e.g. download some file)
* All preferences are stored in separate file config.php

PHPMailer is needed for email notifications.

https://github.com/PHPMailer/PHPMailer
