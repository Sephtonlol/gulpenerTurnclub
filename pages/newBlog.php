<?php

include "partials/_dbcon.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <script src="../scripts/newBlog.js"></script>
    <link rel="stylesheet" href="../styling/blogPost.css">
</head>
<body>
<form class="blogPost" method='post' action='procesPost.php' enctype="multipart/form-data" >
        <div class='imageContainer' style="flex-shrink: 0.9;;">
            <img id="preview" class="blogImage" src="../assets/images/logoWB.png" alt="postImage">
        </div>
        <div class='blogContent' style="max-width: 90vw; height: 100%;">
            <div>
                <div class='blogTitle' style="display: flex;">
                    <input style="flex-shrink: 1; min-width: 1px; max-width: none; flex-grow: 1;" name="title" type="text" maxlength="50" placeholder="Enter title">
                </div>
                <div class='blogTextContainer' style="flex-shrink: 1;">
                    <div class='blogText' style="display: flex; margin: 10px; background-color: #FFFFFF00;">
                        <textarea style="flex-grow: 1;"name="content" rows="35" max-cols="50" placeholder="Enter content"></textarea>
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