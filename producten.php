<?php
// start session
session_start();




require_once('./Bijhorend/component.php');



// Als je op toevoegen drukt
if(isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['Cart'])){

        $item_array_id = array_column($_SESSION['Cart'], "idartikel");

        if(in_array($_POST['idartikel'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'producten.php'</script>";
        }else{

            $count = count($_SESSION['Cart']);
            $item_array = array(
                'idartikel' => $_POST['idartikel']
            );

            $_SESSION['Cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
            'idartikel' => $_POST['idartikel']
        );

        // create new session variable
        $_SESSION['Cart'][0] = $item_array;
    }
}
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

</head>
<body class="my-5">

<?php require_once("Bijhorend/header.php");?>




<div class="container">
    <br>
    <br>
    <b>Sorteren op:</b>
    <a href="producten.php?sort=desc">Artikelnummer</a>
    <a href="producten.php?sort=status">Prijs Laag->Hoog</a>
    <div class="row text-center py-5">


        <?php
        $DBConnect5 = new mysqli("localhost:3306","root","Dobbelsteen12!","flowerpower");
        $result = "SELECT * FROM artikel";
        $resultt = $DBConnect5->query($result);
        $resss = "SELECT * from artikel order by idartikel";
        $resulttt = $DBConnect5->query($resss);
        $ressss = "SELECT * from artikel order by prijs";
        $resultttt = $DBConnect5->query($ressss);


        while($row = mysqli_fetch_assoc($resultt))
        {

            if($_GET['sort'] == 'desc')
            {
                $row = mysqli_fetch_array($resulttt);
            }
            if($_GET['sort'] == 'status')
            {
                $row = mysqli_fetch_array($resultttt);
            }


            component($row['artikelnaam'], $row['prijs'], $row['image'], $row['idartikel'], $row['omschrijving']);
        }
        ?>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php require_once("Bijhorend/footer.php");?>
</html>