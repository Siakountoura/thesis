<?php
include 'dbh.inc.php';

if (isset($_GET['getgrade'])){
    $id = $_GET['getgrade'];
    $category = "SELECT * FROM selections where id=$id";
    $category =  mysqli_query($conn, $category);
    $category = mysqli_fetch_all($category);
echo json_encode($category);
}