<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel='stylesheet' href="..\styling\login.css" />
    <title>Gulpener Turnclub</title>
</head>
<body>

<div class='card'>
    <div class="containerIndex">
        <h1>Sign up</h1>
        <form action="" method="POST">
            <span>Name:</span> <br />
            <input type="text" name="getname" /> <br />

            <span>Email:</span> <br />
            <input type="text" name="getemail" /> <br />

            <span>Password:</span> <br />
            <input type="password" name="getpassword" /> <br />

            <span>Confirm Password:</span> <br />
            <input type="password" name="confirmgetpassword" /> <br />

            <button id="signUpButton" name="signUp">Confirm</button>

            <a href='login.php'>log in.</a>
        </form>
</div>

<div class="card2"></div>
    
        <?php
        if(isset($_POST["signUp"])){
          require __DIR__ . "\partials\_dbcon.php";
            $getname=$_POST["getname"];
            $getemail=$_POST["getemail"];
            $getpassword=$_POST["getpassword"];
            $confirmgetpassword=$_POST["confirmgetpassword"];

            $sql="select user_name from users where user_name ='$getname'";
            $sqlres=mysqli_query($connect, $sql);
            $rowcount=mysqli_num_rows($sqlres);

            if($rowcount != 0){
                echo "User name not available";
            }
            if($getpassword != $confirmgetpassword){
                echo "password is not equal to confirmation field";
            }
            if(($rowcount ==0) && ($getpassword == $confirmgetpassword)){;
                echo "<span>YAYYYYYY JE HEBT EEN ACCOUNT GEMAAKT</span>";

                $sql="insert into users (user_name, email, password) value ('$getname', '$getemail','$getpassword')";
                $sqlres=mysqli_query($connect, $sql);
            }
        }
        ?>
    </div>
</body>
</html>
