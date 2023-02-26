<?php
include('connection.php');
require_once 'vander.php';

$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
    $input = fopen($csv_file, 'a+');
    $row = fgetcsv($input, 1024, ','); // here you got the header

    while ($row = fgetcsv($input, 1024, ',')) {
        if (isset($row[0]) && isset($row[1]) && isset($row[2]) && isset($row[3])) {
            // $sentimenter = new SentimentIntensityAnalyzer();
            // $result = $sentimenter->getSentiment($row[3]);

            // $CompoundScore = $result['compound'];

            // if ($CompoundScore >= 0.05) {
            //     $CompoundScores = 'Positive';
            // } elseif ($CompoundScore > -0.05 || $result < 0.05) {
            //     $CompoundScores = 'Neutral';
            // } elseif ($CompoundScore <= -0.05) {
            //     $CompoundScores = 'Negative';
            // };

            $CompoundScores = 'Not Processed Yet';

            // $data = 'Positive';
            $sql = 'INSERT INTO compound(number,product_id,user,riview,compound) VALUES("' . $row[0] . '","' . $row[1] . '","' . $row[2] . '","' . $row[3] . '","' . $CompoundScores . '")';
            mysqli_query($conn, $sql);
            // sleep(1);
        }
    }
}

header('location: index.php');
