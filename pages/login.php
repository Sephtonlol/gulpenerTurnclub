<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="..\styling\style.css" />
    <link rel="stylesheet" href="..\styling\login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
<header rel="stylesheet" href="..\C:\idunno\htdocs\gulpenerTurnclub\styling\style.css">
<!--Logo-->
<div id="Logo">
<img src="../styling/images/turnclub-logo.png" alt="Logo">
</div>

<!-- Log in icon -->
<div class="rectangle"></div>
<h2 class="text-rectangle">Inloggen</h2>


<!-- Begin pagina Text -->
<div id="text">
    <h1>Gulpener<br>Turnclub</h1>
    <p>Landsraderweg 5, 6271 NT Gulpen</p>
</div>

<!-- Navigatie Balk-->
<div id="navigatie-container">
    <ul>
        <li><a href=”index.php”>Homepage</a></li>
        <li><a href=”#”>Vereniging</a></li>
        <li><a href=”#”>Groepen</a></li>
        <li><a href=”#”>Historie</a></li>
        <li><a href=”#”>Foto's</a></li>
        <li><a href=”#”>Nieuws</a></li>
        <li><a href=”#”>Contact</a></li> 
    </ul>  
</div>
</head>
<!
  </head>
  <body>
    <div class= 'footer'> </div> 
    <div class="containerLogin">
      <div class="card">
        <div class="text.center">
          <form method="POST">
            <span for="">Name: </span><br />
            <input type="text" name="getname" /><br />

            <span for="">Password: </span><br />
            <input type="password" name="getpassword" /><br /><br />

            <button type="submit" name="logIn">Log in</button>

            <span>sign up instead</span>
            <a href="signUp.php">Sign Up.</a>
          </form>
        </div>
      </div>

      <div class="card2"></div>

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
      <div class="top">INLOGGEN  </div> 
        <div-whitespace> </div-whitespace>
      </div>
    </div>
  </body>
</html>
