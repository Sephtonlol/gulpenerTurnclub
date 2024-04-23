<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<link rel="stylesheet" href="../styling/style.css"> <!-- Link to external CSS file -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<script src='Turn.js' defer></script>
</head>
<body>  

<div class="hero-image">
    <div class="hero-text">
        <h1 style="font-size:50px">Gulpener</h1>
        <h1 style="font-size:50px">Turnclub</h1>
        <p>Landsraderweg 5, 6271 NT Gulpen</p>



    </div> 
    <div class="topnav" id="myTopnav2">
            <a href="#home" class="active">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <div class="dropdown">
                <button class="dropbtn">Dropdown
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <a href="#about">About</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            <div class="container">
    </div>
</div>

<div class="logo">
<img src="../styling/images/turnclub-logo.png" class="logo"alt="logo">
</div> 
</div>


<div class="Log-in-icon-text">
<h2>Inloggen</h2>
</div>  

<div class="inleiding-content">
<div class="inleiding-foto-container1">
    <div class="inleiding-foto">
    <img src="../styling/images/inleiding.jpg" class="logo"alt="logo">
    </div> 
</div>

<div class="inleiding-text-container1">
    <div class="inleiding-text">
    <p>
    Welkom bij de Gulpener Turnclub (GTC)! Ontdek de opwinding van<br>
    gymnastiek en turnen in onze gemeenschap van passie en prestatie.<br>
    Of je nu een beginner of een ervaren turner bent, bij GTC vind je een<br>
    thuis om je potentieel te ontdekken en te ontwikkelen.<br>
    </p>
    </div> 
</div>
</div>

<div class="banner-foto-container2">
    <div class="banner-foto">
    <img src="../styling/images/banner.jpeg" class="banner"alt="banner">
    </div> 
</div>

<div class="samenvatting-text-container1">
    <div class="samenvatting-text">
    <h1> Gezond bewegen voor ouderen bij de Gulpener Turnclub</h1>

    <div class="ouderen-foto-container">
    <div class="ouderen-foto">
    <img src="../styling/images/ouderen.png" class="ouderen"alt="ouderen">
    </div> 
    </div>
    
    <div class="samenvatting-text-1">
    <p>Bij de Gulpener Turnclub worden al een aantal jaren op dinsdagavond van 19.30 – 20.30 uur in Sporthal het Gulpdal bewegingslessen speciaal voor ouderen (v.a. 55 jaar) gegeven.
        <br>
        De contributie voor deze lessen is € 15,00 per maand.
        <br>
        De manier waarop de lessen door onze deskundige trainer Pierre de Bie worden gegeven, wordt door de leden als zeer prettig ervaren. Niet alleen wordt er tijdens de les samen met de groep op een gezonde en verantwoorde manier gesport, ook het gezellig samenzijn ná de les wordt – voor wie dat wil - erg op prijs gesteld.
    </p>
    </div>


    <div class="samenvatting-text-2">
    <p>
    Niet alleen wordt er tijdens de les samen met de groep op een gezonde en verantwoorde manier gesport, ook het gezellig samenzijn ná de les wordt – voor wie dat wil - erg op prijs gesteld.
    De leden organiseren ook regelmatig buiten de lessen om zélf leuke activiteiten.
    <br>
    Bent u nieuwsgierig geworden, kom dan een keer kijken of een proefles bijwonen! Voor vragen kunt u altijd een mailtje sturen naar gtcgulpen@gmail.com.
    </p>
    </div> 
</div>















<div class="container">
    <div class="column footer">
        <h1>Volg ons</h1>
        <img src="instagram_2111463.png" <a="https://www.instagram.com/gulpenerturnclub/" height=30></a> <img src="facebook_5968764.png" height=30> <img src="twitter_5968830.png" height=30>
    </div>
</div>


</body>
</html>





























<!-- php -->
<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}

echo "Welkom " . $_SESSION['sendusername'];

if ($_SESSION['authlevel'] <= 1) {
    echo '<form method="post" class="banner">
            <button type="submit" name="editPage">Edit Page</button>
        </form>';

    echo '<form method="post" class="banner">
            <button type="submit" name="newBlog">nieuw blogpost</button>
        </form>';
}


if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}

if (isset($_POST['editPage'])) {
    header("location: editPage.php");
    exit;
}
if (isset($_POST['newBlog'])) {
    header("location: newBlog.php");
    exit;
}

?>

<!-- nog meer php -->

 <form method="POST" action="index.php">
    <button type="submit" name="logoutsub">Log out</button> <br>

    <form>
        <span>Blog</span> <br>

    <?php

    require __DIR__ . "\partials\_dbcon.php";

    $query = "Select * from blog";
        
    $result = $mysqli->query($query);
        
    while ($row = $result->fetch_assoc()) {
        echo $row["title"] . "<br>";
        echo $row["content"] . "<br>";
    }
    ?>
    </form>
</form>

</body>
</html>