<?php

session_start();
/* tijdelijk */ error_reporting(1);

require_once("Bijhorend/databaseconnectie.php");
require_once("Bijhorend/component.php");

if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
        foreach($_SESSION['Cart'] as $key => $value){
            if($value["idartikel"] == $_GET['id']){
                unset($_SESSION['Cart'][$key]);
                $query = "DELETE FROM cartproducten WHERE product_id =" . $_GET['id'];
                $result = mysqli_query($conn,$query);

            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winkelmand</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styling.css">
</head>
<body class="bg-light">

<?php
require_once('Bijhorend/header.php');
?>

<div class="container-fluid my-5">
    <div class="row px-5">
        <div class="col-md-7 my-5">
            <div class="shopping-cart">
                <h6>Winkelmand</h6>
                <hr>

                <?php
                $total = 0;
                if(isset($_SESSION['Cart'])){
                    $artikel_id = array_column($_SESSION['Cart'], 'idartikel');
                    while($row = mysqli_fetch_assoc($resultt)){
                        $id = $row['idartikel'];
                        $naam = $row['artikelnaam'];
                        $prijs = $row['prijs'];
                        foreach($artikel_id as $id){
                            if($row['idartikel'] == $id){
                                cartElement($row['image'], $row['artikelnaam'], $row['prijs'], $row['idartikel'], $row['omschrijving']);
                                $total = $total + (int)$row['prijs'];
                                $query = " INSERT into cartproducten (product_name,product_price,Aantal,total_price)VALUES ('".$naam."','".$prijs."',1,'".$total."')";
//                                $result = mysqli_query($conn,$query);

                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $id = $row['idartikel'];
                                    $naam = $row['artikelnaam'];
                                    $prijs = $row['prijs'];
                                    $omschrijving = $row['omschrijving'];
                                }




                            }

                        }
                    }
                }else{
                    echo "<h5>Winkelmand is leeg</h5>";
                }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRIJS DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if (isset($_SESSION['Cart'])){
                            $count = count($_SESSION['Cart']);
                            echo "<h6>Prijs ($count artikelen)</h6>";
                        }else{
                            echo "<h6>Prijs (0 artikelen)</h6>";
                        }
                        ?>
                        <h6>Bezorgkosten</h6>
                        <hr>
                        <h6>Nog te betalen</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">GRATIS</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?>
                            <?php
                            if (isset($_SESSION['Cart'])){
                                echo '<br><br>
<a href="checkout.php" class="btn btn-info"/>
<i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
						
					</form>';
                            }else{
                                echo "";
                            }
                            ?></h6>
                        <?php
                        if (isset($_POST['submit'])){
                            echo '<script type="text/javascript"> alert("Bestelling geplaatst")</script>';

                        }else{

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    function berekenSubTotaal(a, b, c){
        var prijs = parseFloat(a.textContent);
        var aantal = parseInt(b.value);
        var totaalprijs= prijs * aantal;
        c.textContent = totaalprijs.toFixed();
    }
    //burning spear
    var prijsinput = document.getElementById("prijs");
    var aantalinput = document.getElementById("numberr");
    var subtotaal = document.getElementById("totaal");

    aantalinput.addEventListener("change", function() {
        berekenSubTotaal(prijsinput, aantalinput, subtotaal);
    });

    berekenSubTotaal(prijsinput, aantalinput, subtotaal);

</script>
</body>
</html>