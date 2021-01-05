<?php
    $servername = "us-cdbr-east-02.cleardb.com";
    $user = "be26b0662d82f4";
    $password = "08796b83";
    $dBName = "heroku_75a623df7bc9414";

    $conn = mysqli_connect($servername, $user, $password, $dBName);

    if (!$conn) {
        die("connection failed: ".mysqli_connect_error());
    }


if (isset($_GET['Del'])) {
    $UserID = $_GET['Del'];
    $query = " delete from klant where idKlant = '".$UserID."'";
    $result = mysqli_query($conn,$query);

    if ($result)
    {
        header("location:gegevens.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:gegevens.php");
}
 ?>