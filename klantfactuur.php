<?php
// start session
session_start();



    $servername = "us-cdbr-east-02.cleardb.com";
    $user = "be26b0662d82f4";
    $password = "08796b83";
    $dBName = "heroku_75a623df7bc9414";

    $conn = mysqli_connect($servername, $user, $password, $dBName);

    if (!$conn) {
        die("connection failed: ".mysqli_connect_error());
    }
if(!isset($_SESSION['userId'])){ //if login in session is not set
    header("Location: index.php");
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
        <th>Product(en)</th>
        <th>Prijs</th>
    </tr>
    </thead>
    <tbody>
    <?php
    echo"<div class='border border-secondary'>";
    if(isset($_SESSION['userId'])){ //if login in session is not set
        $userId = $_SESSION['userId'];
        $res=mysqli_query($conn, "SELECT products,amount_paid FROM orders where idklant = $userId;");
        $ress=mysqli_query($conn, "SELECT * FROM orders where idklant = $userId;");
        $resss=mysqli_query($conn, "SELECT * FROM orders join klant where klant.idklant = $userId;");
        $totaal =0;
    }
    echo '<h4>Bestelling</h4>';

    if($row=mysqli_fetch_assoc($ress))
    {
        echo 'Bestelnummer: '; echo $row['idorders']; echo '<br><br>';


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
$totaal = $row['amount_paid'];


        echo"<tr>";
        echo"<td>";echo $row['products']; echo "</td>";
        echo"<td>"; echo $row['amount_paid']; echo "</td>";
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