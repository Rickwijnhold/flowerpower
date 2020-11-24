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
$result = "SELECT * FROM medewerker";
$resultt = mysqli_query($conn, $result);

error_reporting(0);

?>
<html lang="en"
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Flower Power</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styling.css">
</head>
<body>
<?php require_once("./Bijhorend/header.php");?>
<div class="container">
    <div class="row">
        <div class="col m-auto" style="margin-top: 100px">
            <div class="card mt-5">
                <table class="table table-bordered"
                <tr>
                    <td>Medewerker ID</td>
                    <td>Voornaam</td>
                    <td>Tussenvoegsel</td>
                    <td>Achternaam</td>
                    <td>Vestiging</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php
                while ($row=mysqli_fetch_assoc($resultt)) {
                    $UserID = $row['idmedewerker'];
                    $mnaam = $row['voornaam'];
                    $mtussen = $row['tussenvoegsel'];
                    $machternaam = $row['achternaam'];
                    $mvestiging = $row['vestiging'];

                    ?>

                    <tr>
                        <td><?php echo $UserID ?></td>
                        <td><?php echo $mnaam ?></td>
                        <td><?php echo $mtussen ?></td>
                        <td><?php echo $machternaam ?></td>
                        <td><?php echo $mvestiging ?></td>
                        <td><a href="edit.php?GetID=<?php echo $UserID ?>">Edit</a></td>
                        <td><a href="delete.php?Del=<?php echo $UserID ?>">Delete</a></td>


                    </tr>
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once("./Bijhorend/footer.php");?>
</body>
</html>
