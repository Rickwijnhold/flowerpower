<?php
session_start();
?>



<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-success  text-white">
        <a class="logo" href="./index.php">
            <img src="./plaatjes/logo.png" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="index.php">Home | <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="producten.php">Producten |</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php">Contact |</a>
                </li>
                <?php
                if (isset($_SESSION['functie'] )) {
                    if($_SESSION['functie'] == 'medewerker'){
                        echo"
					<li class='nav-item'>
						<a class='nav-link text-white' href='bestellingen.php'>Bestellingen |</a>

					</li>
					<li class='nav-item'>
					<a class='nav-link text-white' href='gegevens.php'>Gebruikers Paneel |</a>
                    </li>
                    <li class='nav-item'>
					<a class='nav-link text-white' href='producttoevoegen.php'>Product Paneel</a>
                    </li>
                   
					";}}?>

                <?php
                if (isset($_SESSION['functie']  )) {
                    if($_SESSION['functie'] != 'medewerker'){
                        echo"
					<li class='nav-item'>
						<a class='nav-link text-white' href='useredit.php'>Klant Gegevens |</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link text-white' href='klantfactuur.php'>Bestelling</a>
					</li>
					";}}?>

            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>

            <a href="winkelmand.php" class="nav-item nav-link active">
                <h5 class="px-1 my-1 cart">
                    <i class="fas fa-shopping-cart" style="color:white"></i><font style="color:white"> Winkelmand</font>
                    <?php

                    if(isset($_SESSION['Cart'])){
                        $count = count($_SESSION['Cart']);
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                    }else{
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                    }
                    ?>
                </h5>
            </a>
        </div>
        <li class="nav-item dropleft">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user" style="color:white; font-size: 25px;"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"><?php
                    if (isset($_SESSION['userId'])) {

                        echo '<div class=""><form action="Bijhorend/logout.inc.php" method="post">

						<div class=""><button type="submit" name="logout-submit">Logout</button></div>
						
					</form></div>'
                        ;;;

                    }
                    else {
                        echo '
						<div class=""><form action="Bijhorend/login.inc.php" method="post">
						<input type="text" name="mailuid" placeholder="Gebruikersnaam/E-mail"><br>
						<input type="password" name="pwd" placeholder="Wachtwoord"><br>
						<button type="submit" name="login-submit">Login</button>
					</form></div>
						
						
	
					<div class="dropdown-divider"></div>';}?>
                </a>

                <?php
                if (isset($_SESSION['userId'])) {;}
                else{
                    echo '<div class=""><a href="signup.php" class="ml-4" style="color: black; text-decoration: underline;">Signup</a></div>';}
                ?>

            </div>
        </li>
    </nav>
</header>