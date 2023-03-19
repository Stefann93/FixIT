<?php
$servername = "localhost"; // Replace with your database server name
$username = "fixitinr_fixit"; // Replace with your database username
$password = "9KD!Co9]B+D*"; // Replace with your database password
$dbname = "fixitinr_fixit"; // Replace with your database name
// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
