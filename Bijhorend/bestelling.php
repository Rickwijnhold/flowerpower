<?php
session_start();
include_once 'databaseconnectie.php';

$idKlant = $_SESSION['KlantId'];



$artikel_id = array_column($_SESSION['Cart'], 'idartikel');
while($row = mysqli_fetch_assoc($resultt)){
    foreach($artikel_id as $id)
        $row['idartikel'] == $id;
}

$sqlll = "INSERT INTO cart (idklant, idartikel) values ($idKlant, $id);";

mysqli_query($conn, $sqlll);
header("location:../homepage.php");