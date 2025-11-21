<?php

// $host = 'db-obli.clcq86my0apl.us-east-1.rds.amazonaws.com';
// $name = 'data_base_obli';
// $user = 'admin';
// $password = 'password12345679';

$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'data_base_obli';
$user = getenv('DB_USER') ?: 'admin';
$pass = getenv('DB_PASS') ?: 'password';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Connection error : " . $e->getMessage());
}

// try {
//     $pdo = new PDO($dsn, $user, $pass, $options);
// } catch (PDOException $e) {
//     die("Connection error : " . $e->getMessage());
// }  


// try {
// 	$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch( PDOException $exception ) {
// 	echo "Connection error :" . $exception->getMessage();
// }
