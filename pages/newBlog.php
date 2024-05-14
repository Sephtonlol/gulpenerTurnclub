<?php

include "partials/_dbcon.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <script src="../scripts/newBlog.js"></script>
    <link rel="stylesheet" href="../styling/blogPost.css">
</head>
<body>
<form class="blogPost" method='post' action='procesPost.php' enctype="multipart/form-data">
        <div class='imageContainer'>
            <img id="preview" class="blogImage" src="../assets/images/logoWB.png" alt="postImage">
        </div>
        <div class='blogContent'>
            <div>
                <div class='blogTitle'>
                    <input name="title" type="text" maxlength="50" placeholder="Enter title">
                </div>
                <div class='blogTextContainer'>
                    <div class='blogText'>
                        <textarea name="content" rows="35" cols="50" placeholder="Enter content"></textarea>
                    </div>
                    <input type="file" name="image" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <button type="submit" name="new_post">Add post</button>
            <input type="hidden" name="postToEdit" value="">
            <button onclick="window.location.href='index.php'">Cancel</button>
        </div>
    </form>
</body>
</html>

<script>
    function previewImage() {
  var preview = document.getElementById("preview");
  var file = document.getElementById("image").files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}

</script>