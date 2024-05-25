<?php

include "partials/_dbcon.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['authlevel'] > 1) {

header("location: ./index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <!-- <script src="../scripts/newBlog.js" defer></script> -->
    <link rel="stylesheet" href="../styling/blogPost.css">
    <link rel="stylesheet" href="../styling/history.css">

</head>
<body>
<form class="blogPost" method='post' action='procesHistory.php' enctype="multipart/form-data" >
        <div class='imageContainer' style="flex-shrink: 0.9;;">
            <img id="preview1" class="blogImage"  alt="postImage">
            <img id="preview2" class="blogImage"  alt="postImage">
            <img id="preview3" class="blogImage"  alt="postImage">
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
                    <input type="file" name="image1" id="image1" onchange="previewImage1()" accept=".jpg, .jpeg, .png">
                    <input type="file" name="image2" id="image2" onchange="previewImage2()" accept=".jpg, .jpeg, .png">
                    <input type="file" name="image3" id="image3" onchange="previewImage3()" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <button type="submit" name="new_post">Add history</button>
            <input type="hidden" name="postToEdit" value="">
            <button onclick="window.location.href='index.php'">Cancel</button>
        </div>
    </form>
</body>

<script>

function previewImage1() {
  let preview = document.getElementById("preview1");
  let file = document.getElementById("image1").files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}
function previewImage2() {
  let preview = document.getElementById("preview2");
  let file = document.getElementById("image2").files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewImage3() {
  let preview = document.getElementById("preview3");
  let file = document.getElementById("image3").files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}

</script>
</html>