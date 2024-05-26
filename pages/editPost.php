<?php
error_reporting(0);
session_start();


include "partials/_dbcon.php";

if ($_SESSION['authlevel'] != 0 || $_SESSION['authlevel'] == null) {
  header("location: ./index.php");
  exit;
}
if(isset($_SESSION['loggedin'])) {

} else {
  header("location: ./index.php");
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
    $edited_post = filter_var($edited_post, FILTER_SANITIZE_STRING);
    $edited_title = filter_var($edited_title, FILTER_SANITIZE_STRING);
    $sql = "UPDATE blog SET content = '$edited_post', title = '$edited_title' WHERE blog_id = '$postToEdit'";
    $sqlres = mysqli_query($connect, $sql);

  $uploadDir = "../assets/images/blogimages/blogimage_";
  $uploadFile = $uploadDir . $postToEdit . ".png";
  


  if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
    header("Location: ./blog.php");
  }
  elseif (($sqlres) && !move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
    header("Location: ./blog.php");
  } {
    header("Location: ./blog.php");
  }

}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/blogPost.css">
    <link rel="stylesheet" href="../styling/style.css">
    <script src="../scripts/editPost.js"></script>
</head>
<body>
    <form class="blogPost" method="post" enctype="multipart/form-data">
      <div class='imageContainer'>
        <img class="blogImage" src="../assets/images/blogimages/blogimage_<?php echo $postToEdit . '.png'; ?>" alt="<?php echo $title . '.png'?>">
        
      </div>
      <div class='blogContent' style="height: 100%; max-width: 90vw;">
        <div >
          <div class='blogTitle' style="display: flex; justify-content: center;">
            <input name="edited_title"  style='min-width: 1px; flex-shrink: 2; flex-grow: 1;' 1px; required type="text" maxlength="50" value="<?php echo $title; ?>">
          </div>
          <div class='blogTextContainer' >
            <div class='blogText' style='display: flex; justify-content: center;'>
              <textarea style='display:flex; flex-grow: 1; margin: 20px;'name="edited_post" rows="35" required max-cols="50" ><?php echo $content; ?></textarea>
          </div>
            <input type="file" name="image" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png">
          </div>
        </div>
		  <div style="display: flex; justify-content: center; flex-direction: row-reverse;">
      <div class="prevNext" style="background-color: unset;">

        <button type="submit" name="editBlogPost">Apply Changes</button>
        <input type="hidden" name="postToEdit" value="<?php echo $postToEdit;?>">
        <button onclick="window.location.href='index.php'">Cancel</button>
			  </div>
			  </div>
      </div>
    </form>
</body>
</html>

