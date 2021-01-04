<?php
    require 'Bijhorend/databaseconnectie.php';
    if (isset($_POST['terug'])){
        header("Location: winkelmand.php");
    }


    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $idklant = $_POST['idklant'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $address = $_POST['address'];
        $pmode = $_POST['pmode'];

        $data = '';

        $stmt = $conn->prepare("INSERT INTO orders 
(ordername,idklant,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sissssss",$name,$idklant,$email,$phone,$address,$pmode,$products,$grand_total);
        $stmt->execute();
        $data .='<div class="text-center">
<h1 class="display-4 mt-2 text-danger">Thank you!</h1>
<h2 class="text-succes">Your Order Placed Succesfully!</h2>
<h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4>
<h4>Your Name : '.$name.'</h4>
<h4>Your Email : '.$email.'</h4>
<h4>Your Phone : '.$phone.'</h4>
<h4>Total Amount Paid : '.number_format($grand_total,2).'</h4>
<h4>Payment Mode: '.$pmode.'</h4>
<h4>Payment User: '.$idklant.'</h4>
 <a class="nav-link text-white" href="winkelmand.php">Terug naar winkelmand</a>
 </div>';

        echo $data;

    }


?>