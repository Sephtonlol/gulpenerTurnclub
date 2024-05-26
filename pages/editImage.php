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
if(!isset($_SESSION['loggedin'])) {
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
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/blogPost.css">
    <script src="../scripts/editPost.js"></script>
</head>
<body>

    <div>
<form class="blogPost" method="post" enctype="multipart/form-data">
    <div style="display: flex; flex-direction: column;" class='blogTextContainer'>
    <img style="border-radius: 0px; max-height: 85vh; max-width:100vw;" class="blogImage" src="../assets/images/pageimages/pageImage_<?php echo htmlspecialchars($imageToEdit) . '.png'; ?>" alt="<?php echo htmlspecialchars($imageToEdit) . '.png'?>">
        <input type="file" name="editedImage" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png" required>
        <div class="prevNext">
        <button type="submit" name="editBlogPost">Apply Changes</button>
        <input type="hidden" name="postToEdit" value="<?php echo htmlspecialchars($imageToEdit);?>">
        <button class="button" onclick="window.location.href='./index.php'">Cancel</button>
        </div>
    </div>
    </form>
</div>
</body>
</html>
