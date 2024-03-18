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
         </form>

         <?php
           if(isset($_POST['logIn'])){
            require 'partials/_dbcon.php'; //Create a seperate db connection file and link it
            
            $getname=$_POST['getname'];
            $getpassword=$_POST['getpassword'];

            $sql1="select * from users where user_name = '$getname' and password='$getpassword';";
            $sqlres=mysqli_query($connect, $sql1);
            $countrows=mysqli_num_rows($sqlres);

            if($countrows == 0){
                echo "account not available. Please <a href='index.php'>Sign Up.</a>";
            }else{
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sendusername']=$getname;
                header("location: dashboard.php"); 
            }
           }
         ?>

</body>
</html>