<?php
    require 'Bijhorend/databaseconnectie.php';


if (isset($_GET['Del'])) {
    $UserID = $_GET['Del'];
    $query = " delete from klant where idKlant = '".$UserID."'";
    $result = mysqli_query($conn,$query);

    if ($result)
    {
        header("location:gegevens.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:gegevens.php");
}
 ?>