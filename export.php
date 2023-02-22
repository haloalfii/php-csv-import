<?php
// including the connection file
include('connection.php');

// set headers of csv format and force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=users.csv');

$output = "First Name,Last Name,Email,Phonen";

$sql = 'SELECT * FROM users ORDER BY id desc';
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $output .= $row['first_name'] . "," . $row['last_name'] . "," . $row['email'] . "," . $row['phone'] . "n";
}
echo $output;
exit;
