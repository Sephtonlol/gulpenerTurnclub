<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}

echo "Welkom " . $_SESSION['sendusername'];

if ($_SESSION['authlevel'] <= 1) {
    echo '<form method="post">
            <button type="submit" name="editPage">Edit Page</button>
        </form>';

    echo '<form method="post">
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>
<body>

<!--Logo-->
<div id="Logo">
<img src="images/turnclub-logo.png" alt="Logo">
</div>

<!-- Log in icon -->
<div class="rectangle"></div>
<h2 class="text-rectangle">Inloggen</h2>


<!-- Begin pagina Text -->
<div id="text">
    <h1>Gulpener<br>Turnclub</h1>
    <p>Landsraderweg 5, 6271 NT Gulpen</p>
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

<!-- ?? -->
    <form method="POST" action="index.php">
        <button type="submit" name="logoutsub">Log out</button> <br>

        <form>
            <span>Blog</span> <br>

        <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM blog";

$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $blogId = $row["blog_id"];
    $title = $row["title"];
    $content = $row["content"];
    
    echo $title . "<br>";
    echo $content . "<br>";

    // Find the image file
    $imagePath = "../assets/images/blogimages/{$blogId}.png"; // Assuming the image extension is jpg
    if (file_exists($imagePath)) {
        echo "<img src=\"$imagePath\" alt=\"$title\"><br>";
    }
}

        ?>
        </form>
    </form>
</body>
</html>
