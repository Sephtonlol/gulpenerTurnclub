<?php
    session_start();
    // Check if user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("location: login.php");
        exit; 
    }

    echo "Welcome " . $_SESSION['sendusername'];

    if (isset($_POST['logoutsub'])) {
        session_unset();
        session_destroy();
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <button type="submit" name="logoutsub">Log out</button>
    </form>

    <?php
    // Display edit button if user is logged in
    if ($_SESSION['loggedin'] == true) {
        // Display edit button only if user is admin
        if ($_SESSION['admin'] == 1) {
            echo '<form action="editPage.php" method="post">';
            echo '<button type="submit">Edit Page</button>';
            echo '</form>';
        }
    }
    ?>
</body>
</html>
