

<?php

/**
 * Open a connection via PD) to create a new database and table with
 * structure
 */

require "config.php";
//the require statement isn't working so I'm adding it in directly

$sql = '';
try {

    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("init.sql");
    $connection->exec($sql);
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username,
        $password,$options);

    echo "Database and table users created successfully";
}
catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
