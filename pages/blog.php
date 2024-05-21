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
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/blog.css">
    <link rel="stylesheet" href="../styling/footer.css">
    

    <script src="../scripts/header.js" defer></script>
    <script src="../scripts/deletePostConfirm.js"> defer</script>
</head>
<body>
<?php require __DIR__ . "/partials/smallHeader.php"; ?>
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
        <?php require __DIR__ . "/partials/footer.php"; ?>
        </body>
</html>