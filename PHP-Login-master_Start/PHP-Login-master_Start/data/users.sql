CREATE DATABASE IF NOT EXISTS sLab;
 use sLab;
CREATE TABLE IF NOT EXISTS users (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 firstname VARCHAR(30) NOT NULL,
 pass VARCHAR(50) NOT NULL
 );