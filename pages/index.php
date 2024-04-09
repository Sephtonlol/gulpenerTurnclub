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
</head>
<body>
    <form method="POST" action="index.php">
        <button type="submit" name="logoutsub">Log out</button> <br>


        <?php
        require __DIR__ . "/partials/_dbcon.php";

        $query = "SELECT * FROM textfields";

        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
        $textfieldId = $row["textfield_id"];
        $textContent = $row["textContent"];
        }

        echo $textContent . "<br>";
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a><br>";
            }
        ?>

        <form>
            <span>Blog</span> <br>

        <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM blog
order by blog_id desc";

$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $blogId = $row["blog_id"];
    $title = $row["title"];
    $content = $row["content"];
    
    echo $title . "<br>";
    echo $content . "<br>";

    $imagePath = "../assets/images/blogimages/{$blogId}.png";
    if (file_exists($imagePath)) {
        echo "<img src=\"$imagePath\" alt=\"$title\"><br>";
    }
    if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editPost.php?posttoedit=" . $blogId . ">Edit $blogId </a><br>";
    echo "<a href=deletePost.php/?posttodelete=" . $blogId . ">Delete $blogId</a><br>";
    }

}

        ?>
        </form>
    </form>
</body>
</html>
