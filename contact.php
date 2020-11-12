<?php
// start session

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Flower Power</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styling.css">

</head>
<body class="contactbody">
<?php require_once("Bijhorend/header.php");?>


<div class="contact-title2">
    <h1>Say Hello</h1>
    <h2>We are always ready to serve you!</h2>
</div>
<div class="contact-form2">
    <form class="formcontact" id="contact-form" method="post" action="contact2.php">
        <input name="name" type="text" class="form-control2" placeholder="Your Name" required
               <br>

        <input name="email" type="email" class="form-control2" placeholder="Your Email" required
        <br>

        <textarea name="message" class="form-control2" placeholder="Message" row="4" required></textarea><br>

        <input type="submit" class="form-control2 submit" value="SEND MESSAGE"
    </form>
</div>
<p>Winkels die wij hebben en telefoon-nummers</p>



<?php require_once("Bijhorend/footer.php");?>
</body>


</html>
