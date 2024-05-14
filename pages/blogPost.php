<?php
error_reporting(0);
include "partials/_dbcon.php";
session_start();

if(isset($_GET['postToView'])){
$blogId = $_GET['postToView'];

$query = "SELECT * FROM blog WHERE blog_id = '$blogId'";
$result = mysqli_query($connect, $query);

}
else {
    echo "<span>Blog invalid!</span>";
    exit;
}

if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $content = $row['content'];
    $title = $row['title'];
    $date = $row["date"];

}
else {
    echo "<span>Blog invalid!</span>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/blogPost.css">
    <script src="../scripts/deletePostConfirm.js"></script>
</head>
<body>
<div class="buttonContainer" style="background-color: var(--quinary-color);">
            <div class=menu>
            <button onclick="window.location.href='index.php'" class="headerButtons">HomePage</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php#info'" class="headerButtons">Info</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#algemeen'" class="headerButtons">algemeen</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#news'" class="headerButtons">Nieuws</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#footer'" class="headerButtons">Ondersteuning</button>
            </div>
        </div>
        <div class="hiddenPhone">
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
        </div>
        <div class=menu>
            <button class="headerButtons">Nieuws</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php#news'" class="headerButtons">Recent</button><br>
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
        <form method="post">
        <?php 
    echo '<button class="headerButtons" style="margin-top: 2px" type="submit" name="logoutsub">' . ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)?"Inloggen":"Uitloggen") . '</button>'; 
    ?>
</form>
        </div>
    </div>
    <?php
echo "<div class='blogPost'>";
        $imagePath = "../assets/images/blogimages/{$blogId}.png";
        if (file_exists($imagePath)) {
            echo "<div class='imageContainer'><img src='$imagePath' alt='$title' class='blogImage'></div>";
        }
        echo "<div class='blogContent'><div><div class='blogTitle'><div>" . $title .  "</div></div>";
        echo "<div class='blogTextContainer'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
        
        echo "<div class='blogDate'> <span>" . $date . "</span>";

        if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
        if ($_SESSION['authlevel'] <= 1) {
        echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
        echo "<a onclick='check()' href=deletePost.php/?posttodelete=" . $blogId . ">Delete post</a> </div>";
        }
        else {
        echo "<div class='filler'></div>";
        }}
        echo "</div></div></div>";
        ?>
</body>
</html>




