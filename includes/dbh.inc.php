<?php

// $serverName = "localhost";
// $dBUsername = "root";
// $dBPassword = "";
// $dBName = "gradingsystem";

//remote database connection
$serverName = "remotemysql.com";
$dBUsername = "PdHl2Qrttr";
$dBPassword = "9QwqGpmcF7";
$dBName = "PdHl2Qrttr";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// mysqli_query($conn, 'SET character_set_results=utf8');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}