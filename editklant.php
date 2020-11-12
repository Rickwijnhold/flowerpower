
<?php
$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}

$UserID = $_GET['GetID'];
$query = " select * from klant where idKlant='".$UserID."'";
$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
    $UserID = $row['idKlant'];
    $username = $row['uidKlant'];
    $email = $row['emailKlant'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="styles/styling.css"/>
    <title>Document</title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                </div>
                <div class="card-body">

                    <form action="updateklant.php?ID=<?php echo $UserID ?>" method="post">
                        <input type="text" class="form-control mb-2" placeholder=" User Name " name="ID" value="<?php echo $UserID ?>">
                        <input type="text" class="form-control mb-2" placeholder=" User Email " name="name" value="<?php echo $username ?>">
                        <input type="email" class="form-control mb-2" placeholder=" User Email " name="email" value="<?php echo $email ?>">
                        <button class="btn btn-primary" name="update">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>