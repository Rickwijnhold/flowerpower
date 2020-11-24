<?php
session_start();
error_reporting(0);
include_once 'Bijhorend/databaseconnectie.php';

$id=$_GET['id'];

/* alleen medewerker */
?>
<!DOCTYPE html>
<html>
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
<br><br><br><br><Br>
<h1 class="container"> Bestellingen</h1>
<br>
<table class="container">
    <thead>
    <tr>
        <th>Bestelnummer</th>
        <th>Klantnummer</th>
        <th><a href="bestellingen.php?sort=desc">Datum</a></th>
        <th><a href="bestellingen.php?sort=status">Afgeleverd?</a></th>
        <th>Winkel</th>
        <th>Overzicht</th>
        <th>Totaalprijs (excl verzendkosten)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $totaal = 0;
    //$res=mysqli_query($conn, "SELECT Aantal, product_price FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id where cart.cart_id = $id");

    $DBConnect5 = new mysqli("localhost:3306","root","Dobbelsteen12!","flowerpower");
    $res="SELECT Aantal, product_price FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id where cart.cart_id = $id";
    $restar = $DBConnect5->query($res);
    $ress="SELECT * FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id group by idUsers";
    $result = $DBConnect5->query($ress);
    $resss = "SELECT * FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id group by idUsers ORDER BY cart_date";
    $resultt = $DBConnect5->query($resss);
    $ressss = "SELECT * FROM cart join cartproducten on cart.cart_id = cartproducten.cart_id group by idUsers ORDER BY cart_status";
    $resulttt = $DBConnect5->query($ressss);
    while($row=mysqli_fetch_array($result))
    {

        if($_GET['sort'] == 'desc')
        {
            $row = mysqli_fetch_array($resultt);
        }
        if($_GET['sort'] == 'status')
        {
            $row = mysqli_fetch_array($resulttt);
        }

        echo"<tr>";
        echo"<td>"; echo $row["cart_id"];  echo "</td>";
        echo"<td>"; echo $row["idUsers"];  echo "</td>";
        echo"<td>"; echo $row["cart_date"]; echo "</td>";
        echo"<td>"; echo $row["cart_status"]; echo "</td>";
        echo"<td>"; echo $row["winkel"]; echo "</td>";




        if (isset($_SESSION['userId'])) {
            echo "<td>";
            ?>
            <a href="overzicht.php?id=<?php echo $row["cart_id"]; ?>">
                <button type="button" class="">Bekijken</button>
            </a>
            <?php echo "</td>";
            echo "<td>"; ?>
            <a href="bestellingen.php?id=<?php echo $row["cart_id"]; ?>">Klik voor weergave totaalprijs</a>
            <?php
            while($row=mysqli_fetch_array($restar))
            {
                $totaal=$totaal+$row['Aantal']*$row['product_price'];

            }
            ?>
            <?php
            echo "</td>";
        }
    }

    if ($totaal >= 1){ echo"<th> totaalprijs: "; echo "€ "; echo $totaal;
        echo"</th>";
    }
    else{}


    ?>


    <?php require_once("Bijhorend/footer.php");?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>