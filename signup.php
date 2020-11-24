<?php
session_start();
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
<body class="my-5">
<?php require_once("Bijhorend/header.php");?>
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<p class="signuperror">Fill in all fields!</p>';
    }
    else if ($_GET["error"] == "invaliduidmail") {
        echo '<p class="signuperror">Invalid username and e-mail!</p>';
    }
    else if ($_GET["error"] == "invaliduid") {
        echo '<p class="signuperror">Invalid username!</p>';
    }
    else if ($_GET["error"] == "invalidmail") {
        echo '<p class="signuperror">Invalid e-mail!</p>';
    }
    else if ($_GET["error"] == "passwordcheck") {
        echo '<p class="signuperror">Your passwords do not match!</p>';
    }
    else if ($_GET["error"] == "usertaken") {
        echo '<p class="signuperror">Username is already taken!</p>';
    }
    else if ($_GET["error"] == "emailtaken") {
        echo '<p class="signuperror">E-mail is already taken!</p>';
    }
    else if ($_GET["error"] == "uidmailtaken") {
        echo '<p class="signuperror">Username and e-mail is already taken!</p>';
    }
}
else if ($_GET["signup"] == "succes") {
    echo '<p class="signupsucces">Signup succesfull!</p>';
}
?>
<br><br>
<div class="container-fluid">

    <form action="Bijhorend/login.inc.php" method="post">
        <div class="container col-lg-4">
            <h3 class="text-center py-1">Login</h3>
            <input type="text" class="form-control my-2" name="mailuid" placeholder="Gebruikersnaam/E-mail">
            <input type="password" class="form-control my-2" name="pwd" placeholder="Wachtwoord">
            <button type="submit" class="form-control bg-success text-white" name="login-submit">Login</button>
            <br>
        </div>
    </form>





    <form action="Bijhorend/signup.inc.php" method="post">
        <div class="container col-lg-4">
            <h3 class="text-center py-1">Signup</h3>
            <input type="text" class="form-control my-2" name="uid" placeholder="Gebruikersnaam">
            <input type="text" class="form-control my-2" name="mail" placeholder="E-mail">
            <input type="password" class="form-control my-2" name="pwd" placeholder="Wachtwoord">
            <input type="password" class="form-control my-2" name="pwd-repeat" placeholder="Herhaal wachtwoord">
            <button type="submit" class="form-control bg-success text-white" name="signup-submit">Signup</button>
            <br>
            <a href="reset-password.php">Forgot your password?</a>
        </div>
    </form>
</div>

<br><br><br><br><br><br><br>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php require_once("Bijhorend/footer.php");?>
</html>