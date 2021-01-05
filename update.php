<?php

    require 'Bijhorend/databaseconnectie.php';
if(isset($_POST['update']))
{
    $UserID = $_GET['ID'];
    $UserName = $_POST['name'];
    $UserEmail = $_POST['email'];

    $query = " update klant set usernaam = '".$UserName."', email='".$UserEmail."' where idklant='".$UserID."'";
    $result = mysqli_query($conn,$query);

    if($result)
    {
        header("location:gegevens.php");
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