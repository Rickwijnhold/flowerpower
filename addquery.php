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
    $naam = $_POST['name'];
    $prijs = $_POST['price'];
    $omschrijving = $_POST['beschrijving'];
    $image = $_POST['image'];

    $query = "insert into artikel(artikelnaam,prijs,omschrijving,image)VALUES('$naam',$prijs,'$omschrijving','$image');";
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

<!--insert into artikel (artikel_id,artikel_name,artikel_price,artikel_beschrijving,artikel_image) values (8, 'Rick Bloem', '100', 'Ja dit is een mooie bloem', 'plaatje');-->

<!--werkt-->
