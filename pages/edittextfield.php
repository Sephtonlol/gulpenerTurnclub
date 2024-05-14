<?php
include "partials/_dbcon.php";
session_start();

error_reporting(0);

if ($_SESSION['authlevel'] != 0 || $_SESSION['authlevel'] == null) {
    header("location: ./index.php");
    exit;
}
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {

} else {
    header("location: ./index.php");
    exit;
    }


$textfieldToEdit = $_GET['textfieldToEdit'];
$query = "SELECT * FROM textfields WHERE textfield_id = '$textfieldToEdit'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $textContent = $row['textContent'];
} else {
    $textContent = "Text not found";
}

if(isset($_POST['edited_text'])){
    $edited_text = $_POST["edited_text"];
    $edited_text = filter_var($edited_text, FILTER_SANITIZE_STRING);
    $sql = "UPDATE textfields SET textContent = '$edited_text' WHERE textfield_id = '$textfieldToEdit'";
    $sqlres = mysqli_query($connect, $sql);
    if($sqlres){
        echo "Text edited successfully";
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
    <link rel="stylesheet" href="../styling/blogPost.css">
    <title>Edit Text</title>
</head>
<body>
    <form class="blogPost" method="post">
      <div class='blogContent'>
        <div>
          <div class='blogTextContainer'>
            <div class='blogText'>
              <textarea style='margin-top: 30px;' name="edited_text" rows="35" cols="50" ><?php echo $textContent; ?></textarea>
            
        </div>
        <button type="submit" name="editTextfield">Apply Changes</button>
        <input type="hidden" name="textfieldToEdit" value="<?php echo $textfieldToEdit;?>">
        <button onclick="window.location.href='index.php'">Cancel</button>
      </div>
    </form>
</body>
</html>
