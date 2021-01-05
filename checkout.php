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
    $result = "SELECT * FROM klant where idKlant = '".$_SESSION['userId']."'";
    $resultt = mysqli_query($conn, $result);

    error_reporting(0);

   require 'Bijhorend/databaseconnectie.php';
   $grand_total = 0;
   $allItems = '';
   $items = array();

   $sql = "SELECT CONCAT(product_name, ')',Aantal,')') AS ItemQty, total_price FROM cartproducten";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->get_result();
   while ($row = $result->fetch_assoc()){
       $grand_total +=$row['total_price'];
       $items[] = $row['ItemQty'];
   }
   $allItems = implode(",", $items);
$idklant = $_SESSION['userId'];

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
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2">Complete your order!</h4>
            <div class="jumbotron p-3 mb-2 text-center">
                <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
                <h6 class="lead"><b>Bezorg Kosten : </b>Free</h6>
                <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?></h5>
            </div>
            <form action="action.php" method="post" id="placeOrder">
                <input type="hidden" name="products" value="<?= $allItems; ?>">
                <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control" cols="10" rows="3" placeholder="Enter Delivery Address Here...."></textarea>
                </div>
                <h6 class="text-center lead">Select Payment Mode</h6>
                <div class="form-group">
                    <select name="pmode" class="form-control">
                        <option value="" selected disabled>Select Payment Mode</option>
                        <option value="cod">Cash On Delivery</option>
                        <option value="netbanking">Net banking</option>
                        <option value="cards">Debit/Credit Card</option>
                    </select>
                    <input type='hidden' name='idklant' value='<?php echo $idklant?>'>

                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                </div>
<?php print_r($idklant) ?>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {

   $("#placeOrder").submit(function (e) {
       e.preventDefault();
       $.ajax({
          url:  'action.php',
           method: 'post',
           data: $('form').serialize()+"&action=order",
           success: function (response) {
              $("#order").html(response);

           }
       });
   });
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

    })
</script>
