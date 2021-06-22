<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gradingsystem";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
mysqli_query($conn, 'SET character_set_results=utf8');

$category = "SELECT id,category FROM selections;";


$res1 = mysqli_query($conn, $category);

$res2 = mysqli_query($conn, $category);
$res3 = mysqli_query($conn, $category);
$res4 = mysqli_query($conn, $category);
$res5 = mysqli_query($conn, $category);
$res6 = mysqli_query($conn, $category);
$res7 = mysqli_query($conn, $category);
$res8 = mysqli_query($conn, $category);
$res9 = mysqli_query($conn, $category);
$res10 = mysqli_query($conn, $category);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}