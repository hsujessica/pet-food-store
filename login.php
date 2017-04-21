
<?php 

echo"<head><link rel='stylesheet' type='text/css' href='assignment6.css'><link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'></head>";


if (isset ($_POST['submit'])) { 
	$loggedin = FALSE; 
	$fp = fopen ('users.txt','r'); 

while ($line = fgets ($fp)) { 
	$line = trim($line);
	$info = explode(":", $line);
	if (($info[0] == $_POST['username']) && ($info[1] == $_POST['password'] ) ) { 
	$loggedin = TRUE; 
	break; 
	} 

} 

if ($loggedin) { 
	print ("<h1>Login Successful! Welcome, " . $_POST['username'] . "</h1>"); 
	print ("<h2 class='center'><a href='assignment6.html' style='color:#131736'>RETURN TO HOMEPAGE</a><h2>"); 
} 
else { 
	print ("<h1>Username and/or password invalid! Please try again.</h1>"); 
	print ("<h2 class='center'><a href='login.html' style='color:#131736'>TRY AGAIN</a><h2>"); 
		print ("<h2 class='center'><a href='assignment6.html' style='color:#131736'>RETURN TO HOMEPAGE</a><h2>"); 


}
}

?>
