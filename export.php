<?php

// Load the database configuration file 
include_once 'connection.php';

// Fetch records from database 
$query = $conn->query("SELECT * FROM compound ORDER BY id ASC");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "Data.csv";

    // Create a file pointer 
    $f = fopen('php://memory', 'w');

    // Set column headers 
    $fields = array('Number', 'product_id', 'user', 'riview', 'compound');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer 
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['number'], $row['product_id'], $row['user'], $row['riview'], $row['compound']);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file 
    fseek($f, 0);

    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer 
    fpassthru($f);
}
exit;
