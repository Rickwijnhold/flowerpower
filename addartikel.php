
<?php
$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}

$query = " select * from artikel";
$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{

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
    <a href="producttoevoegen.php" class="btn btn-light mb-3"><< Go Back</a>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                </div>
                <div class="card-body">

                    <form action="addquery.php" method="post">
                        <input type="text" class="form-control mb-2" placeholder=" Artikel ID " name="ID" value="">
                        <input type="text" class="form-control mb-2" placeholder=" Artikel Name " name="name" value="">
                        <input type="text" class="form-control mb-2" placeholder=" Artikel Price " name="price" value="">
                        <input type="text" class="form-control mb-2" placeholder=" Artikel Beschrijving " name="beschrijving" value="">
                        <input type="text" class="form-control mb-2" placeholder=" Artikel Image URL " name="image" value="">

                        <button class="btn btn-primary" name="update">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>