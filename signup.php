
<?php

echo"<head><link rel='stylesheet' type='text/css' href='assignment6.css'><link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'></head>";

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];

$fp = fopen("users.txt","a");

if (!$fp) {
    echo 'Error: Cannot open file.';
    exit;
}

fwrite($fp, $username . ":" . $password . ":" . $fullname . ":" . $email . "\n");
fclose($fp);

print("<h1>Thank you for registering, " . $fullname ."!</h1>");
print ("<h2 class='center'><a href='assignment6.html' style='color:#131736'>RETURN TO HOMEPAGE</a><h2>"); 

?>