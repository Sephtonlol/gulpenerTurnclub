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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/algemeen.css">
    <link rel="stylesheet" href="../styling/preface.css">
    <link rel="stylesheet" href="../styling/longImage.css">
    <link rel="stylesheet" href="../styling/blog.css">
    <link rel="stylesheet" href="../styling/lesInformatie.css">
    <link rel="stylesheet" href="../styling/footer.css">


    <script src="../scripts/deletePostConfirm.js"></script>
</head>
<body>
    <div class="container">
    <div class="header">
        <div class="upperHeader">
            <div class="column">
            <img src="../assets/images/pageimages/pageImage_3.png" alt="logo" class="simpleImage">
            <?php
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
                if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editImage.php?imageToEdit=3>Edit Image</a><br>";
            }
        }
            ?>
            </div>
            <div class="line"></div>
                
            <div class="simpleImage">
            <?php
            
            echo '<form  method="post">
                <button class="button" type="submit" name="logoutsub">'.((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)?"Inloggen":"Uitloggen").'</button>
                </form>';
                if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editImage.php?imageToEdit=1>Edit Image</a><br>";
            }
        }
            
            ?>
            </div>
        </div>
        <span class="headerTitle">GULPENER TURNCLUB</span>
        <span class="headerText">Landsraderweg 5, 6271 NT Gulpen</span>
        <div class="buttonContainer">
            <div class=menu>
            <button onclick="window.location.href='index.php'" class="headerButtons">HomePage</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='#info'" class="headerButtons">Info</button><br>
            <button id="dropdownMenu" onclick="window.location.href='#algemeen'" class="headerButtons">algemeen</button><br>
            <button id="dropdownMenu" onclick="window.location.href='#news'" class="headerButtons">Nieuws</button><br>
            <button id="dropdownMenu" onclick="window.location.href='#footer'" class="headerButtons">Ondersteuning</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Vereniging</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Groepen</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button><br>
            <button id="dropdownMenu" class="headerButtons">Option3</button><br>
            <button id="dropdownMenu" class="headerButtons">Option4</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Geschiedenis</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Foto's</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button><br>
            <button id="dropdownMenu" class="headerButtons">Option3</button>
            </div>
        </div>
        <div class=menu>
            <button onclick="window.location.href='#news'" class="headerButtons">Nieuws</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='#news'" class="headerButtons">Recent</button><br>
            <button id="dropdownMenu" onclick="window.location.href='blog.php'" class="headerButtons">Alle nieuws</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Contact</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
            </div>
        </div>
    </div>
    <div class="preface">
<?php
echo "<div class='column'><img class='images' src=../assets/images/pageImages/pageImage_2.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=2>Edit Image</a>";
}
}
echo "</div>";

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];
if ($textfieldId == 1){
    echo "<div class='column'><span class='text'>" . $textContent . "</span>";
    }
}
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=1>Edit textfield</a>";
        }
    }
?>
    </div></div>

<?php
echo "<div class='column'><img class='longImage' src=../assets/images/pageImages/pageImage_5.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=5>Edit Image</a></div>";
}
}
echo "</div></div>";

?>
<span  id="info"class="smallHeader">Informatie</span>

<div class="theContainer">
<div class="lesInformatieContainer">
<?php
echo "<div class='lesInformatie'>";

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 2){
echo "<span class='lesInformatieTitle'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 3){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 4){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 5){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }}
}
}
echo "<div class='informatieLine'></div>";
echo "<img class='informatieImage' src='../assets/images/pageImages/pageImage_6.png' alt='pageImage_6'>";  
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    
    echo "<a href=editImage.php?imageToEdit=6>Edit Image</a>";
}
}
echo "</div></div>";
echo "<div class='lesInformatieContainer'>";

echo "<img class='informatieImage' src=../assets/images/pageImages/pageImage_7.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=7>Edit Image</a>";
}
}
require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 6){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
}
    }
}
if ($textfieldId == 7){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
}
    }
}
}
echo "<div class='informatieLine'></div>";
echo "</div></div></div>";


?>

<span  id="algemeen"class="smallHeader">Algemeen</span>
<div class="containerAlgemeen">
    <div class="innerContainerAlgemeen">
    <div class="bulletPoints">
        <?php
        require __DIR__ . "/partials/_dbcon.php";

        $query = "SELECT * FROM textfields";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
        $textfieldId = $row["textfield_id"];
        $textContent = $row["textContent"];
        
        if ($textfieldId == 10){
        echo "<span class='bulletPointsTitle'>" . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }
            }
        }
        if ($textfieldId == 11){
            echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }
                }
            }
        if ($textfieldId == 12){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
        }
        if ($textfieldId == 13){
            echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }
                }
        }
    }
        
        ?>

    </div>
    <div class="bulletPoints">
        <?php
    require __DIR__ . "/partials/_dbcon.php";

    $query = "SELECT * FROM textfields";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
    $textfieldId = $row["textfield_id"];
    $textContent = $row["textContent"];
    
    if ($textfieldId == 14){
    echo "<span class='bulletPointsTitle'>" . $textContent . "</span>";
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }}
    }
    if ($textfieldId == 15){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
        }
    if ($textfieldId == 16){
    echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }}
    }
    if ($textfieldId == 17){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
    }
    if ($textfieldId == 18){
        echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
            }}
        }
        if ($textfieldId == 19){
            echo "<span class='bulletPointsText'>• " . $textContent . "</span>";
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
                }
        }}
}
        ?>
    </div>

    

</div>

<div class="informatieLine" style="margin-bottom:30px;"></div>
<?php
echo "<div class='column'><img class='longImage' src=../assets/images/pageImages/pageImage_8.png >";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=8>Edit Image</a></div>";
}}
?>

</div>

        <form method="POST" action="index.php">

    <span  id="news" onclick="window.location.href='blog.php';" class="smallHeader">Laatste nieuws</span>
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
        $imagePath = "../assets/images/blogimages/blogimage_$blogId.png";
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
        }
        echo "<div class='filler'></div></div></div>";

    

            ?>
            <div onclick="window.location.href='blog.php';" style="justify-content: center;" class="blogSpecial">
            <div class="specialTextContainer">
                <span class="blogTitle">Alles Zien</span>
                </div>
            </div>
            </div>
        </form>

        <footer>
            <div class="columnFooter">
                <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 8){
echo "<span class='footerTitle'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
if ($textfieldId == 9){
echo "<span class='footerText'>" . $textContent . "</span>";
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
}
                ?>
                </div>
                <div id="footer" class="footerContainer">
                    <div class="footer">
                    <div class="footerLine"></div>
                    <div class="footerIcons">
                        <span>volg ons</span>
                        <a href="https://www.facebook.com/gulpenerturnclub/"><img class="icons" src="../assets/images/icons/facebook.png" alt="facebook"></a>
                        <a href="https://www.instagram.com/gulpenerturnclub/"><img class="icons" src="../assets/images/icons/instagram.png" alt="instagram"></a>

                    </div>
                    </div>
                </div>
                
        </footer>
    </div>
</body>
</html>