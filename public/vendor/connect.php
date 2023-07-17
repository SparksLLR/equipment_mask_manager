<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "equipment_db";
$connection = mysqli_connect($servername, $username, $password, "$dbname");

if (!$connection) {
    die('Could not Connect MySql Server:' . mysqli_error());
}