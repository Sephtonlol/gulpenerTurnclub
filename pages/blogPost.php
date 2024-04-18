<?php
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
    <link rel="stylesheet" href="../styling/blogPost.css">
    <script src="../scripts/deletePostConfirm.js"></script>
</head>
<body>
    <?php
echo "<div class='blogPost'>";
        $imagePath = "../assets/images/blogimages/{$blogId}.png";
        if (file_exists($imagePath)) {
            echo "<div class='imageContainer'><img src='$imagePath' alt='$title' class='blogImage'></div>";
        }
        echo "<div class='blogContent'><div><div class='blogTitle'><span>" . $title .  "</span></div>";
        echo "<div class='blogTextContainer'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
        
        echo "<div class='blogDate'> <span>" . $date . "</span>";


        if ($_SESSION['authlevel'] <= 1) {
        echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
        echo "<a onclick='check()' href=deletePost.php/?posttodelete=" . $blogId . ">Delete post</a> </div>";
        }
        else {
        echo "<div class='filler'></div>";
        }
        echo "</div></div></div>";
        ?>
</body>
</html>




