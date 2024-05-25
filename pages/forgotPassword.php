<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/loginSignUp.css">
    <script>
        let countdownTime;

        function startCountdown() {
            let countdownElement = document.getElementById('countdown');
            let submitButton = document.getElementById('submitEmail');

            submitButton.disabled = true;
            let countdownInterval = setInterval(() => {
                countdownElement.innerHTML = countdownTime + ' seconds remaining';
                countdownTime--;
                if (countdownTime < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML = '';
                    submitButton.disabled = false;
                    countdownTime = 10;
                }
            }, 1000);
        }

        window.onload = function() {
            <?php if (isset($_SESSION['remainingTime']) && $_SESSION['remainingTime'] > 0) : ?>
                countdownTime = <?php echo $_SESSION['remainingTime']; ?>;
                startCountdown();
            <?php else: ?>
                countdownTime = 60;
            <?php endif; ?>
        }
    </script>
</head>
<body>
	<div class="deContainer">
		<div>
		<div class="session" style="padding: 20px;">
			<div class="left">
    <!--?xml version="1.0" encoding="UTF-8"?-->
</div>
	<div class="log-in" > 
      <h4 style="        margin-left: 30px; margin-bottom: 10px;" >GulpenerTurnclub</h4>
      <p style="line-height: 155%; margin-left: 30px;
        font-size: 14px;
        color: #000;
        opacity: 0.65;
        font-weight: 400;
        ">Eenmalige inlogcode ophalen</p>
    <form method="post">
		<div class="floating-label">
        <input name="address" placeholder="email" required id="email" autocomplete="off">
        <label style="user-select: none;" for="name">email</label>
      </div>

        <button name="submitEmail" id="submitEmail">Stuur</button>
        <div id="countdown"></div>
    </form>
	
		
		
		<?php
    require __DIR__ . "/partials/_dbcon.php";
    session_start();

    if(isset($_SESSION['loggedin'])) {
        header("location: ./index.php");
        exit;
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_SESSION['last_email_time']) || (time() - $_SESSION['last_email_time']) > 60) {
        $_SESSION['remainingTime'] = 0;
    } else {
        $_SESSION['remainingTime'] = 60 - (time() - $_SESSION['last_email_time']);
    }

    if (isset($_POST["submitEmail"])) {
        if ($_SESSION['remainingTime'] <= 0) {
            $loginCode = rand(100000, 999999);
            $_SESSION['loginCode'] = $loginCode;

            $to = filter_var($_POST["address"], FILTER_SANITIZE_EMAIL);
            $subject = "Eenmalige inlogcode";
            $txt = "Eenmalige inlogcode: " . $loginCode . "\n" . "Verander uw wachtwoord na het gebruik van deze code.";
            $headers = "From: noreply@gulpenerturnclub.nl";

            $query = "SELECT * FROM users WHERE email = '$to'";
            $result = $mysqli->query($query);

            if ($result && $result->num_rows > 0) {
                $user_details = $result->fetch_assoc();
                $_SESSION['user_details'] = $user_details;
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

    if (isset($_POST["submitLogin"])) {
        $codeInput = htmlspecialchars($_POST["code"], ENT_QUOTES, 'UTF-8');
        if (isset($_SESSION['loginCode']) && $codeInput == $_SESSION['loginCode']) {
            $user_details = $_SESSION['user_details'];
            $_SESSION['loggedin'] = true;
            $_SESSION['sendusername'] = $user_details['user_name'];
            $_SESSION['authlevel'] = $user_details['authlevel'];
			$_SESSION['email']=$user_details['email'];
			$_SESSION['userID']=$user_details['user_id'];

            header("location: index.php");
        } else {
            echo "<p>Invalid code.</p>";
        }
    }
    ?>
    <form method="post" style="padding: 0px 30px;">
		<div class="floating-label">
        <input name="code" placeholder="code" required id="email" autocomplete="off">
        <label style="user-select: none;" for="name">code</label>
      </div>
        <button name="submitLogin">Inloggen</button>
    </form>
		<div class="discrete" style="display:flex; justify-content: end; margin-top: 0; margin-right: 30px;">
      <a style="margin-right: 10px; margin-left: none;" href="login.php" class="discrete">Inloggen</a>
				 <a style="margin-left: 0;" href="signUp.php" class="discrete">Sign Up</a>
				 </div>
		</div>
			
		</div>
			
			
			</div>
	</div>

    
</body>
	<style>
		p {
		font-size: 20px;
		}
	</style>
</html>
