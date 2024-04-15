
<link rel="stylesheet" href="../styling/blog.css">
<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}

echo '<button type="submit" name="logoutsub">Log out</button> <br>';

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


<span>Blog</span> <br>
<div class='Blog'>

        <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM blog
order by blog_id desc";

$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $blogId = $row["blog_id"];
    $title = $row["title"];
    $content = $row["content"];
    
    echo "<div class='blogPost'>";
    $imagePath = "../assets/images/blogimages/{$blogId}.png";
    if (file_exists($imagePath)) {
        echo "<img src='$imagePath' alt='$title' class='blogImage' ><br>";
    }
    echo "<span>" . $title .  "</span>" . "<br>";
    echo "<div class='blogText'><span>" . $content .  "</span>" . "</div><br>";

    if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editPost.php?posttoedit=" . $blogId . ">Edit post $blogId </a><br>";
    echo "<a href=deletePost.php/?posttodelete=" . $blogId . ">Delete post $blogId</a><br>";
    }
    echo "</div>";

}

        ?>
        </div>