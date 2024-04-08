<?php
include "partials/_dbcon.php";

$query = "SELECT MAX(blog_id) as max_id from blog";
        
        $result = $mysqli->query($query);
        
        $row = $result->fetch_assoc();
        $id = $row['max_id'] + 1;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $uploadDir = "../assets/images/blogimages/";
    $uploadFile = $uploadDir . $id . ".png";

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
        $title=$_REQUEST["title"];
        $content=$_REQUEST["content"];

        $sql="insert into blog (title, content) value ('$title', '$content')";
        $sqlres=mysqli_query($connect, $sql);
        header("location: index.php");
    } else {
        echo "Upload failed.";
    }
} else{
    header("location: index.php");
}
?>
