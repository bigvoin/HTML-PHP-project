<?php // connect.php allows connection to the database
   $hn='localhost';
	$db = '18db065';
	$un = '18usr065';
	$pw = 'QWAVARYIQ67';

	$conn = new mysqli($hn, $un,$pw,$db);

	if ($conn->connect_error)
		{ die($conn->connect_error);
		echo '<br>';
		echo 'Unfortunately you could not be connected to the database
		      please check you have the correct credentials';
	}
	else
	{
		echo '<br>';

	};

   ?>
