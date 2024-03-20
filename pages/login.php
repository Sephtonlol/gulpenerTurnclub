<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
            

            <span for="">Name: </span><br>
            <input type="text" name="getname"><br>

            <span for="">Password: </span><br>
            <input type="password" name="getpassword"><br><br>

          
            <button type="submit" name="logIn">Log in</button>

            <span>sign up instead</span>
            <a href='signUp.php'>Sign Up.</a>
         </form>

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
</html>