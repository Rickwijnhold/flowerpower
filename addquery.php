<?php
// Connectie maken met database
$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";
// Gegevens worden hier aangeven met een connect query
$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
// Als er op de update knop word gedrukt pakt het de informatie die in de form zit. De name is heel belangrijk
if(isset($_POST['update']))
{
    $naam = $_POST['name'];
    $prijs = $_POST['price'];
    $omschrijving = $_POST['beschrijving'];
    $image = $_POST['image'];
// Dit is de query die zegt dat de informatie ingevuld in de form gestuurd word naar de database. Als alles is ingevuld is er een nieuwe product toegevoegd.
    $query = "insert into artikel(artikelnaam,prijs,omschrijving,image)VALUES('$naam',$prijs,'$omschrijving','$image');";
    $result = mysqli_query($conn,$query);
    // Als alles goed gegaan is zal je toegewezen worden naar de product toevoegen pagina.
    if($result)
    {
        header("location:producttoevoegen.php");
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}
// Als er een fout in de query is dan ga je naar de gegevens pagina.
else
{
    header("location:gegevens.php");
}


?>

<!--insert into artikel (artikel_id,artikel_name,artikel_price,artikel_beschrijving,artikel_image) values (8, 'Rick Bloem', '100', 'Ja dit is een mooie bloem', 'plaatje');-->

<!--werkt-->
