<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_URL => 'smtp://sandbox.smtp.mailtrap.io:2525',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERPWD => 'd5d9f8e4891b66:7480b8dd2f0b49',
    CURLOPT_MAIL_FROM => 'neematomonja@gmail.com',
    CURLOPT_MAIL_RCPT => array('chiefdogan19@gmail.com'),
    CURLOPT_UPLOAD => true,
    CURLOPT_INFILESIZE => -1,
    CURLOPT_INFILE => fopen('php://stdin', 'r'),
    CURLOPT_VERBOSE => true
));

$mail = "--boundary-string\r\n";
$mail .= "Content-Type: multipart/alternative; boundary=\"boundary-string\"\r\n\r\n";

$mail .= "--boundary-string\r\n";
$mail .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
$mail .= "Content-Transfer-Encoding: quoted-printable\r\n";
$mail .= "Content-Disposition: inline\r\n\r\n";

$mail .= "Congrats for sending test email with Mailtrap!\r\n";
$mail .= "Inspect it using the tabs above and learn how this email can be improved.\r\n";
$mail .= "Now send your email using our fake SMTP server and integration of your choice!\r\n";
$mail .= "Good luck! Hope it works.\r\n\r\n";

$mail .= "--boundary-string\r\n";
$mail .= "Content-Type: text/html; charset=\"utf-8\"\r\n";
$mail .= "Content-Transfer-Encoding: quoted-printable\r\n";
$mail .= "Content-Disposition: inline\r\n\r\n";

$mail .= "<!doctype html>\r\n";
$mail .= "<html>\r\n";
$mail .= "  <head>\r\n";
$mail .= "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n";
$mail .= "  </head>\r\n";
$mail .= "  <body style=\"font-family: sans-serif;\">\r\n";
$mail .= "    <div style=\"display: block; margin: auto; max-width: 600px;\" class=\"main\">\r\n";
$mail .= "      <h1 style=\"font-size: 18px; font-weight: bold; margin-top: 20px\">Congrats for sending test email with Mailtrap!</h1>\r\n";
$mail .= "      <p>Inspect it using the tabs you see above and learn how this email can be improved.</p>\r\n";
$mail .= "      <img alt=\"Inspect with Tabs\" src=\"https://assets-examples.mailtrap.io/integration-examples/welcome.png\" style=\"width: 100%;\">\r\n";
$mail .= "      <p>Now send your email using our fake SMTP server and integration of your choice!</p>\r\n";
$mail .= "      <p>Good luck! Hope it works.</p>\r\n";
$mail .= "    </div>\r\n";
$mail .= "    <!-- Example of invalid for email html/css, will be detected by Mailtrap: -->\r\n";
$mail .= "    <style>\r\n";
$mail .= "      .main { background-color: white; }\r\n";
$mail .= "      a:hover { border-left-width: 1em; min-height: 2em; }\r\n";
$mail .= "    </style>\r\n";
$mail .= " </body>\r\n";
$mail .= "</html>\r\n";

curl_setopt($curl, CURLOPT_POSTFIELDS, $mail);

$response = curl_exec($curl);
$info = curl_getinfo($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
echo "Error occurred: {$error}";
} else {
echo "Email sent successfully! Server responded with: {$info['http_code']}";
}
?>