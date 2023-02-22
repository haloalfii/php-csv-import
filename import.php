<?php
include('connection.php');

require_once 'vander.php';

$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
    $input = fopen($csv_file, 'a+');
    $row = fgetcsv($input, 1024, ','); // here you got the header
    while ($row = fgetcsv($input, 1024, ',')) {
        $sentimenter = new SentimentIntensityAnalyzer();
        $result = $sentimenter->getSentiment($row[2]);

        $CompoundScore = $result['compound'];

        if ($CompoundScore >= 0.05) {
            $CompoundScores = 'Positive';
        } elseif ($CompoundScore > -0.05 || $result < 0.05) {
            $CompoundScores = 'Neutral';
        } elseif ($CompoundScore <= -0.05) {
            $CompoundScores = 'Negative';
        };

        $sql = 'INSERT INTO compound(product_id,user,riview,compound) VALUES("' . $row[0] . '","' . $row[1] . '","' . $row[2] . '","' . $CompoundScores . '")';
        mysqli_query($conn, $sql);
    }
}
header('location: index.php');
