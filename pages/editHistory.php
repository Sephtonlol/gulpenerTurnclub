<?php

include "partials/_dbcon.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['authlevel'] > 1) {

header("location: ./index.php");

}
error_reporting(0);

$historyToEdit = $_GET['historyToEdit'];
 
$query = "SELECT * FROM history WHERE history_id = '$historyToEdit'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $content = $row['content'];
    $title = $row['title'];
    $date = $row['date'];
} else {
    $content = "History not found";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $date = $_POST["date"];

    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $content = filter_var($content, FILTER_SANITIZE_STRING);
    $date = filter_var($date, FILTER_SANITIZE_STRING);
    $sql = "UPDATE history SET title = '$title', content = '$content', date = '$date' WHERE history_id = '$historyToEdit'";
    $sqlres = mysqli_query($connect, $sql);

  $uploadDir = "../assets/images/historyimages/historyimage_";
  $uploadFile1 = "{$uploadDir}{$historyToEdit}_1.png";
  $uploadFile2 = "{$uploadDir}{$historyToEdit}_2.png";
  $uploadFile3 = "{$uploadDir}{$historyToEdit}_3.png";
  


move_uploaded_file($_FILES["image1"]["tmp_name"], $uploadFile1);


move_uploaded_file($_FILES["image2"]["tmp_name"], $uploadFile2);


move_uploaded_file($_FILES["image3"]["tmp_name"], $uploadFile3);


    header("Location: ./history.php");    
    exit; 


} else {
    header("Location: ./history.php");    
exit;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	

  <script src="../scripts/newHistory.js" defer></script>

    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/history.css">

</head>
<body>

<div class="timeline" style=" width: 80%;">
<form class="timeline-item" style="margin-top: 50px;" method='post' enctype="multipart/form-data">
            <input placeholder="Datum" name="date" value="<?php echo "$date"; ?>" required maxlength="4" style="width:40px" class="timeline-year"></input>
            <div class="timeline-content">
                <input name="title" value="<?php echo "$title"; ?>" type="text" maxlength="50" placeholder="Titel" required></input>
                <textarea style="flex-grow: 1;"name="content" rows="10" max-cols="50" placeholder="Gebeurtenis" required><?php echo "$content"; ?></textarea>
            </div>
            <div class="timeline-images">
                <?php
                $img1 = "../assets/images/historyimages/historyimage_{$historyToEdit}_1.png";
                $img2 = "../assets/images/historyimages/historyimage_{$historyToEdit}_2.png";
                $img3 = "../assets/images/historyimages/historyimage_{$historyToEdit}_3.png";
                echo '<div class="imageCol"><div class="timeline-image" >
                    <img src="' . $img1 . '" id="preview1" alt="tijdlijn-image"></div>
                    <input type="file" name="image1" id="image1" onchange="previewImage1()" accept=".jpg, .jpeg, .png">
                </div>';
                echo '<div class="imageCol"><div class="timeline-image" >
                    <img src="' . $img2 . '" id="preview2" alt="tijdlijn-image"></div>
                    <input type="file" name="image2" id="image2" onchange="previewImage2()" accept=".jpg, .jpeg, .png">
                </div>';
                echo '<div class="imageCol"><div class="timeline-image" >
                    <img src="' . $img3 . '" id="preview3" alt="tijdlijn-image"></div>
                    <input type="file" name="image3" id="image3" onchange="previewImage3)" accept=".jpg, .jpeg, .png">
                </div>';
            ?>
</div>
<div class="subContainer">
<div class="prevNext">
<button type="submit" name="submit" >Add history</button>
            <input type="hidden" name="postToEdit" value="">
            <button type="cancel" name="cancel" onclick="window.location.href='./history.php'">Cancel</button>
</div>
</div>
</form>
</body>

</html>