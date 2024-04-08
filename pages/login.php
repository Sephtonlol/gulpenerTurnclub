<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="..\styling\login.css">
</head>
<body>
    <div class="containerLogin">

    <div class=card>
        <div class=text.center>
        <form method="POST">
            
        
            <span for="">Name: </span><br>
            <input type="text" name="getname"><br>

            <span for="">Password: </span><br>
            <input type="password" name="getpassword"><br><br>

          
            <button type="submit" name="logIn">Log in</button>

            <span>sign up instead</span>
            <a href='signUp.php'>Sign Up.</a>
         </form>
</div>
    </div>

    <div class= card2> 
        
    </div> 

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

</body>

<div class='footer'>

<footer-text>lorum lorum banaan, abacadabra </footer-text>
<div-whitespace> </div-whitespace> 

 </footer>
 </div>
</html>