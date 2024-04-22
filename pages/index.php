<?php
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

    require __DIR__ . "/partials/_dbcon.php";

    $query = "SELECT * FROM blog
    order by blog_id desc";

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