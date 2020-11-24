<?php
include_once 'databaseconnectie.php';
$id=$_GET["id"];
mysqli_query($conn,"delete from klant where idklant=$id");
?>

<?php/*
$DBConnect3 = new mysqli("localhost","root","Mypass","diezaain");
$id=$_GET["id"];
mysqli_query($conn,"delete from users_has_functies where idUsers=$id");
*/?>
<script type="text/javascript">
    window.location="../gegevens.php";

</script>