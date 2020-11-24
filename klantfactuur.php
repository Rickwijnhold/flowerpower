<?php
// start session
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
$result = "select cart_status from cart where idklant='userId'";
$resultt = mysqli_query($conn, $result);
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producten</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styling.css">
    <?php if (isset($_SESSION['userId'])) {

    } else {
        echo "<script>alert('Registreer/Log eerst in')</script>";
        echo "<script>window.location = 'signup.php'</script>";
    }?>
</head>
<body class="my-5">

<?php require_once("Bijhorend/header.php");?>

<br><br><br><br><br><br><br>
<table class="container">
    <thead>
    <tr>
        <th>Aantal</th>
        <th>Omschrijving</th>
        <th>Prijs</th>
    </tr>
    </thead>
    <tbody>
    <?php
    echo"<div class='border border-secondary'>";
    if(isset($_SESSION['userId'])){ //if login in session is not set
        $userId = $_SESSION['userId'];
        $res=mysqli_query($conn, "SELECT product_name, Aantal, product_price FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id where cart.idUsers = $userId;");
        $ress=mysqli_query($conn, "SELECT * FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id where cart.idUsers = $userId;");
        $resss=mysqli_query($conn, "SELECT * FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id join klant where klant.idklant = $userId;");
        $totaal =0;
    }
    echo '<h4>Bestelling</h4>';

    if($row=mysqli_fetch_assoc($ress))
    {
        echo'Datum: ';echo $row['cart_date']; echo '<br>';
        echo 'Bestelnummer: '; echo $row['cart_id']; echo '<br><br>';


        ?>

        <?php

    }
    if($row=mysqli_fetch_assoc($resss))
    {
        echo'Klant / Afleveradres <br>';echo $row['voornaam']; echo '<br>';
        echo ''; echo $row['adres']; echo '<br>';
        echo 'postcode: '; echo $row['postcode']; echo '<br><br>';

    }
    echo'<h6>Producten</h6>';
    while($row=mysqli_fetch_assoc($res))
    {
        $totaal=$totaal+$row['Aantal']*$row['product_price'];



        echo"<tr>";
        echo"<td>";echo $row['Aantal']; echo "</td>";
        echo"<td>"; echo $row['product_name']; echo "</td>";
        echo"<td>"; echo $row['product_price'];  echo "</td>";
        echo"</tr>";

    }


    ?>
    </tbody>
</table>
<b>Totaal: <?php echo $totaal; echo"</div>"?></b>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php require_once("Bijhorend/footer.php");?>
</html>