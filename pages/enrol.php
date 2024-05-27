<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" href="../styling/style.css"> 
	<link rel="stylesheet" href="../styling/footer.css"> 
	<link rel="stylesheet" href="../styling/header.css"> 
	
	<link rel="stylesheet" href="../styling/enrol.css"> 

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<body>
	<?php 
	session_start();

	include "./partials/smallHeader.php";


	?>
	<div class="container">
<button target="_blank" onclick="window.location.href='../assets/inschrijfformulier.pdf'" class="button">Inschrijven
	 <!-- <a href="inschrijf.html" target="_blank">Inschrijven</a> --> 
	</button>
	<div class="text">
<p>Hieronder vindt u het inschrijfformulier voor onze turnclub. Als u het formulier wilt downloaden of uitprinten, klik dan op de knop met de tekst 'inschrijven'. We verwelkomen u graag bij onze turnclub en kijken ernaar uit om samen met u aan de slag te gaan!
Als u klaar bent om lid te worden en wilt inschrijven, volgt hier het proces voor het indienen van uw inschrijfformulier:</p>

<b>1. Download of print het formulier:</b> <p>Klik op de knop 'inschrijven' om het inschrijfformulier te openen. U kunt het formulier vervolgens downloaden naar uw computer of direct afdrukken.</p>

<b>2.  Vul het formulier in:</b> <p>Zorg ervoor dat u alle vereiste informatie invult op het inschrijfformulier. Dit helpt ons om u beter van dienst te zijn en u te voorzien van de juiste trainingsmogelijkheden.</p>

<b>3.  Onderteken het formulier:</b> <p>Voordat u het formulier indient, dient u uw handtekening te plaatsen op de aangewezen plek. Dit is een vereiste stap om uw inschrijving te voltooien.</p>

<b>4. Scan het ondertekende formulier in:</b> <p>Nadat u het formulier heeft ingevuld en ondertekend, kunt u het scannen met een scanner of een app op uw telefoon die documenten kan scannen.</p>

<b>5. Mail het ingevulde formulier:</b> <p>Stuur het gescande inschrijfformulier naar ons via e-mail naar [vul hier het mailadres van de turnclub in. Zorg ervoor dat het onderwerp van de e-mail duidelijk aangeeft dat het gaat om een inschrijving voor de turnclub.</p>

<p>Zodra wij uw ingevulde inschrijfformulier hebben ontvangen, zullen wij uw aanmelding verwerken en u verder informeren over de volgende stappen. Mocht u nog vragen hebben of assistentie nodig hebben bij het invullen van het formulier, aarzel dan niet om contact met ons op te nemen. We staan klaar om u te helpen en kijken ernaar uit om u te verwelkomen bij onze turnclub!.</p>
	</div>

<img src="../assets/images/pageimages/inschrijfFormulier.png" alt="inschrijfFormulier" class="responsive">


</div>
</body>
</html>