<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>
<body>

<!-- Log in icon -->
<div class="rectangle-container">
<div class="rectangle">
<h2 class="text-rectangle">Inloggen</h2>
</div>
</div>

<!--Logo-->
<div id="Logo">
<img src="../styling/images/turnclub-logo.png" alt="Logo">
</div> 


<!-- Begin pagina Text -->
<div class="containerbegintext">
  <div class="line"></div>
  <div id="texthome">
    <h1>Gulpener<br>Turnclub</h1>
    <p>Landsraderweg 5, 6271 NT Gulpen</p>
  </div>
</div>

<!-- Navigatie Balk-->
<div id="navigatie-container">
    <ul>
        <li><a href=”index.php”>Homepage</a></li>
        <li><a href=”#”>Vereniging</a></li>
        <li><a href=”#”>Groepen</a></li>
        <li><a href=”#”>Historie</a></li>
        <li><a href=”#”>Foto's</a></li>
        <li><a href=”#”>Nieuws</a></li>
        <li><a href=”#”>Contact</a></li> 
    </ul>  
</div>

<!-- Inleiding image -->
<div id=inleidingstuk>

    <div id="inleidingfoto">
    <img src="../styling/images/inleiding.jpg" alt="inleidingfoto">
    </div>

<!-- Inleding text -->
    <div id="inleiding">
    <p>
    Welkom bij de Gulpener Turnclub (GTC)! Ontdek de opwinding van<br>
    gymnastiek en turnen in onze gemeenschap van passie en prestatie.<br>
    Of je nu een beginner of een ervaren turner bent, bij GTC vind je een<br> 
    thuis om je potentieel te ontdekken en te ontwikkelen.<br>
    </p>
    </div>

</div>

<!-- banner na de inleiding -->
<div id="banner">
    <img src="../styling/images/banner.jpeg" alt="banner">
</div>

<!-- samenvatting title -->
<div id="samenvatting">
<h1>
    Gezond bewegen voor ouderen bij de <br>
    Gulpener Turnclub
</h1>
</div>

<div id="samenvatting1">
    <p>
    Bij de Gulpener Turnclub worden al een aantal jaren op
    dinsdagavond van 19.30 – 20.30 uur in Sporthal het
    Gulpdal bewegingslessen speciaal voor ouderen (v.a. 55
    jaar) gegeven.<br>
    <br>
    De contributie voor deze lessen is € 15,00 per maand.<br>
    <br>
    De manier waarop de lessen door onze deskundige
    trainer Pierre de Bie worden gegeven, wordt door de
    leden als zeer prettig ervaren. Niet alleen wordt er
    tijdens de les samen met de groep op een gezonde en
    verantwoorde manier gesport, ook het gezellig
    samenzijn ná de les wordt – voor wie dat wil - erg op
    prijs gesteld.<br>
</p>
</div>

<!-- samenvatting foto-->
<div id="ouderen">
    <img src="../styling/images/ouderen.png" alt="banner">
</div>

<div id="samenvatting2">
    <p>
    Niet alleen wordt er tijdens de les samen met<br>
    de groep op een gezonde en verantwoorde<br>
    manier gesport, ook het gezellig samenzijn ná<br>
    de les wordt – voor wie dat wil - erg op prijs<br>
    gesteld.<br>
    De leden organiseren ook regelmatig buiten<br>
    de lessen om zélf leuke activiteiten.<br>
    <br>
    Bent u nieuwsgierig geworden, kom dan een<br>
    keer kijken of een proefles bijwonen! Voor<br>
    vragen kunt u altijd een mailtje sturen naar<br>
    gtcgulpen@gmail.com.<br>

   
























<!-- php -->
<?php
error_reporting(0);
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}

echo '<form method="post">
        <button type="submit" name="logoutsub">Log out</button>
    </form>';

if ($_SESSION['authlevel'] <= 1) {
    echo '<form method="post">
            <button type="submit" name="editPage">Edit Page</button>
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

require __DIR__ . "/partials/_dbcon.php";

            $query = "SELECT * FROM textfields";

            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
            $textfieldId = $row["textfield_id"];
            $textContent = $row["textContent"];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/blog.css">
    <script src="../scripts/deletePostConfirm.js"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="index.php">


            <?php
            require __DIR__ . "/partials/_dbcon.php";

            $query = "SELECT * FROM textfields";

            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
            $textfieldId = $row["textfield_id"];
            $textContent = $row["textContent"];
            }
            if ($textfieldId == 1){
            echo $textContent . "<br>";
            }
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a><br>";
                }
            ?>
    <span onclick="window.location.href='blog.php';" class="headerBlog">Laatste nieuws</span>
            <div class='blogIndex'>
                

    <?php

    require __DIR__ . "\partials\_dbcon.php";

    $query = "Select * from blog";
        
    $result = $mysqli->query($query);


    $count = 0;
    while (($row = $result->fetch_assoc()) && $count < 3) {
        $count++;
        $blogId = $row["blog_id"];
        $title = $row["title"];
        $content = $row["content"];
        $date = $row["date"];
        
        echo "<div class='blogPost'>";
        $imagePath = "../assets/images/blogimages/$blogId.png";
        if (file_exists($imagePath)) {
            echo "<div><img src='$imagePath' alt='$title' class='blogImage' ><br>";
        }
        echo "<div class='blogTitle'><span>" . $title .  "</span></div>";
        echo "<div class='blogTextContainer'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
        
        echo "<div class='blogDate'> <span>" . $date . "</span><br>";
        echo "<a class='readPostRedirect' href='blogPost.php?postToView=" . $blogId . "'><div class='readPostContainer'><div class='readPost'>Lees meer</div></div></a>";


        if ($_SESSION['authlevel'] <= 1) {
        echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
        echo "<a onclick='check()' href=deletePost.php/?posttodelete=" . $blogId . ">Delete post</a> </div>";
        }
        else {
        echo "<div class='filler'></div>";
        }
        echo "</div></div>";

    }

            ?>
            <div onclick="window.location.href='blog.php';" style="justify-content: center;" class="blogSpecial">
            <div class="specialTextContainer">
                <span class="blogTitle">alles zien</span>
                </div>
            </div>
            </div>
        </form>
    </div>
</body>
</html>