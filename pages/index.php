<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="containerIndex">
        <h1>Sign up</h1>
        <form action="POST">
            <span>Name:</span> <br>
            <input type="text" name="getname"> <br>

            <span>Email:</span> <br>
            <input type="text" name="getemail"> <br>

            <span>Password:</span> <br>
            <input type="password" name="getpassword"> <br>

            <span>Confirm Password:</span> <br>
            <input type="password" name="getpassword"> <br>

            <button id="signUpButton" name="signUp">Confirm</button>
            
        </form>

        <?php
        if(isset($_POST["signUp"])){
            
        }

        ?>
    </div>
</body>
</html>