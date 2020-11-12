<?php
$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
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
                    $artikelId = $row['artikel_id'];
                    $artikelName = $row['artikel_name'];
                    $artikelPrice = $row['artikel_price'];
                    $artikelBeschrijving = $row['artikel_beschrijving'];
                    $artikelImage = $row['artikel_image'];
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
                <a href="addartikel.php"class="btn btn-success float-right mb-1"><i class="fa fa-plus"></i>Voeg toe</a>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once("Bijhorend/footer.php");?>

</body>
</html>