<?php
    require 'Bijhorend/databaseconnectie.php';

if (isset($_GET['Del'])) {
    $ArtikelID = $_GET['Del'];
    $query = " delete from artikel where idartikel = '".$ArtikelID."'";
    $result = mysqli_query($conn,$query);

    if ($result)
    {
        header("location:producttoevoegen.php");
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