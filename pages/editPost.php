<?php
include "partials/_dbcon.php";

session_start();
if ($_SESSION['authlevel'] > 1) {
    header("location: ../index.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $postToEdit = $_POST['postToEdit'];
}
if ($_SERVER["REQUEST_METHOD"] == "GET"){

  $postToEdit = $_GET['posttoedit'];
}
  
  $query = "SELECT * FROM blog WHERE blog_id = '$postToEdit'";
  $result = mysqli_query($connect, $query);
  
  if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $content = $row['content'];
      $title = $row['title'];
  } else {
      $content = "Blog not found";
  }


if(isset($_POST['edited_post'])){
    $edited_post = $_POST["edited_post"];
    $edited_title = $_POST["edited_title"];
    $sql = "UPDATE blog SET content = '$edited_post', title = '$edited_title' WHERE blog_id = '$postToEdit'";
    $sqlres = mysqli_query($connect, $sql);

  $uploadDir = "../assets/images/blogimages/";
  $uploadFile = $uploadDir . $postToEdit . ".png";
  


  if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
    header("Location: ./index.php");
  }
  elseif (($sqlres) && !move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
    header("Location: ./index.php");
  } {
    header("Location: ./index.php");
  }

}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/blogPost.css">
    <script src="../scripts/editPost.js"></script>
</head>
<body>
    <form class="blogPost" method="post" enctype="multipart/form-data">
      <div class='imageContainer'>
        <img class="blogImage" src="../assets/images/blogimages/<?php echo $postToEdit . '.png'; ?>" alt="<?php echo $title . '.png'?>">
        
      </div>
      <div class='blogContent'>
        <div>
          <div class='blogTitle'>
            <input name="edited_title" type="text" maxlength="20" value="<?php echo $title; ?>">
          </div>
          <div class='blogTextContainer'>
            <div class='blogText'>
              <textarea name="edited_post" rows="35" cols="50" ><?php echo $content; ?></textarea>
            </div>
            <input type="file" name="image" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png">
          </div>
        </div>
        <button type="submit" name="editBlogPost">Apply Changes</button>
        <input type="hidden" name="postToEdit" value="<?php echo $postToEdit;?>">
        <button onclick="window.location.href='index.php'">Cancel</button>
      </div>
    </form>
</body>
</html>
