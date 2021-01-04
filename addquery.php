<?php
//// Connectie maken met database
//require_once 'database.php';
//
//if (!$conn) {
//    die("connection failed: ".mysqli_connect_error());
//}
//// Als er op de update knop word gedrukt pakt het de informatie die in de form zit. De name is heel belangrijk
//if(isset($_POST['update']))
//{
//    $image = addslashes(file_get_contents($_FILES["inpFile"]["tmp_name"]));
//    $imageType = mysqli_real_escape_string($_FILES["inpFile"]["type"]);
//if (substr($imageType,0,5) == "inpFile")
//{
//    echo "Working code";
//} else
//{
//    echo "Only images are allowed";
//}
//
//    $dot = '.';
//    $naam = $_POST['name'];
//    $prijs = $_POST['price'];
//    $omschrijving = $_POST['beschrijving'];
//// Dit is de query die zegt dat de informatie ingevuld in de form gestuurd word naar de database. Als alles is ingevuld is er een nieuwe product toegevoegd.
//    $query = "insert into artikel(artikelnaam,prijs,omschrijving,image)VALUES('$naam',$prijs,'$omschrijving', '$image');";
//    $result = mysqli_query($conn,$query);
//    // Als alles goed gegaan is zal je toegewezen worden naar de product toevoegen pagina.
//    if($result)
//    {
//        echo '<script type="text/javascript"> alert("Product toegevoegd")</script>';
//    }
//    else
//    {
//        echo ' Please Check Your Query ';
//    }
//}
//// Als er een fout in de query is dan ga je naar de gegevens pagina.
//else
//{
//    header("location:gegevens.php");
//}
//
//
//?>
<?php
// Include the database configuration file
$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
$name = $_POST['name'];
$price = $_POST['price'];
$beschrijving = $_POST['beschrijving'];

// IMAGE OP DE JUISTE PLAATS ZETTEN(IN MAP IMAGES)
$temp_location = $_FILES['image']['tmp_name'];
$target_location = 'plaatjes/producten/' . time() . $_FILES['image']['name'];


move_uploaded_file($temp_location,$target_location);



$mysqli = new mysqli("localhost:3306", "root","Dobbelsteen12!","flowerpower") or die('Error connecting.');
$query = "INSERT INTO artikel VALUES (0,?,?,?,?)";
$stmt = $mysqli->prepare($query) or die('Error preparing.');
$stmt->bind_param('ssss', $target_location,$name,$price,$beschrijving) or die('Error binding params');
$stmt->execute() or die ('Error inserting image in database.');
$stmt->close();

if (isset($_POST['submit'])){
    header("location:producttoevoegen.php");
    echo '<script type="text/javascript"> alert("Bestelling geplaatst")</script>';

}else{

}
?>
