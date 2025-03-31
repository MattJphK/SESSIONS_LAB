<?php

/* Define username and password */
$Username = "Steve";
$Password = "pass";


/**
 * Configuration for database connection
 *
 */

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "session";
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

