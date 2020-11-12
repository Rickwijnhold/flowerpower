<?php
session_start();
include_once 'databaseconnectie.php';

$idKlant = $_SESSION['KlantId'];



$artikel_id = array_column($_SESSION['Cart'], 'artikel_id');
while($row = mysqli_fetch_assoc($resultt)){
    foreach($artikel_id as $id)
        $row['artikel_id'] == $id;
}

$sqlll = "INSERT INTO cart (idKlant, artikel_id) values ($idKlant, $id);";

mysqli_query($conn, $sqlll);
header("location:../homepage.php");