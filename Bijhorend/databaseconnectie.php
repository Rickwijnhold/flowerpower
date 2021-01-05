<?php
    $servername = "us-cdbr-east-02.cleardb.com:3306";
    $user = "be26b0662d82f4";
    $password = "08796b83";
    $dBName = "heroku_75a623df7bc9414";

    $conn = mysqli_connect($servername, $user, $password, $dBName);

    if (!$conn) {
        die("connection failed: ".mysqli_connect_error());
    }

// informatie uit database halen
$result = "SELECT * FROM artikel";
$resultt = mysqli_query($conn, $result);