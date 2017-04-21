
<?php

echo "<head><link rel='stylesheet' type='text/css' href='assignment6.css'><link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'></head>";

echo "<body id='subpage'><h1>YOUR RECEIPT</h1><h2>Order Summary</h2>";



	$fw = fopen("customer.txt", "a");

	if (!$fw) {
	echo 'Cannot open file!';
	exit;
	}

	$count = 1;

	foreach ($_POST as $key => $value) {
		if ($count > 6 and $count <= 16) {
			echo $key . " : " . $value . "<p>";
			fwrite($fw, $value . ":");

		}
		$count += 1;

	}


$p1 = (float)$_POST['sciquantity'] * 30.99;
$p2 = (float)$_POST['eukquantity'] * 28.99;
$p3 = (float)$_POST['purquantity'] * 23.99;
$p4 = (float)$_POST['fanquantity'] * 20.99;
$p5 = (float)$_POST['meoquantity'] * 10.99;
$p6 = (float)$_POST['iamquantity'] * 24.99;
$ps = (float)$_POST['delivery'];
$grandtotal = round((($p1 + $p2 + $p3 + $p4 + $p5 + $p6) * 1.08875) + $ps, 2);


echo "<p>TOTAL PAID : $ " . $grandtotal . "</p>";

fwrite($fw, $grandtotal . "\n");

fclose($fw);

echo "</body>";

?>