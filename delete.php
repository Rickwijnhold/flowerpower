<?php
$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}


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