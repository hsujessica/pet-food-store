

<?php 
echo"<head><link rel='stylesheet' type='text/css' href='assignment6.css'><link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'></head>";


if (isset ($_POST['search'])) { 

	echo "<body id='subpage' style='width:800px'><h1>Search Results</h1><table><caption>You searched for : " .$_POST['keyword'] . "</caption><th>Item</th><th>Description</th><th>Price</th><th>Stock Left</th>"; 

	$fp = fopen ('product.txt','r'); 

	$linenum = 0;
	$numresults = 0;

	while ($line = fgets ($fp)) {
		$line = trim($line);
		$info = explode(":", $line);
		$img = $info[4];
		$price = $info[3];
		foreach ($info as $value) {
	    	if ($value == strtolower($_POST['keyword'])) {
	    	echo "<tr><td><img src='photos/" . $img . "'></td><td>" . $info[5] . "</td><td>" . $price . "</td><td>" . $info[2] . "</td></tr><br>";
	    	$numresults +=1;
	    	}
	    	if ($linenum < 5) {
	    		$linenum += 1;
	    	}
		}
	}
	echo "</table><br><p class='center'>$numresults result(s) found.</p><br><br><h2 class='center'><a href='assignment6.html' style='color:#131736'>ADD TO CART ON HOMEPAGE</a></p></body>"; 
}

?>
