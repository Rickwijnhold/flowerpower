<?php

function component($artikelname, $artikelprice, $artikelimg, $artikelid, $artikelbeschrijving){
    $element = "
	
	<div class=\"col-md-3 col-sm-6 my-3 my-md-3\">
			<form action=\"producten.php\" method=\"POST\">
				<div class=\"card shadow\">
					<div>
						<img src=\"$artikelimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
					</div>
					<div class=\"card-body bg-success\">
						<h5 class=\"card-title text-white\">$artikelname</h5>
						<h6>
							
						</h6>
						<p class=\"card-text\">
						</p>
						<h5>
							<span class=\"price text-white\">€ $artikelprice</span>
						</h5>
						
						<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Toevoegen winkelmand <i class=\"fas fa-shopping-cart\"></i></button>
						<input type='hidden' name='idartikel' value='$artikelid'>
					</div>
				</div>
			</form>
		</div>
	
	";
    echo $element;
}


function cartElement($artikelimg, $artikelname, $artikelprice, $artikelid, $artikelbeschrijving){
    $element = "
	
	<form action=\"winkelmand.php?action=remove&id=$artikelid\" method=\"post\" class=\"cart-items\">
					<div class=\"border rounded\">
						<div class=\"row bg-white\">
							<div class=\"col-md-3 pl-0\">
								<img src=$artikelimg alt=\"Image1\" class=\"img-fluid\">
							</div>
							<div class=\"col-md-6\">
								<h5 class=\"pt-2\">$artikelname</h5>
								<small class=\"text-secondary\">$artikelbeschrijving</small>
								<h5 class=\"pt-2\"'><span id='prijs'>$artikelprice</h5></span>
								<button type=\"submit\" class=\"btn btn-warning\">Bewaren</button>
								<button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Verwijderen</button>
							</div>
							<div class=\"col-md-3 py-5\">
								<div>
								<br>
									
									<input type=\"number\" name='quantity' id='numberr' value=\"1\" class=\"form-control w-28 d-inline\">	
									<p id='totaal' class='prijsartikel'>Totaal prijs:</p>
								</div>
							</div>
						</div>
					</div>
				</form>
	
	";

    echo $element;
}