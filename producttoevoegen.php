<?php
    session_start();

$servername = "localhost:3306";
$user = "root";
$password = "Dobbelsteen12!";
$dBName = "flowerpower";

$conn = mysqli_connect($servername, $user, $password, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
if(!isset($_SESSION['userId'])){ //if login in session is not set
    header("Location: homepage.php");
}
// informatie uit database halen
$result = "SELECT * FROM artikel";
$resultt = mysqli_query($conn, $result);

error_reporting(0);

?>
<!DOCTYPE html>
<html>
<style>

    .image-preview {
        width: 300px;
        min-height: 100px;
        border: 2px solid #dddddd;
        margin-top: 15px;

        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
    }
    .image-preview__image {
        display: none;
        width: 100%;
    }

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Flower Power</title>
    <link rel="shortcut icon" href="plaatjes/logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/styling.css">
<style>
    #imageshow{
        width: 100px;
        height: 100px;
    }
</style>
</head>
<body>
<?php require_once("Bijhorend/header.php");?>
<div class="container">
    <div class="row">
        <div class="col m-auto" style="margin-top: 100px">
            <div class="card mt-5">
                <table class="table table-bordered"
                <tr>
                    <td>Artikel id</td>
                    <td>artikel naam</td>
                    <td>artikel prijs</td>
                    <td>artikel beschrijving</td>
                    <td>artikel Image</td>
                    <td>artikel Edit</td>
                    <td>artikel Verwijder</td>

                </tr>
                <?php
                while ($row=mysqli_fetch_assoc($resultt)) {
                    $artikelId = $row['idartikel'];
                    $artikelName = $row['artikelnaam'];
                    $artikelPrice = $row['prijs'];
                    $artikelImage = $row['image'];
                    $artikelBeschrijving = $row['omschrijving'];
                    ?>

                    <tr>
                        <td><?php echo $artikelId ?></td>
                        <td><?php echo $artikelName ?></td>
                        <td><?php echo $artikelPrice ?></td>
                        <td><?php echo $artikelBeschrijving ?></td>
                        <td><?php $mysqli = new mysqli('localhost:3306','root','Dobbelsteen12!','flowerpower');
                        $query = "SELECT image from artikel where idartikel = $artikelId";
                        $stmt = $mysqli->prepare($query) or die('Error preparing.');
                        $stmt->bind_result($artikelImage) or die('Error binding results.');
                        $stmt->execute() or die ('Error executing.');
                        $stmt->fetch() or die('There are no images in the database.');
                        echo '<img id="imageshow" src="' . $artikelImage . '"';
                        ?></td>
                        <td><a href="editartikel.php?GetID=<?php echo $artikelId ?>">Edit</a></td>
                        <td><a href="deleteartikel.php?Del=<?php echo $artikelId ?>">Delete</a></td>



                    </tr>
                    <?php
                }
                ?>
                Voeg product toe
                <form action="addquery.php" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Name " name="name" value="">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Price " name="price" value="">
                    <input type="text" class="form-control mb-2" placeholder=" Artikel Beschrijving " name="beschrijving" value="">
                    <input type="file" class="form-control mb-2" placeholder=" Artikel Image URL " name="image" id="image" value="">
                    <div class="image-preview" id="imagePreview">
                        <img src="" alt="Image Preview" class="image-preview__image">
                        <span class="image-preview__default-text">Image Preview</span>
                    </div>

                    <input type="submit" name="submit" value="submit">
                </form>
                </table>
            </div>
        </div>
    </div>
</div>
    <script>
    const image = document.getElementById("image");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    image.addEventListener("change", function () {
        const file = this.files[0];
        console.log(file);

        if (file) {
            const reader = new FileReader();

            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";


            reader.addEventListener("load",function () {
                console.log(this);
                previewImage.setAttribute("src", this.result);

            });
            reader.readAsDataURL(file);
        } else {
            previewDefaultText.style.display = "null";
            previewImage.style.display = "null";
        }
    });
</script>

<?php require_once("Bijhorend/footer.php");?>

</body>
</html>