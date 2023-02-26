<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connection.php');
require_once 'vander.php';

$sql = 'SELECT * FROM compound ORDER BY id desc';
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $sentimenter = new SentimentIntensityAnalyzer();
    $comp = $sentimenter->getSentiment($row[4]);

    $CompoundScore = $comp['compound'];

    if ($CompoundScore >= 0.05) {
        $CompoundScores = 'Positive';
    } elseif ($CompoundScore > -0.05 || $comp < 0.05) {
        $CompoundScores = 'Neutral';
    } elseif ($CompoundScore <= -0.05) {
        $CompoundScores = 'Negative';
    };

    $update =
        'UPDATE compound SET compound = "' . $CompoundScores . '" WHERE id = "' . $row[0] . '"';

    mysqli_query($conn, $update);
}

header('location: index.php');
