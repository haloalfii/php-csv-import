<?php
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'Night';
$dbname = 'compound_db';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
