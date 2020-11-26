<?php
session_start();
include_once 'databaseconnectie.php';

$idUsers = $_SESSION['userId'];



$artikel_id = array_column($_SESSION['Cart'], 'idartikel');
while($row = mysqli_fetch_assoc($resultt)){
    foreach($artikel_id as $id)
        $row['idartikel'] == $id;
}

$sqlll = "INSERT INTO cart (idklant, idartikel) values ($idUsers, $id);";

mysqli_query($conn, $sqlll);
header("location:../homepage.php");