<?php
error_reporting(0);
session_start();

if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    if ($_SESSION['authlevel'] > 1) {
        header("location: ./index.php");
        exit;
    }
} else {
    header("location: ./index.php");
        exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
</head>
<body>
    <span>dit is de edit pagina pagina</span>
</body>
</html>