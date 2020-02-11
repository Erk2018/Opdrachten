<?php
$host   = 'localhost';
$db     = 'erkregister';
$user   = 'root';
$pass   = 'pistabLO$%5';
$charset = 'utf8mb4';

$con = mysqli_connect($host,$user,$pass,$db);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
