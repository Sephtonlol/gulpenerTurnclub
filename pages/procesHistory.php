<?php
include "partials/_dbcon.php";

$query = "SELECT MAX(history_id) as max_id from history";
        
        $result = $mysqli->query($query);
        
        $row = $result->fetch_assoc();
        $id = $row['max_id'] + 1;
        $uploadDir = "../assets/images/historyimages/historyimage_";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadFile = $uploadDir . $id . "_1.png";
    
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], $uploadFile)) {
        echo "YAY!";
    } 
    $uploadFile = $uploadDir . $id . "_2.png";
    if (move_uploaded_file($_FILES["image2"]["tmp_name"], $uploadFile)) {
        echo "YAY!";
    } 
    $uploadFile = $uploadDir . $id . "_3.png";
    if (move_uploaded_file($_FILES["image3"]["tmp_name"], $uploadFile)) {
        echo "YAY!";
    } 

    

        $title=$_REQUEST["title"];
        $content=$_REQUEST["content"];
        $date=$_REQUEST["date"];
        

        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $content = filter_var($content, FILTER_SANITIZE_STRING);
        $date = filter_var($date, FILTER_SANITIZE_STRING);

        $sql="insert into history (history_id, title, content, date) value ('$id', '$title', '$content', '$date')";
        $sqlres=mysqli_query($connect, $sql);
        header("location: ./history.php");
    } else {
        echo "Upload failed.";
    }
        
        ?>
