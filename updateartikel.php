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