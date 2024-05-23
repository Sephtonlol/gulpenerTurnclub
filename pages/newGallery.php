<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../styling/newGallery.css'>
    <title>GulpenerTurnclub</title>
	  <link rel="icon" type="x-icon" href="../assets/images/favicon.png">

    <link rel="stylesheet" href="../styling/gallery.css" />
    <script src="../scripts/newBlog.js"></script>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div>
        <input id="image"type="file" onchange="previewImage()" accept=".jpg, .jpeg, .png" name="image" required>
        <button type="button" onclick="window.location.reload();">Cancel</button>
        <button type="submit">Apply</button>
        </div>
        <img id="preview" class="photoImage" alt="galleryImage">
    </form>

    <?php 
    session_start();
require __DIR__ . "/partials/_dbcon.php";


if(!isset($_SESSION['loggedin']) || $_SESSION['authlevel'] > 1) {

header("location: ./index.php");
}
$query = "SELECT MAX(photo_id) as max_id from photo";
        
        $result = $mysqli->query($query);
        
        $row = $result->fetch_assoc();
        $id = $row['max_id'] + 1;
        $uploadDir = "../assets/images/galleryimages/galleryimage_";
        $uploadFile = $uploadDir . $id . ".png";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                $sql="insert into photo (photo_id) value ('$id')";
                $sqlres=mysqli_query($connect, $sql);
                if($sqlres){
                header("location: ./gallery.php");
                } else {
                echo "Upload failed.";
                }
            } else {
                echo "Upload failed.";
            }
        }
    ?>
</body>
</html>