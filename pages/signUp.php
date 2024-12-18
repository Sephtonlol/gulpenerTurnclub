<?php
	error_reporting(E_ALL);
	ini_set("display_errors", "on");
	require_once "partials/_dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/loginSignUp.css">
</head>
<body>
<div class="deContainer">
    <div>
        <div class="session">
            <div class="left2">
                <?xml version="1.0" encoding="UTF-8"?>
            </div>
        <form class="log-in" action="" method="POST">
            <h4><span>Create account</span></h4>
            <div class="floating-label">
            <input class="input" type="text" name="getname" placeholder="Naam"/>
                <label for="name">Naam:</label>
            </div>
            <div class="floating-label">
            <input class="input" type="text" name="getemail" placeholder="Email"/>
            <label for="email">Email:</label>
            </div>
            <div class="floating-label">
            <input class="input" type="password" name="getpassword" placeholder="Wachtwoord"/>
                <label for="password">Wachtwoord:</label>
            </div>
                <div class="floating-label">
            <input class="input" type="password" name="confirmgetpassword" placeholder="Bevestig wachtwoord"/>
                    <label for="password">Bevestig wachtwoord:</label>
                </div>

            <button id="signUpButton" name="signUp">Confirm</button>

            <a class='discrete' href='login.php'>Inloggen</a>
        </div>
            <?php
            if(isset($_POST["signUp"])){
                $getname=$_POST["getname"];
                $getemail=$_POST["getemail"];
                $getpassword=$_POST["getpassword"];
                $confirmgetpassword=$_POST["confirmgetpassword"];

                $getname = filter_var($getname, FILTER_SANITIZE_SPECIAL_CHARS);
				$getemail = filter_var($getemail, FILTER_SANITIZE_EMAIL);
				$getpassword = htmlspecialchars($getpassword);
				$confirmgetpassword = htmlspecialchars($confirmgetpassword);


                $sql="select user_name from users where user_name ='$getname'";
                $sqlres=mysqli_query($connect, $sql);
                $rowcount=mysqli_num_rows($sqlres);


            if($rowcount != 0){
                echo "<p>Onvolledige of onjuiste informatie</p>";
            exit;

            }
            if($getpassword != $confirmgetpassword){
                echo "<p>Onvolledige of onjuiste informatie</p>";
            exit;

            }
            if (empty($getname) == 1){
            echo "<p>Onvolledige of onjuiste informatie</p>";
            exit;

            }
            if (empty($getemail) == 1){
                echo "<p>Onvolledige of onjuiste informatie</p>";
                exit;
    
            }
            if (empty($getpassword) == 1){
                echo "<p>Onvolledige of onjuiste informatie</p>";
                exit;
    
            }
                if((empty($getname) == 0) && (empty($getemail) == 0) && (empty($getpassword) == 0) && ($rowcount ==0) && ($getpassword == $confirmgetpassword)){

					$getpassword = password_hash($getpassword, PASSWORD_DEFAULT);
                    $sql="insert into users (user_name, email, password) value ('$getname', '$getemail','$getpassword')";
                    $sqlres=mysqli_query($connect, $sql);

                    echo "<span class='approved'>Account is gemaakt</span>";
                }
                else {
                    echo "<p>Onvolledige of onjuiste informatie</p>";
                exit;
                }
            }
            ?>
        </form>
        </div>
        <div>
    
    </div>
</body>
</html>
