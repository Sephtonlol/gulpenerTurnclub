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
	
    <link rel="stylesheet" href="../styling/history.css">
    <link rel="stylesheet" href="../styling/style.css">

</head>
<body>

<div class="timeline" style=" width: 80%;">
<form class="timeline-item" style="margin-top: 50px;" method='post' action='procesHistory.php' enctype="multipart/form-data">
            <input placeholder="Datum" name="date" required maxlength="4" style="width:40px" class="timeline-year"></input>
            <div class="timeline-content">
                <input name="title" type="text" maxlength="50" placeholder="Titel" required></input>
                <textarea style="flex-grow: 1;"name="content" rows="10" max-cols="50" placeholder="Gebeurtenis" required></textarea>
            </div>
            <div class="timeline-images">
                <div class="imageCol">
                <div class="timeline-image">
                <img id="preview1" class="blogImage"  alt="postImage">
                </div>
                <input type="file" name="image1" id="image1" onchange="previewImage1()" accept=".jpg, .jpeg, .png">

                </div>
                
                <div class="imageCol">
                <div class="timeline-image">
                <img id="preview2" class="blogImage"  alt="postImage">
                </div>
                <input type="file" name="image2" id="image2" onchange="previewImage2()" accept=".jpg, .jpeg, .png">

                </div>

                <div class="imageCol">
                <div class="timeline-image">
                <img id="preview3" class="blogImage"  alt="postImage">
                </div>
                <input type="file" name="image3" id="image3" onchange="previewImage3()" accept=".jpg, .jpeg, .png">


</div>
</div>
<div class="subContainer">
<button type="submit" name="new_post">Add history</button>
            <input type="hidden" name="postToEdit" value="">
            <button onclick="window.location.href='history.php'">Cancel</button>
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