<?php
include "partials/_dbcon.php";

$query = "SELECT MAX(blog_id) as max_id from blog";
        
        $result = $mysqli->query($query);
        
        $row = $result->fetch_assoc();
        $id = $row['max_id'] + 1;
        $uploadDir = "../assets/images/blogimages/blogimage_";
        $uploadFile = $uploadDir . $id . ".png";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
        echo "YAY!";
    } else {
        $source = "../assets/images/logoWB.png";

        copy($source, $uploadFile);

    }
    

        $title=$_REQUEST["title"];
        $content=$_REQUEST["content"];

        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $content = filter_var($content, FILTER_SANITIZE_STRING);

        $sql="insert into blog (blog_id, title, content) value ('$id', '$title', '$content')";
        $sqlres=mysqli_query($connect, $sql);
        header("location: ./blog.php");
    } else {
        echo "Upload failed.";
    }
        
        ?>
