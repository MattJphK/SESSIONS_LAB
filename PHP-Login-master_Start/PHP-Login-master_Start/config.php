<?php
/**
 * Configuration for database connection
 *
 */

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "sLab";
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
    $connection = new PDO($dsn, $username, $password, $options);


