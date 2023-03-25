<?php

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "be18_cr4_netusilthomas_biglibrary";

// create connection
$connect = mysqli_connect($localhost, $username, $password, $dbname);
// Object Orientated connection
$mysqli = new mysqli($localhost, $username, $password, $dbname);
// check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
    // }else {
    //     echo "Connected successfully";
}
//  check object Orientated Connection

if ($mysqli->connect_error) {
    die('Object Orientated Connection failed: ' . mysqli_connect_error());
}
