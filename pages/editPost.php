<?php
include "partials/_dbcon.php";

session_start();
if ($_SESSION['authlevel'] > 1) {
    header("location: ../index.php");
    exit;
}



$postToEdit = $_GET['posttoedit'];

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
    $sql = "UPDATE blog SET content = '$edited_post' WHERE blog_id = '$postToEdit'";
    $sql = "UPDATE blog SET title = '$edited_title' WHERE blog_id = '$postToEdit'";
    $sqlres = mysqli_query($connect, $sql);
    if($sqlres){
        echo "post edited successfully";
        header("Location: ./index.php");
    } else {
        echo "Error editing text";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit post</title>
</head>
<body>
    <form method="post">
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"> <br>
        <input type="hidden" name="blogPostToEdit" value="<?php echo $postToEdit;?>">
        <input name="edited_title" type="text" value="<?php echo $title; ?>">
        <input name="edited_post" type="text" value="<?php echo $content; ?>">
        <button type="submit" name="editBlogPost">Apply Changes</button>
    </form>
</body>
</html>

