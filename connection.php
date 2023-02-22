<?php
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'Night';
$dbname = 'import_csv';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
