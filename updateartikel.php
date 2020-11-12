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
    $image = $_POST['image'];

    $query = " update artikel set artikel_name = '".$name."', artikel_price='".$price."',artikel_beschrijving='".$beschrijving."', artikel_image='".$image."' where artikel_id = '".$id."'";
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
update artikel set artikel_name = 'Rick', artikel_price= '11', artikel_beschrijving = 'test', artikel_image = 'test' where artikel_id = 1;

deze lukt
