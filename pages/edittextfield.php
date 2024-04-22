<?php
include "partials/_dbcon.php";

session_start();
if ($_SESSION['authlevel'] > 1) {
    header("location: ../index.php");
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
    <title>Edit Text</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="textfieldToEdit" value="<?php echo $textfieldToEdit;?>">
        <input name="edited_text" type="text" value="<?php echo $textContent; ?>">
        <button type="submit" name="editTextfield">Apply Changes</button>
    </form>
</body>
</html>
