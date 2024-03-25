<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}

echo "Welkom " . $_SESSION['sendusername'];

if ($_SESSION['authlevel'] <= 1) {
    echo '<form method="post">
            <button type="submit" name="editPage">Edit Page</button>
        </form>';

    echo '<form method="post">
            <button type="submit" name="newBlog">nieuw blogpost</button>
        </form>';
}


if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}

if (isset($_POST['editPage'])) {
    header("location: editPage.php");
    exit;
}


if (isset($_POST['newBlog'])) {
    header("location: newBlog.php");
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
    <form method="POST" action="index.php">
        <button type="submit" name="logoutsub">Log out</button> <br>

        <form>
            <span>Blog</span> <br>

        <?php

        require __DIR__ . "\partials\_dbcon.php";

        $query = "Select * from blog";
        
        $result = $mysqli->query($query);
        
        while ($row = $result->fetch_assoc()) {
            echo $row["title"] . "<br>";
            echo $row["content"] . "<br>";
        }
        ?>
        </form>
    </form>
</body>
</html>
