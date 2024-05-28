<?php
session_start();
error_reporting(0);

if(isset($_POST['Submit'])) { 
    if (!isset($_SESSION["loggedin"])) {
        $Naam = $_POST["Naam"];
        $Email = $_POST["Email"];
    }
    $Telefoonnummer = $_POST["Telefoonnummer"];
    $Bericht = $_POST["Bericht"];
    $bericht = wordwrap($Bericht, 70);
    $toEmail = "Gtcgulpener@gmail.com";
    $header = "From: noreply@gulpenerturnclub.nl";
    
    $mailbericht = "Naam: "  . $Naam . "\n" . $Bericht . "\n" . "Email: " . $Email .  "\n" . "Telefoonnummer: " . $Telefoonnummer;

    if(mail($toEmail, "Webformulier", $mailbericht, $header)){
        $message = "E-mail is verstuurd.";
        $_SESSION['last_email_time'] = time();
        $_SESSION['remainingTime'] = 60;
    } else {
        $message = "<p style='color: red;'>E-mail is niet verstuurd.</p>";
    }
}

if (!isset($_SESSION['last_email_time']) || (time() - $_SESSION['last_email_time']) > 60) {
    $_SESSION['remainingTime'] = 0;
} else {
    $_SESSION['remainingTime'] = 60 - (time() - $_SESSION['last_email_time']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" type="x-icon" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="../styling/footer.css"> 
    <link rel="stylesheet" href="../styling/header.css"> 
    <link rel="stylesheet" href="../styling/style.css"> 
    <link rel="stylesheet" href="../styling/contact.css"> 
    <script src="../scripts/header.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <script>
        let countdownTime;

        function startCountdown() {
            let countdownElement = document.getElementById('countdown');
            let submitButton = document.getElementById('submitEmail');

            submitButton.disabled = true;
            let countdownInterval = setInterval(() => {
                countdownElement.innerHTML = countdownTime + ' seconds remaining';
                countdownTime--;
                if (countdownTime < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML = '';
                    submitButton.disabled = false;
                    countdownTime = 60;
                }
            }, 1000);
        }

        window.onload = function() {
            <?php if (isset($_SESSION['remainingTime']) && $_SESSION['remainingTime'] > 0) : ?>
                countdownTime = <?php echo $_SESSION['remainingTime']; ?>;
                startCountdown();
            <?php else: ?>
                countdownTime = 60;
            <?php endif; ?>
        }
    </script>
</head>

<body>
    <?php 
    include "./partials/smallHeader.php";
    ?>
    <div class="mainContainer">
        <div class="form-container">
            <div class="text">
                <h5>Contact ons</h5>
            </div>
            <div class="row">
                <form name="emailContact" action="contact.php" method="POST">
                    <?php
                    if (!isset($_SESSION["loggedin"])) {
                        echo '<div class="input-row">
                            <label>Naam en achternaam <em>*</em></label>
                            <input type="text" name="Naam" required>
                        </div>
                        <div class="input-row">
                            <label>Email <em>*</em></label>
                            <input type="text" name="Email" required>
                        </div>';
                    }
                    ?>
                    <div class="input-row">
                        <label>Telefoonnummer <em>*</em></label>
                        <input type="text" name="Telefoonnummer" required>
                    </div>
                    <div class="input-row">
                        <label>Bericht <em>*</em></label>
                        <textarea name="Bericht" <?php if (isset($_SESSION["loggedin"])) { echo 'style="height: 370px;"'; } ?> required></textarea>
                    </div>
                    <div class="input-row">
                        <input type="submit" name="Submit" id="submitEmail" value="Versturen">   
                    </div>
                    <div id="countdown"></div>
                </form>

                <?php 
                if(!empty($_POST['Bericht'])) { 
                    echo "<div class='succes'>
                            <strong>$message</strong>
                          </div>";
                }
                ?>
            </div>
        </div>
        <div class="block">
            <div class="image">
                <a target="_blank" href="https://www.google.com/maps/@50.8100473,5.8903285,440m/data=!3m1!1e3?entry=ttu">
                    <img src="../assets/images/pageimages/pageImage_9.png" alt="Maps.Gulpener">
                </a>
            </div>
            <div class="informatie">
                <?php 
                require __DIR__ . "/partials/_dbcon.php";
                $query = "SELECT * FROM textfields";
                $result = $mysqli->query($query);
                while ($row = $result->fetch_assoc()) {
                    $textfieldId = $row["textfield_id"];
                    $textContent = $row["textContent"];
                    if ($textfieldId >= 19 && $textfieldId <= 28){
                        if ($textfieldId != 19 && $textfieldId != 24){
                            echo "<p>" . $textContent . "</p>";
                        } else {
                            echo "<b>" . $textContent . "</b>";
                        }
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            if ($_SESSION['authlevel'] <= 1) {
                                echo "<a href=edittextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include "./partials/footer.php";
    ?>
</body>
</html>
