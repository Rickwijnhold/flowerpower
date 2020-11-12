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
    $ArtikelID = $_GET['Del'];
    $query = " delete from artikel where artikel_id = '".$ArtikelID."'";
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