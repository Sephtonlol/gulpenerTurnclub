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
    <link rel="stylesheet" href="../styling/footer.css">
    <link rel="stylesheet" href="../styling/blog.css">
    

    <script src="../scripts/header.js" defer></script>
    <script src="../scripts/deletePostConfirm.js"> defer</script>
</head>
<body>
<?php require __DIR__ . "/partials/smallHeader.php"; ?>
<div>
<div class='blogGrid'>

        <?php

require __DIR__ . "/partials/_dbcon.php";


if(isset($_SESSION['loggedin'])) {
    
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href='newBlog.php';' style='justify-content: center;' class='blogSpecial'>
        <div class='specialTextContainer'>
        <span class='addPost'>Post Toevoegen</span>
        </div>
        </a>";
        
    }}
$query = "SELECT * FROM blog 
order by blog_id desc";
    $result = $mysqli->query($query);

$pageNumber = 1;
if (isset($_GET["page"]) && $_GET["page"] > 0){
    $pageNumber = $_GET["page"];
}

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $highestBlogId = $row["blog_id"];
}

$amountPerPage = 12;
if ($_SESSION["authlevel"] < 1){
    $amountPerPage -= 1;
}
// $nowPrinting = (($amountPerPage / $pageNumber) - $amountPerPage) + $highestBlogId;
$nowPrinting = ($amountPerPage - ($amountPerPage * $pageNumber)) + $highestBlogId;
$totalPages = $highestBlogId / $amountPerPage;
$totalPages = ceil($totalPages);
if ($_GET["page"] > $totalPages){
    header("location: ./blog.php");
}
// echo $highestBlogId . "<br>";
// echo $pageNumber . "<br>";
// echo $nowPrinting;

while ($nowPrinting > 0) {
        $query = "SELECT * FROM blog WHERE blog_id = '$nowPrinting'";
        
        $result = mysqli_query($connect, $query);
        $row = $result->fetch_assoc();
        $blogId = $row["blog_id"];
        $title = $row["title"];
        $content = $row["content"];
        $date = $row["date"];
        $nowPrinting--;
            if ($amountPerPage > 0){
                $amountPerPage--;

    
    echo "<div class='blogPost'>";
    $imagePath = "../assets/images/blogimages/blogimage_$blogId.png";
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

}


        ?>
        </div>
        <div class="prevNext" style="flex-direction: row;">
            <?php
            for ($i = ($pageNumber - 2); $i <= $totalPages; $i++){
                if ($i > 0 && $i < ($pageNumber + 3) && $totalPages > 1){
                    echo "<button onclick='window.location.href=\"./blog.php?page=" . $i . "\"'>" . $i . "</button>";

                }
            }
            

            ?>
        </div>
</div>
        <?php require __DIR__ . "/partials/footer.php"; ?>
        </body>
</html>