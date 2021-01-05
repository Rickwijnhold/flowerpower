<?php

    require 'Bijhorend/databaseconnectie.php';
if(isset($_POST['update']))
{
    $id = $_GET['ID'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $beschrijving = $_POST['beschrijving'];

    $query = " update artikel set artikelnaam = '".$name."', prijs='".$price."',omschrijving='".$beschrijving."' where idartikel = '".$id."'";
    $result = mysqli_query($conn,$query);

    if($result)
    {
        header("location:producttoevoegen.php");
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}
else
{
    header("location:gegevens.php");
}


?>