<?php

include "partials/_dbcon.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
</head>
<body>
<form>
        <input type="text" name="title"> <br>
        <textarea name="content"></textarea> <br>
        <button name="new_post">Add post</button>
    </form>

    <?php
    session_start();
    require __DIR__ . "\partials\_dbcon.php";

    if ($_SESSION['authlevel'] > 1) {
        header("location: index.php");
        exit;
    }

    if(isset($_REQUEST["new_post"])){
        echo "Blog toegevoegd!";
        $title=$_REQUEST["title"];
        $content=$_REQUEST["content"];

        $sql="insert into blog (title, content) value ('$title', '$content')";
        $sqlres=mysqli_query($connect, $sql);
    }


    ?>
</body>
</html>