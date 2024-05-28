<?php
	require __DIR__ . "/partials/_dbcon.php";
		session_start();
	
        if(!isset($_SESSION['loggedin'])) {
	
		header("location: index.php");
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
	<?php
	require __DIR__ . "/partials/smallHeader.php";
	
	?>
</div>
	
	<div class="profile" >
		
		<form method="post">
	<?php
		
	echo '<input name="name" placeholder="Naam" required id="email" autocomplete="off" value=' . $_SESSION['sendusername'] . '>';
	echo '<input name="email" placeholder="email" required id="email" autocomplete="off" value=' . $_SESSION['email'] . '>';
	?>
		
		<div class="buttonContainer" style="justify-content: space-evenly; flex-direction: row-reverse;">
			<button name="submit">Confirm</button>
			
			<button name="cancel" onclick="window.location.href='profile.php'">Cancel</button>
			
			
			</div>
</form>
	</div>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel'])) {
		echo "<script> window.location.href='./profile.php';</script>";
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $userID = $_SESSION['userID'];
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Check if name already exists
    $sql = "SELECT COUNT(*) FROM users WHERE user_name = ? AND user_id != ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $name, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nameCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($nameCount > 0) {
        echo "<p>The username is already in use.</p>";
		require __DIR__ . "/partials/footer.php";
        exit;
    }

    // Check if email already exists
    $sql = "SELECT COUNT(*) FROM users WHERE email = ? AND user_id != ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $email, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $emailCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($emailCount > 0) {
        echo "<p>The email is already in use.</p>";
		require __DIR__ . "/partials/footer.php";
        exit;
    }

    // Update name
    $sql = "UPDATE users SET user_name = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $name, $userID);
    $nameUpdateResult = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
	$_SESSION['sendusername'] = $name;

    // Update email
    $sql = "UPDATE users SET email = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $email, $userID);
    $emailUpdateResult = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
	$_SESSION['email'] = $email;
		

    if ($nameUpdateResult && $emailUpdateResult) {
        echo "Profile updated successfully.";
		echo "<script> window.location.href='./profile.php';</script>";
	exit;
    } else {
        echo "<p>Error updating profile.</p>";
    }
}

		
	require __DIR__ . "/partials/footer.php";
	
	
		
	
	
	?>
</body>
</html>