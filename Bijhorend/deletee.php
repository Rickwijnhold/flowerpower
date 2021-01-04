<?php
include_once 'databaseconnectie.php';
$id=$_GET["id"];
mysqli_query($conn,"delete from klant where idklant=$id");
?>

<?php/*

*/?>
<script type="text/javascript">
    window.location="../gegevens.php";

</script>