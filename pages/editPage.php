<?php
session_start();

if ($_SESSION['authlevel'] > 1) {
    header("location: index.php");
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
    <span>HEYYYYYYY ADMIN VAN ME</span>
</body>
</html>