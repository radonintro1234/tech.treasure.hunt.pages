<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'treasure');
/* Attempt to connect to MySQL database */
$con= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$con){
    die("Connection failed: ". mysqli_connect_error());
    echo 'error';
}