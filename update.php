<?php

    $servername = "us-cdbr-east-02.cleardb.com";
    $user = "be26b0662d82f4";
    $password = "08796b83";
    $dBName = "heroku_75a623df7bc9414";

    $conn = mysqli_connect($servername, $user, $password, $dBName);

    if (!$conn) {
        die("connection failed: ".mysqli_connect_error());
    }
if(isset($_POST['update']))
{
    $UserID = $_GET['ID'];
    $UserName = $_POST['name'];
    $UserEmail = $_POST['email'];

    $query = " update klant set usernaam = '".$UserName."', email='".$UserEmail."' where idklant='".$UserID."'";
    $result = mysqli_query($conn,$query);

    if($result)
    {
        header("location:gegevens.php");
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}
else
{
    header("location:gegevens.php");
}


?>