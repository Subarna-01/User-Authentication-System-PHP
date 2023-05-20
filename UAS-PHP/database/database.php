<?php
    $servername = "localhost";
    $username = "root";
    $password = "sub@2001";
    $dbname = "test_app";

    $conn = mysqli_connect($servername, $username, $password,$dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>