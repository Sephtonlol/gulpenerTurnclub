<?php
error_reporting(0);
session_start();

if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/header.css">

    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/blog.css">
    <link rel="stylesheet" href="../styling/footer.css">


    <script src="../scripts/deletePostConfirm.js"></script>
</head>
<body>
<span class="smallHeader">Laatste nieuws</span>
<div class="buttonContainer" style="background-color: var(--quinary-color); padding-bottom:20px;">
            <div  class="menu">
            <button onclick="window.location.href='index.php'" class="headerButtons">HomePage</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php#info'" class="headerButtons">Info</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#algemeen'" class="headerButtons">algemeen</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#news'" class="headerButtons">Nieuws</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#footer'" class="headerButtons">Ondersteuning</button>
            </div>
        </div>
        <div class="menu">
            <button class="headerButtons">Vereniging</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <div class="menu">
            <button class="headerButtons">Groepen</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button><br>
            <button id="dropdownMenu" class="headerButtons">Option3</button><br>
            <button id="dropdownMenu" class="headerButtons">Option4</button>
            </div>
        </div>
        <div class="menu">
            <button class="headerButtons">Geschiedenis</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <div class="menu">
            <button class="headerButtons">Foto's</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button><br>
            <button id="dropdownMenu" class="headerButtons">Option3</button>
            </div>
        </div>
        <div class="menu">
            <button onclick="window.location.href='#news'" class="headerButtons">Nieuws</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php#news'" class="headerButtons">Recent</button><br>
            <button id="dropdownMenu" onclick="window.location.href='blog.php'" class="headerButtons">Alle nieuws</button>
            </div>
        </div>
        <div class="menu">
            <button class="headerButtons">Contact</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <form method="post">
    <?php 
    echo '<button class="headerButtons" style="margin-top: 2px" type="submit" name="logoutsub">' . ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)?"Inloggen":"Uitloggen") . '</button>'; 
    ?>
</form>
        </div>
    </div>


<div class='blogGrid'>

        <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM blog
order by blog_id desc";

$result = $mysqli->query($query);
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {

if ($_SESSION['authlevel'] <= 1) {
    echo "<a href='newBlog.php';' style='justify-content: center;' class='blogSpecial'>
            <div class='specialTextContainer'>
                <span class='addPost'>Post Toevoegen</span>
                </div>
    </a>";
        
}}


while ($row = $result->fetch_assoc()) {
    $blogId = $row["blog_id"];
    $title = $row["title"];
    $content = $row["content"];
    $date = $row["date"];
    
    echo "<div class='blogPost'>";
    $imagePath = "../assets/images/blogimages/{$blogId}.png";
    if (file_exists($imagePath)) {
        echo "<div><img src='$imagePath' alt='$title' class='blogImage' ><br>";
    }
    echo "<div class='blogTitle'><span>" . $title .  "</span></div>";
    echo "<div class='blogTextContainer'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
    
    echo "<div class='blogDate'> <span>" . $date . "</span><br>";
    echo "<a class='readPostRedirect' href='blogPost.php?postToView=" . $blogId . "'><div class='readPostContainer'><div class='readPost'>Lees meer</div></div></a>";

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] <= 1) {
    echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
    echo "<a onclick='check()' href=deletePost.php/?posttodelete=" . $blogId . ">Delete post</a> </div>";
}
}
echo "<div class='filler'></div></div></div>";

}

        ?>
        </div>
        <footer>

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
        </body>
</html>