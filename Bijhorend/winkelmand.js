var prijs = parseFloat(document.getElementById("number").textContent);
var aantal = parseInt(document.getElementById("numberr").value);
var totaalprijs= prijs * aantal;
document.getElementById("totaal").textContent = totaalprijs;