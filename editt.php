<?php
require "Bijhorend/header.php";
include_once 'Bijhorend/databaseconnectie.php';


$id=$_GET["id"];
$idklant="";
$usernaam="";
$email="";
$voornaam="";
$tussenvoegsel="";
$achternaam="";
$adres="";
$huisnr="";
$postcode="";
$plaats="";
$telefoon="";
$functie="";
$res=mysqli_query($conn, "select * from klant where idklant=$id");
while($row=mysqli_fetch_array($res))
{
    $idklant=$row["idklant"];
    $usernaam=$row["usernaam"];
    $email=$row["email"];
    $voornaam=$row["voornaam"];
    $tussenvoegsel=$row["tussenvoegsel"];
    $achternaam=$row["achternaam"];
    $adres=$row["adres"];
    $huisnr=$row["huisnr"];
    $postcode=$row["postcode"];
    $plaats=$row["plaats"];
    $telefoon=$row["telefoon"];
    $functie=$row["functie"];

}
?>
    <main>
        <?php
        if (isset($_SESSION['userId'])) {
            echo '<div class="text"><br><p>You are logged in!</p></div>';
        }
        ?>

        <br><br><br><br><br><br><br>

        <form action="" method="POST">
            <input type="text" name="usernaam" placeholder="zendernaam" value="<?php echo $usernaam; ?>">
            <input type="text" name="email" placeholder="beschrijving" value="<?php echo $email; ?>">
            <input type="text" name="voornaam" placeholder="voornaam" value="<?php echo $voornaam; ?>">
            <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?php echo $tussenvoegsel; ?>">
            <input type="text" name="achternaam" placeholder="achternaam" value="<?php echo $achternaam; ?>">
            <input type="text" name="adres" placeholder="adres" value="<?php echo $adres; ?>">
            <input type="text" name="huisnr" placeholder="huisnummer" value="<?php echo $huisnr; ?>">
            <input type="text" name="postcode" placeholder="postcode" value="<?php echo $postcode; ?>">
            <input type="text" name="plaats" placeholder="plaats" value="<?php echo $plaats; ?>">
            <input type="text" name="telefoon" placeholder="telefoon" value="<?php echo $telefoon; ?>">
            <input type="text" name="functie" placeholder="functie" value="<?php echo $functie; ?>">
            <button type="submit" name="update">Update</button>
        </form>

        <?php
        if(isset($_POST["update"]))
        {
            mysqli_query($conn,"update klant set usernaam='$_POST[usernaam]',email='$_POST[email]',voornaam='$_POST[voornaam]',tussenvoegsel='$_POST[tussenvoegsel]',achternaam='$_POST[achternaam]', adres='$_POST[adres]', huisnr='$_POST[huisnr]', postcode='$_POST[postcode]', plaats='$_POST[plaats]', telefoon='$_POST[telefoon]',functie='$_POST[functie]' where idklant=$id");

            ?>
            <script type="text/javascript">
                window.location="gegevens.php";
            </script>
            <?php


        }
        ?>
    </main>
<?php
require "Bijhorend/footer.php";
?>