<div class="phoneHeader">
<?php require __DIR__ . "/smallHeader.php"; ?>
        </div>
        <div class="container">
    <div class="header">
        <div class="upperHeader">
            <div class="column">
            <img src="../assets/images/pageimages/pageImage_3.png" alt="logo" class="simpleImage">
            <?php
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
                if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editImage.php?imageToEdit=3>Edit Image</a><br>";
            }
        }
            ?>
            </div>
            <div class="line"></div>
                
            <div class="simpleImage" style="align-self: center;">
            <?php
            
            echo '<form  method="post">
                <button class="button" type="submit" name="logoutsub">'.((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)?"Inloggen":"Uitloggen").'</button>
                </form>';
                if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editImage.php?imageToEdit=1>Edit Image</a><br>";
            }
        }
            
            ?>
            </div>
        </div>
        <span class="headerTitle">GULPENER TURNCLUB</span>
        <span class="headerText">Landsraderweg 5, 6271 NT Gulpen</span>
        <div class="buttonContainer">
            <div class=menu>
            <button class="headerButtons">HomePage</button>
            <div class="expanding">
                <button id="dropdownMenu" onclick="window.location.href='index.php'" class="headerButtons">Home</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#info'" class="headerButtons">Info</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#algemeen'" class="headerButtons">Algemeen</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#footer'" class="headerButtons">Ondersteuning</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Vereniging</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        
        <div class=menu>
            <button class="headerButtons">Geschiedenis</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Foto's</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button><br>
            <button id="dropdownMenu" class="headerButtons">Option3</button>
            </div>
        </div>
        <div class=menu>
            <button   class="headerButtons">Nieuws</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php#news'" class="headerButtons">Recent</button><br>
            <button id="dropdownMenu" onclick="window.location.href='blog.php'" class="headerButtons">Alle nieuws</button>
            </div>
        </div>
        <div class=menu>
            <button class="headerButtons">Contact</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
            </div>
			<?php 
	if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
		
		echo '<div class="menu"><button onclick="window.location.href=\'profile.php\'" class="headerButtons">Profiel</button></div>';
	}
				?>
        </div>
    </div>

    <link rel="stylesheet" href="../styling/header.css">
