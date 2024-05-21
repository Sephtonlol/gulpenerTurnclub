<?php
require __DIR__ . "/partials/_dbcon.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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
    <link rel="icon" type="x-icon" href="../assets/images/favicon.png">
    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styling/profile.css">
    <link rel="stylesheet" href="../styling/style.css">
</head>
<body>
<div>
    <?php require __DIR__ . "/partials/smallHeader.php"; ?>
</div>

<div class="profile">
    <form method="post">
        <button style="margin: 5px 0px 5px 5px;" name="sendCode">Send Code</button>
    </form>
    <form method="post">
        <input  name="oldPassword" placeholder="Old Password/One Time Login Code" required autocomplete="off">
        <input type="password"name="newPassword" placeholder="Password" required autocomplete="off">
        <input type="password"name="newPasswordConfirm" placeholder="Password confirm" required autocomplete="off">
        <div class="buttonContainer" style="justify-content: space-evenly; flex-direction: row-reverse;">
            <button name="submit">Confirm</button>
            <button name="cancel" onclick="window.location.href='profile.php'">Cancel</button>
        </div>
    </form>
</div>

<?php
$_SESSION['remainingTime'] = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sendCode'])) {
    if ($_SESSION['remainingTime'] <= 0) {
        $loginCode = rand(100000, 999999);
        $_SESSION['loginCode'] = $loginCode;

        $to = $_SESSION['email'];
        $subject = "Eenmalige inlogcode";
        $txt = "Eenmalige inlogcode: " . $loginCode . "\n" . "Verander uw wachtwoord na het gebruik van deze code.";
        $headers = "From: noreply@gulpenerturnclub.nl";

        $query = "SELECT * FROM users WHERE email = '$to'";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            if (mail($to, $subject, $txt, $headers)) {
                echo "<p style='color: green;'>Email verstuurd!</p>";
                $_SESSION['last_email_time'] = time();
                $_SESSION['remainingTime'] = 60;
            } else {
                echo "<p>Mail not sent.</p>";
            }
        } else {
            echo "<p>Invalid email address.</p>";
        }
    } else {
        echo "<p>Wacht " . $_SESSION['remainingTime'] . " seconden voor dat een nieuwe code verstuurd kan worden</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel'])) {
    echo "<script> window.location.href='./profile.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $userID = $_SESSION['userID'];
    $oldPassword = htmlspecialchars($_POST["oldPassword"]);

    $query = $mysqli->prepare("SELECT * FROM users WHERE user_id = ?");
    $query->bind_param("s", $userID);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user_details = $result->fetch_assoc();
        $passwordHash = $user_details['password'];

        if (password_verify($oldPassword, $passwordHash) || $oldPassword == $_SESSION['loginCode']) {
            if (isset($_POST['newPassword']) && isset($_POST['newPasswordConfirm'])) {
                $newPassword = $_POST['newPassword'];
                $newPasswordConfirm = $_POST['newPasswordConfirm'];

                if ($newPassword === $newPasswordConfirm) {
                    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $updateQuery = $mysqli->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                    $updateQuery->bind_param("ss", $newPasswordHash, $userID);

                    if ($updateQuery->execute()) {
                        echo "Password updated successfully.";
                        echo "<script> window.location.href='./index.php';</script>";
                        exit;
                    } else {
                        echo "<p>Error updating password.</p>";
                    }
                } else {
                    echo "<p>New passwords do not match.</p>";
                }
            }
        } else {
            echo "<p>Old password is incorrect.</p>";
        }
    } else {
        echo "<p>User not found.</p>";
    }
}

require __DIR__ . "/partials/footer.php";
?>
</body>
</html>
