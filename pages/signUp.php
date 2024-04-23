            <?php
            require __DIR__ . "\partials\_dbcon.php";
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
            <h4><span>SignUp</span></h4>
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
            <input class="input" type="password" name="confirmgetpassword" placeholder="Herhaal wachtwoord"/>
                    <label for="password">Herhaal wachtwoord:</label>
                </div>

            <button id="signUpButton" name="signUp">Confirm</button>

            <a class='discrete' href='login.php'>log in.</a>
        </div>
            <?php
            if(isset($_POST["signUp"])){
                $getname=$_POST["getname"];
                $getemail=$_POST["getemail"];
                $getpassword=$_POST["getpassword"];
                $confirmgetpassword=$_POST["confirmgetpassword"];

                $sql="select user_name from users where user_name ='$getname'";
                $sqlres=mysqli_query($connect, $sql);
                $rowcount=mysqli_num_rows($sqlres);


            if($rowcount != 0){
                echo "<p>Invalid</p>";
            exit;

            }
            if($getpassword != $confirmgetpassword){
                echo "<p>Invalid</p>";
            exit;

            }
            if (is_null($getname) == 1){
            echo "<p>Invalid</p>";
            exit;

            }
            if (is_null($getemail) == 1){
                echo "<p>Invalid</p>";
                exit;
    
            }
            if (is_null($getpassword) == 1){
                echo "<p>Invalid</p>";
                exit;
    
            }
                if((is_null($getname) == 0) && (is_null($getemail) == 0) && (is_null($getpassword) == 0) && ($rowcount ==0) && ($getpassword == $confirmgetpassword)){

                    $sql="insert into users (user_name, email, password) value ('$getname', '$getemail','$getpassword')";
                    $sqlres=mysqli_query($connect, $sql);

                    echo "<span class='approved'>Account is gemaakt!</span>";
                }
                else {
                    echo "<p>Invalid</p>";
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
