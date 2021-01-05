<?php
session_start();
error_reporting(0);
include_once 'Bijhorend/databaseconnectie.php';

$id=$_GET['id'];

?>
<?php
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
    $result = "SELECT * FROM orders";
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
        <th>Order id</th>
        <th>Klant naam</th>
        <th>email</th>
        <th>telefoon nummer</th>
        <th>adres</th>
        <th>betalings methode</th>
        <th>product(s)</th>
        <th>Totaalprijs (excl verzendkosten)</th>
    </tr>
    </thead>
    <tbody>
    <?php
                while ($row=mysqli_fetch_assoc($resultt)) {
                    $orderid = $row['idorders'];
                    $knaam = $row['ordername'];
                    $email = $row['email'];
                    $nummer = $row['phone'];
                    $adres = $row['address'];
                    $method = $row['pmode'];
                    $products = $row['products'];
                    $paid = $row['amount_paid'];

                    ?>
                    <tr>
                        <td><?php echo $orderid ?></td>
                        <td><?php echo $knaam ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $nummer ?></td>
                        <td><?php echo $adres ?></td>
                        <td><?php echo $method ?></td>
                        <td><?php echo $products ?></td>
                        <td><?php echo $paid ?></td>


                    </tr>

                    <?php
                }


  ?>


    <?php require_once("Bijhorend/footer.php");?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>