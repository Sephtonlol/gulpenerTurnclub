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
        <input type="text" name="title">
        <textarea name="content"></textarea>
        <button name="new_post">Add post</button>
    </form>

    <?php
    session_start();

    if(isset($_REQUEST['new_post'])){
        echo "yyyyyyyyyyyyyyyyyy";
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "INSERT INTO data(title, content) VALUES ('$title', '$content')";
    }


    ?>
</body>
</html>