<?php

include "partials/_dbcon.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-w\idth, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
</head>
<body>
<form method='post' action='procesPost.php' enctype="multipart/form-data">
        <input type="text" name="title"> <br>
        <textarea name="content" rows="4" cols="50"> </textarea> <br>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"> <br>
        <button type='submit' name="new_post">Add post</button>
    </form>
</body>
</html>