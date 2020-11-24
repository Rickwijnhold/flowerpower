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
$result = "SELECT * FROM klant";
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
<?php require_once("Bijhorend/header.php");?>
<div class="container">
    <div class="row">
        <div class="col m-auto" style="margin-top: 100px">
            <div class="card mt-5">




                <table>
                    <thead>
                    <tr>
                        <th>idUsers</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Voornaam</th>
                        <th>Tussenvoegsel</th>
                        <th>Achternaam</th>
                        <th>Adres</th>
                        <th>Huisnummer</th>
                        <th>Postcode</th>
                        <th>Plaats</th>
                        <th>Telefoon</th>
                        <th>Functie</th>
                        <?php if (isset($_SESSION['userId'])) {
                            echo '
							<th>Wijzigen</th>
							<th>Verwijderen</th>
						';}?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $res=mysqli_query($conn,"select * from klant");
                 /*   $ress=mysqli_query($conn,"select * from klant right join users_has_functies on users.idUsers = users_has_functies.idUsers ");*/
                    while($row=mysqli_fetch_array($res))
                    {
                        echo"<tr>";
                        echo"<td>"; echo $row["idklant"];  echo "</td>";
                        echo"<td>"; echo $row["usernaam"];  echo "</td>";
                        echo"<td>"; echo $row["email"]; echo "</td>";
                        echo"<td>"; echo $row["voornaam"]; echo "</td>";
                        echo"<td>"; echo $row["tussenvoegsel"]; echo "</td>";
                        echo"<td>"; echo $row["achternaam"]; echo"</td>";
                        echo"<td>"; echo $row["adres"]; echo"</td>";
                        echo"<td>"; echo $row["huisnr"]; echo"</td>";
                        echo"<td>"; echo $row["postcode"]; echo"</td>";
                        echo"<td>"; echo $row["plaats"]; echo"</td>";
                        echo"<td>"; echo $row["telefoon"]; echo"</td>";
                        echo"<td>"; echo $row["functie"]; echo"</td>";


                        if (isset($_SESSION['userId'])) {
                            echo "<td>";
                            ?>
                            <a href="editt.php?id=<?php echo $row["idklant"]; ?>">
                                <button type="button" class="">Wijzigen</button>
                            </a>
                            <?php echo "</td>";
                            echo"<td>";?>
                            <a href="Bijhorend/deletee.php?id=<?php echo $row["idklant"];?>">
                                <button type="button" class="">Verwijder</button>
                            </a>
                            <?php echo "</td>";
                            echo"</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>

<?php require_once("Bijhorend/footer.php");?>
</body>
</html>
