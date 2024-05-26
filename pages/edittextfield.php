<?php
include __DIR__ . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "_dbcon.php";
session_start();

error_reporting(E_ALL);

if ($_SESSION['authlevel'] != 0 || !isset($_SESSION['authlevel'])) {
    header("Location: ./index.php");
    exit;
}

if(!isset($_SESSION['loggedin'])) {
    header("Location: ./index.php");
    exit;
}

$textfieldToEdit = isset($_GET['textfieldToEdit']) ? intval($_GET['textfieldToEdit']) : 0;
$query = "SELECT * FROM textfields WHERE textfield_id = $textfieldToEdit";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $textContent = htmlspecialchars($row['textContent']);
} else {
    $textContent = "Text not found";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edited_text'])) {
    $edited_text = filter_var($_POST["edited_text"], FILTER_SANITIZE_STRING);
    $textfieldToEdit = intval($_POST['textfieldToEdit']);
    $sql = "UPDATE textfields SET textContent = ? WHERE textfield_id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $edited_text, $textfieldToEdit);
    $sqlres = mysqli_stmt_execute($stmt);
    
    if ($sqlres) {
        echo "Text edited successfully";
        header("Location: ./index.php");
        exit;
    } else {
        echo "Error editing text";
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/blogPost.css">
    <title>Edit Text</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
    
    <link rel="stylesheet" href="../styling/style.css">
	
</head>
<body style="overflow-x: hidden">
    <form class="blogPost" method="post" style="width: 100vw;">
        <div class='blogContent' style='min-height: 90vh; align-items: center; min-width: 80vw; background-color: unset; justify-content: center;'>
            <div style="width: 95%; margin-top: 20px">
                <div class='blogTextContainer' >
                    <div class='blogText' style="display: flex; background-color: unset;">
                        <textarea id="dynamicTextarea" style='display:flex; flex-grow: 1; margin-top: 30px;' name="edited_text" rows="35" max-cols="50"><?php echo $textContent; ?></textarea>
                    </div>
                </div>
            </div>
			<div class="prevNext">
        <button type="submit" name="editTextfield">Apply Changes</button>
        <input type="hidden" name="textfieldToEdit" value="<?php echo $textfieldToEdit; ?>">
        <button type="button" onclick="window.location.href='index.php'">Cancel</button>
			</div>
        </div>
		
    </form>
</body>
</html>



