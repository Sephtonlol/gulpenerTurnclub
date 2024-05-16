<?php
error_reporting(0);
session_start();


require __DIR__ . "/partials/_dbcon.php";


$imageToEdit = $_GET["imageToEdit"] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["editedImage"]["name"])) {
    $uploadDir = "../assets/images/pageimages/pageImage_";
    $uploadFile = $uploadDir . $imageToEdit . ".png";
	
	

    if (move_uploaded_file($_FILES["editedImage"]["tmp_name"], $uploadFile)) {
        header("Location: ./index.php");
        exit();
    }
}
if ($_SESSION['authlevel'] != 0 || $_SESSION['authlevel'] == null) {
    header("location: ./index.php");
    exit;
}
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {

} else {
    header("location: ./index.php");
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
    <script src="../scripts/editPost.js"></script>
</head>
<body>

    <div class="row">
<form class="blogPost" method="post" enctype="multipart/form-data">
    <img style="max-height: 100vh; max-width:75vw;" class="blogImage" src="../assets/images/pageimages/pageImage_<?php echo htmlspecialchars($imageToEdit) . '.png'; ?>" alt="<?php echo htmlspecialchars($imageToEdit) . '.png'?>">
    <div class='blogTextContainer'>
        <input type="file" name="editedImage" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png">
        <button type="submit" name="editBlogPost">Apply Changes</button>
        <input type="hidden" name="postToEdit" value="<?php echo htmlspecialchars($imageToEdit);?>">
    </form>
    </div>
<button class="button" onclick="window.location.href='index.php'">Cancel</button>
</div>
</body>
</html>
