<?php
$host = 'localhost';
$username = 'root';
$dbpass = '';
$dbname = 'alumnidb';
$conn= mysqli_connect($host,$username,$dbpass,$dbname);


if (!$conn) {
    echo "Error connecting to database";
}
