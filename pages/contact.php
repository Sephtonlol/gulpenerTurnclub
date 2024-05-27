<?php
session_start();

error_reporting(0);
	
if(isset($_POST['Submit'])) { 

if (!isset($_SESSION["loggedin"])){
	$Naam = $_POST["Naam"];
	$Email = $_POST["Email"];
}
	$Telefoonnummer = $_POST["Telefoonnummer"];
	$Bericht = $_POST["Bericht"];
	$toEmail = "Gtcgulpen@gmail.com";
	$header = "From: noreply@gulpenerturnclub.nl";
	
	
	$mailbericht = "Naam: "  . $Naam . "\r\n Email: " . $Email . "\r\n Telefoonnummer: " . $Telefoonnummer . "\r\n Bericht: " . $Bericht . "\r\n";

	if(mail ($toEmail, "Webformulier", $mailbericht, $header)){
		$message = "Jouw Informatie is verstuurd.";
	}else {
		$message = "<p style='color: red;'>Jouw Informatie is niet verstuurd.</p>";
	}
	


} 



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" href="../styling/footer.css"> 
	<link rel="stylesheet" href="../styling/header.css"> 
	<link rel="stylesheet" href="../styling/style.css"> 
	<link rel="stylesheet" href="../styling/contact.css"> 

    <script src="../scripts/header.js" defer></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
	<?php 
	include "./partials/smallHeader.php";
	?>
	<div class="mainContainer">
<div class="form-container">
<div class="text">
<h5> Contact ons</h5>
</div>
<div class="row">

<form name="emailContact" action="contact.php" method=POST>
	<?php
if (!isset($_SESSION["loggedin"])){

			echo '<div class="input-row">
				<label>Naam en achternaam <em>*</em></label>
				<input type="text" name="Naam" required>
			</div>
			<div class="input-row">
				<label>Email <em>*</em></label>
				<input type="text" name="Email" required>
			</div>';
}
			?>
			<div class="input-row">
				<label>Telefoonnummer <em>*</em></label>
				<input type="text" name="Telefoonnummer" required>
			</div>
			<div class="input-row" >
				<label>Bericht <em>*</em></label>
				<textarea <?php if (isset($_SESSION["loggedin"])){
echo 'style="height: 370px;"';
				 } ?>name="Bericht" required></textarea>
			</div>
			<div class="input-row">
				<input type="submit" name="Submit" value="Versturen">	   
			</div>
</form>


		<?php 
		if(!empty( $_POST['Bericht'])) { 
		
		echo"<div class='succes'>
					<strong>$message</strong>
				</div>";
		}
		?>
		


</div>
</div>
</form>
<div class="block">

<div class="image">
	<a target="_blank" href="https://www.google.com/maps/@50.8100473,5.8903285,440m/data=!3m1!1e3?entry=ttu">
	<img src="../assets/images/pageimages/pageImage_9.png" alt="Maps.Gulpener">
	</a>
</div>
<div class="informatie">
<?php 
require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
	
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];	


if ($textfieldId >= 19 && $textfieldId <= 28){
	echo "<p>" . $textContent . "</p>";
	if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
		if ($_SESSION['authlevel'] <= 1) {
			echo "<a href=edittextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
			}
		}
}
	
}

?>
</div>
</div>
</div>
<?php
include "./partials/footer.php";
?>
</body>
</html>