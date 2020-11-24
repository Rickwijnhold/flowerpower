<?php

if (isset($_POST['login-submit'])) {

    require 'databaseconnectie.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if (empty($mailuid) || empty($password)) {
        header("Location: ../homepage.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM klant WHERE usernaam=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../homepage.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../homepage.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true ){
                    session_start();
                    $_SESSION['functie'] = $row['functie'];
                    $_SESSION['userId'] = $row['idklant'];
                    $_SESSION['userUid'] = $row['usernaam'];

                    header("Location: ../homepage.php?login=succes");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $functie = $_SESSION['functie'] = $row['functie'];
                   $userid = $_SESSION['userId'] = $row['idklant'];
                    $username = $_SESSION['userUid'] = $row['usernaam'];

                    header("Location: ../homepage.php?login=succes");
                    exit();
                }
                else{
                    header("Location: ../homepage.php?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("Location: ../homepage.php?error=nouser");
                exit();
            }
        }
    }

}

else {
    header("Location: ../homepage.php");
    exit();
}