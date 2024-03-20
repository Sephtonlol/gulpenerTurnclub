<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}

// Display welcome message
echo "Welcome " . $_SESSION['sendusername'];

// Check if user is admin
if ($_SESSION['authlevel'] > 1)
{
    echo "Dit is een user";
}

if ($_SESSION['authlevel'] <= 1) {
    echo '<form method="post">
              <button type="submit" name="editPage">Edit Page</button>
          </form>';
}


// Handle logout
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
</head>
<body>
    <!-- Logout form -->
    <form method="POST" action="index.php">
        <button type="submit" name="logoutsub">Log out</button>
    </form>
</body>
</html>
