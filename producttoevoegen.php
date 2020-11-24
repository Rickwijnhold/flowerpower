<?php
    session_start();

$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
if(!isset($_SESSION['userId'])){ //if login in session is not set
    header("Location: homepage.php");
}
// informatie uit database halen
$result = "SELECT * FROM artikel";
$resultt = mysqli_query($conn, $result);

error_reporting(0);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Flower Power</title>
    <link rel="shortcut icon" href="plaatjes/logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styling.css">

</head>
<body>
<?php require_once("Bijhorend/header.php");?>
<div class="container">
    <div class="row">
        <div class="col m-auto" style="margin-top: 100px">
            <div class="card mt-5">
                <table class="table table-bordered"
                <tr>
                    <td>Artikel id</td>
                    <td>artikel naam</td>
                    <td>artikel prijs</td>
                    <td>artikel beschrijving</td>
                    <td>artikel plaatje</td>
                    <td>artikel Edit</td>
                    <td>artikel Verwijder</td>

                </tr>
                <?php
                while ($row=mysqli_fetch_assoc($resultt)) {
                    $artikelId = $row['idartikel'];
                    $artikelName = $row['artikelnaam'];
                    $artikelPrice = $row['prijs'];
                    $artikelBeschrijving = $row['omschrijving'];
                    $artikelImage = $row['image'];
                    ?>

                    <tr>
                        <td><?php echo $artikelId ?></td>
                        <td><?php echo $artikelName ?></td>
                        <td><?php echo $artikelPrice ?></td>
                        <td><?php echo $artikelBeschrijving ?></td>
                        <td><?php echo $artikelImage ?></td>
                        <td><a href="editartikel.php?GetID=<?php echo $artikelId ?>">Edit</a></td>
                        <td><a href="deleteartikel.php?Del=<?php echo $artikelId ?>">Delete</a></td>



                    </tr>
                    <?php
                }
                ?>
                Voeg product toe
                <form action="addquery.php" method="post">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Name " name="name" value="">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Price " name="price" value="">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Beschrijving " name="beschrijving" value="">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Image URL " name="image" value="">

                    <button class="btn btn-primary" name="update">Voeg Toe</button>
                </form>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once("Bijhorend/footer.php");?>

</body>
</html>