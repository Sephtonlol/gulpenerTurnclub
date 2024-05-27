<?php


	
if(isset($_POST['Submit'])) { 

// Op verzenden geklikt
	$Naam = $_POST["Naam"];
	$Email = $_POST["Email"];
	$Telefoonnummer = $_POST["Telefoonnummer"];
	$Bericht = $_POST["Bericht"];
	$toEmail = "eversrcb@gmail.com";
	$header = "From:" . $Email;
	
	
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
	<link rel="stylesheet" href="./gulpeners.css"> <!-- Link to external CSS file -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<style>
 body {
	 font-family: sans-serif;
	 font-size: 16px;
	 margin: 0;
	 background: #fff;
	 color: #000;
	 
	 display: flex;
	 align-items: center;
	 justify-content: space-around;
	 min-height: 100vh;
 
 .form-container{
	 width: 100%;
	 max-width: 650px;
	 margin:0 auto;
	 padding: 20px;
	 border-radius: 10px;
	 color: #fff;
	 background: #407094;
 }
 .input-row{
	 margin-bottom: 10px;
 }
 .input-row label{
	 display: block;
	 margin-bottom: 3px;
 } 
 .input-row input, 
 .input-row{
	 width: 95%;
	 padding: 10px;
	 border: 0;
	 border-radius: 3px;
	 outline: 0;
	 margin-bottom: 3px;
	 font-size: 18px;
	 font-family: sans-serif;
 } 
 .input-row textarea{
	 height: 100px;
	 width: 98%;
 }
 
 .input-row [type="submit"]{
	  width: 140px;
	  display: block;
	  margin: 0 auto;
	  text-align: center;
	  color: #fff;
	  cursor: pointer;
	  background:#89B5D6;
	  font-size: 20px;
	  align-items: center;
 }
 
 .succes {
	 background: #9fd2a1;
	 padding: 7px 10px;
	 text-align: center;
	 color: #326b07;
	 border-radius: 3px;
	 font-synthesis: 14px;
	 margin-top: 15px;
	 width: 100%;
 }
 

</style>
</head>
<body>
	<div class="form-container">
		<form name="emailContact" action="contact.php" method=POST>
			<div class="input-row">
				<label>Naam <em>*</em></label>
				<input type="text" name="Naam" required>
			</div>
			<div class="input-row">
				<label>Email <em>*</em></label>
				<input type="text" name="Email" required>
			</div>
			<div class="input-row">
				<label>Telefoonnummer <em>*</em></label>
				<input type="text" name="Telefoonnummer" required>
			</div>
			<div class="input-row">
				<label>Bericht <em>*</em></label>
				<textarea name="Bericht" required></textarea>
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





	
	
</body>

</html>