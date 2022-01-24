<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gradingsystem";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// mysqli_query($conn, 'SET character_set_results=utf8');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}