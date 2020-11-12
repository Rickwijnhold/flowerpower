<?php

$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
if(isset($_POST['update']))
{
    $UserID = $_GET['ID'];
    $UserName = $_POST['name'];
    $UserEmail = $_POST['email'];

    $query = " update klant set uidKlant = '".$UserName."', emailKlant='".$UserEmail."' where idKlant='".$UserID."'";
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