<?php

$host = 'db-obli.clcq86my0apl.us-east-1.rds.amazonaws.com';
$name = 'data_base_obli';
$user = 'admin';
$password = 'password12345679';

try {
	$pdo = new PDO("mysql:host=$host;dbname=$name", $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}
