<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
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
        <label for="name">Naam:</label>
      </div>
      <div class="floating-label">
        <input placeholder="Wachtwoord" type="password" name="getpassword" id="password" >
        <label for="password">Wachtwoord:</label>
      </div>
      <button type="submit" name="logIn">Log in</button>
      <a href='signUp.php' class="discrete">Sign Up</a>
    </form>
</div>
    </div>
    <div>

         <?php
	
           if(isset($_POST['getname'])){
            require 'partials/_dbcon.php';

            $getname=$_POST['getname'];
            $getpassword=$_POST['getpassword'];
            $getname = filter_var($getname, FILTER_SANITIZE_STRING);
            $getpassword = filter_var($getpassword, FILTER_SANITIZE_STRING);

            $query = "select * from users where user_name = '$getname'";

            $result = $mysqli->query($query);

            $countrows=mysqli_num_rows($result);

            $user_details = $result->fetch_assoc();

			 $passwordHash = $user_details['password'];
			 $bool = password_verify($getpassword, $passwordHash);
			   
			  
			   if($bool === true){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sendusername']=$getname;
                $_SESSION['authlevel']=$user_details['authlevel'];

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