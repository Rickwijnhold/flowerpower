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

// informatie uit database halen
$result = "SELECT * FROM klant where idKlant = '".$_SESSION['userId']."'";
$resultt = mysqli_query($conn, $result);
if(isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['Cart'])){

        $item_array_id = array_column($_SESSION['Cart'], "artikel_id");

        if(in_array($_POST['artikel_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'producten.php'</script>";
        }else{

            $count = count($_SESSION['Cart']);
            $item_array = array(
                'artikel_id' => $_POST['artikel_id']
            );

            $_SESSION['Cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
            'artikel_id' => $_POST['artikel_id']
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
    <?php if (isset($_SESSION['userId'])) {

    } else {
        echo "<script>alert('Registreer/Log eerst in')</script>";
        echo "<script>window.location = 'signup.php'</script>";
    }?>
</head>
<body class="my-5">

<?php require_once("Bijhorend/header.php");?>

<div class="container">
    <div class="row">
        <div class="col m-auto" style="margin-top: 100px">
            <div class="card mt-5">
                <table class="table table-bordered"
                <tr>
                    <td>User ID</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Edit</td>
                </tr>
                <?php
                while ($row=mysqli_fetch_assoc($resultt)) {
                    $UserID = $row['idKlant'];
                    $username = $row['uidKlant'];
                    $email = $row['emailKlant'];
                    ?>

                    <tr>
                        <td><?php echo $UserID ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $email ?></td>
                        <td><a href="editklant.php?GetID=<?php echo $UserID ?>">Edit</a></td>



                    </tr>
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php require_once("Bijhorend/footer.php");?>
</html>