<?php

    $servername = "us-cdbr-east-02.cleardb.com";
    $user = "be26b0662d82f4";
    $password = "08796b83";
    $dBName = "heroku_75a623df7bc9414";

    $conn = mysqli_connect($servername, $user, $password, $dBName);

    if (!$conn) {
        die("connection failed: ".mysqli_connect_error());
    }
if(isset($_POST['update']))
{
    $UserID = $_GET['ID'];
    $UserName = $_POST['name'];
    $UserEmail = $_POST['email'];
    $UserVoornaam = $_POST['voornaam'];
    $UserTussenvoegsel = $_POST['tussenvoegsel'];
    $UserAchternaam = $_POST['achternaam'];
    $UserAdres = $_POST['adres'];
    $UserHuisnr = $_POST['huisnr'];
    $UserPostcode = $_POST['postcode'];
    $UserPlaats = $_POST['plaats'];
    $UserTelefoon = $_POST['telefoon'];

    $query = " update klant set usernaam = '".$UserName."', email='".$UserEmail."', voornaam='".$UserVoornaam."', tussenvoegsel='".$UserTussenvoegsel."', achternaam='".$UserAchternaam."', adres='".$UserAdres."', huisnr='".$UserHuisnr."', postcode='".$UserPostcode."', plaats='".$UserPlaats."', telefoon='".$UserTelefoon."' where idklant='".$UserID."'";
    $result = mysqli_query($conn,$query);

    if($result)
    {

        header("location:useredit.php");

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