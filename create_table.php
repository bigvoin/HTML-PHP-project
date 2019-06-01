<?php //login.php
	require 'connect.php'; //using require will include the connect.php file each time it is called.

	$query = " CREATE TABLE books (
			   id  INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			   title VARCHAR (255) NOT NULL,
               author VARCHAR(255) NOT NULL,
							 genre VARCHAR(255) NOT NULL,
							 year INT UNSIGNED NOT NULL
			   )";

	$result = $conn->query($query);

	if (!$result)
	{
		die($conn->error);
		echo '<br> Your Query failed';
	}
	else
	{
		echo '<br> Your table has been created';
	}

	$result->close();
	$conn->close();
?>
