<?php
include('connection.php');

$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
    $input = fopen($csv_file, 'a+');
    $row = fgetcsv($input, 1024, ','); // here you got the header
    while ($row = fgetcsv($input, 1024, ',')) {
        // insert into the database
        $date = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO users(first_name,last_name,email,phone,created) VALUES("' . $row[0] . '","' . $row[1] . '","' . $row[2] . '","' . $row[3] . '","' . $date . '")';
        mysqli_query($conn, $sql);
    }
}
header('location: index.php');
