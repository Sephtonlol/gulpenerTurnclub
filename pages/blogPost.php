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
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/blogPost.css">
	
	
	    <script src="../scripts/header.js" defer></script>
    <script src="../scripts/deletePostConfirm.js" defer></script>
</head>
<body style="display: flex; flex-direction: column;">
<?php require __DIR__ . "/partials/smallHeader.php"; ?>


    <?php
echo "<div class='blogPost' style='max-height: 700vh; '> ";
        $imagePath = "../assets/images/blogimages/blogimage_{$blogId}.png";
        if (file_exists($imagePath)) {
            echo "<div onclick=\"window.location.href='image.php?blogimage=" . $blogId . "'\" class='imageContainer' style='flex-shrink: 0.1;'><img src='$imagePath' alt='$title' class='blogImage'></div>";

        }
        echo "<div class='blogContent' style='height: 100%; margin-bottom: 20px; overflow: hidden;'><div><div class='blogTitle'><div>" . $title .  "</div></div>";
        echo "<div class='blogTextContainer' style='padding: 10px;'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
        
        echo "<div class='blogDate'> <span>" . $date . "</span>";

        if(isset($_SESSION['loggedin'])) {
        if ($_SESSION['authlevel'] <= 1) {
        echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
        echo "<a onclick='check()' href=deletePost.php?posttodelete=" . $blogId . ">Delete post</a> </div>";
        }
        else {
        echo "<div class='filler'></div>";
        }}
        echo "</div></div></div>";
        ?>
        <?php require __DIR__ . "/partials/footer.php"; ?>
</body>
</html>




