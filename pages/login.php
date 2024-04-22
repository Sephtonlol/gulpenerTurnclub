<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="..\styling\login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

  </head>
  <body>

    <div class='topbar'> inloggen </div>
  
    <div class="containerLogin">
      <div class="card">
        <div class="text.center">
          <form method="POST">
            <span for="">Name: </span><br />
            <input type="text" name="getname" /><br />

            <span for="">Password: </span><br />
            <input type="password" name="getpassword" /><br /><br />

            <button type="submit" name="logIn">Log in</button>

            <span>of</span>
            <a href="signUp.php">maak een account aan.</a>
          </form>
        </div>
      </div>    

      <div class="card2"></div>
      <div>
         <?php
           if(isset($_POST['logIn'])){
            require 'partials/_dbcon.php'; //Create a seperate db connection file and link it
            
            $getname=$_POST['getname'];
            $getpassword=$_POST['getpassword'];

            $query = "select * from users where user_name = '$getname' and password='$getpassword'";

            $result = $mysqli->query($query);

            $countrows=mysqli_num_rows($result);

            $user_details = $result->fetch_assoc();
            
            if($countrows == 0){
                exit;
            }else{
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sendusername']=$getname;
                $_SESSION['authlevel'] = $user_details['authlevel'];
                header("location: index.php"); 
            }
           }
         ?>
        <div-whitespace> </div-whitespace>
      </div>
    </div>
  </body>
</html>
