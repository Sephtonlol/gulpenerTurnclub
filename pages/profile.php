<?php
	require __DIR__ . "/partials/_dbcon.php";
		session_start();
	
	if (!isset($_SESSION['loggedin'])){
	
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
	<?php
	echo "<span>" . $_SESSION['sendusername'] . "</span>";
	echo "<span>" . $_SESSION['email'] . "</span>";
	?>
		
		<div class="buttonContainer" style="justify-content: space-evenly;">
			<button onclick="window.location.href='editProfile.php'">Edit Profile</button>
			<button onclick="window.location.href='editPassword.php'">Change Password</button>
			</div>
	</div>
	<?php
	require __DIR__ . "/partials/footer.php";
	
	?>
</body>
</html>