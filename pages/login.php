<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
	<link rel="icon" type="x-icon" href="../assets/images/favicon.png">
	
    <link rel="stylesheet" href="../styling/loginSignUp.css">
    <link rel="stylesheet" href="../styling/style.css">


</head>
<body>
<div class="deContainer">
    <div>
<div class="session">
<div class="left">
    <?xml version="1.0" encoding="UTF-8"?>
</div>
         <form class="log-in" method="POST"> 
      <h4>Gulpener<span>Turnclub</span></h4>
      <p>Welcome terug!</p>
      <div class="floating-label">
        <input placeholder="Naam" type="text" name="getname" id="email" autocomplete="off">
        <label style="user-select: none;" for="name">Naam:</label>
      </div>
      <div class="floating-label">
        <input placeholder="Wachtwoord" type="password" name="getpassword" id="password" >
        <label style="user-select: none;" for="password">Wachtwoord:</label>
      </div>
      <button type="submit" name="logIn">Log in</button>
			 <div class="discrete">
      <a style="margin-right: 10px;" href='forgotPassword.php' class="discrete">Wachtwoord vergeten</a>
				 <a href='signUp.php' class="discrete">Sign Up</a>
				 </div>
    </form>
</div>
    </div>
    <div>

         <?php

	session_start();
	
	if(isset($_SESSION['loggedin'])) {
header("location: ./index.php");
  exit;
} 
	
           if(isset($_POST['getname'])){
            require 'partials/_dbcon.php';

            $getname=$_POST['getname'];
            $getpassword=$_POST['getpassword'];
            $getname = filter_var($getname, FILTER_SANITIZE_STRING);
			$getpassword = htmlspecialchars($getpassword);


            $query = "select * from users where user_name = '$getname'";

            $result = $mysqli->query($query);

            $countrows=mysqli_num_rows($result);

            $user_details = $result->fetch_assoc();

			 $passwordHash = $user_details['password'];
			 $passwordyes = password_verify($getpassword, $passwordHash);
			   
			   if($passwordyes === true && $user_details["user_name"] === $getname){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sendusername']=$getname;
                $_SESSION['authlevel']=$user_details['authlevel'];
				$_SESSION['email']=$user_details['email'];
				$_SESSION['userID']=$user_details['user_id'];

                header("location: index.php");
            }else{  
				unset($_POST['getname']);
                unset($_POST['getpassword']);
                echo "<p>Wachtwoord/Naam onjuist</p>";

                exit;
            }
           }
         ?>
    </div>
</div>
</body>
</html>