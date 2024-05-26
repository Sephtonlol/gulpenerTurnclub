<div>
<div class="smallHeader">
    <svg id="hamburger" class="Header__toggle-svg" viewbox="0 0 60 40">
                    <g stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                        <path id="top-line" d="M10,10 L50,10 Z"></path>
                        <path id="middle-line" d="M10,20 L50,20 Z"></path>
                        <path id="bottom-line" d="M10,30 L50,30 Z"></path>
                    </g>
                </svg>
    <span class="smallHeader">GulpenerTurnclub</span>
	</div>
                

<div class="buttonContainer" style="background-color: var(--quinary-color); padding-bottom: 10px;">
         <div  class="menu">
            <button class="headerButtons">HomePage</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php'" class="headerButtons">Home</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#info'" class="headerButtons">Info</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#algemeen'" class="headerButtons">Algemeen</button><br>
            <button id="dropdownMenu" onclick="window.location.href='index.php#footer'" class="headerButtons">Ondersteuning</button>
            </div>
        </div>
	
        <div class="menu">
            <button class="headerButtons">Vereniging</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
        </div>
        <div class="menu">
            <button onclick="window.location.href='history.php'" class="headerButtons">Geschiedenis</button>
        </div>
        <div class="menu">
            <button onclick="window.location.href='gallery.php'" class="headerButtons">Foto's</button>
        </div>
        <div class="menu">
            <button  class="headerButtons">Nieuws</button>
            <div class="expanding">
            <button id="dropdownMenu" onclick="window.location.href='index.php#news'" class="headerButtons">Recent</button><br>
            <button id="dropdownMenu" onclick="window.location.href='blog.php'" class="headerButtons">Alle nieuws</button>
            </div>
        </div>
        <div class="menu">
            <button class="headerButtons">Contact</button>
            <div class="expanding">
            <button id="dropdownMenu" class="headerButtons">Option1</button><br>
            <button id="dropdownMenu" class="headerButtons">Option2</button>
            </div>
			</div>
	<?php 
	if (isset($_SESSION['loggedin'])){
		
		echo '<div class="menu"><button onclick="window.location.href=\'profile.php\'" class="headerButtons">Profiel</button></div>';
	}
				?>


        <form method="post" class="menu">
    <?php 
    echo '<button class="headerButtons" style="margin-top: 2px" type="submit" name="logoutsub">' . ((!isset($_SESSION['loggedin']))?"Inloggen":"Uitloggen") . '</button>        </div>'; 
			
			if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
				echo "<script> window.location.href='./login.php';</script>";
    header("location: login.php");
    exit;
}
    ?>
</form>
        </div>

    <link rel="stylesheet" href="../styling/header.css">

    </div>