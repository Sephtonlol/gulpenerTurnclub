<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="x-icon" href="../assets/images/favicon.png">
    <title>GulpenerTurnclub</title>
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/history.css">
    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/style.css">
    <link rel="stylesheet" href="../styling/footer.css">

    <script src="../scripts/header.js" defer></script>
    <script src="../scripts/deletePostConfirm.js"> defer</script>
</head>

 <!-- header -->
<body>
<!-- Historie begin -->
<div class='anotherContainer'>
<?php 
session_start();

require __DIR__ . "/partials/_dbcon.php";
include __DIR__ . "/partials/smallHeader.php";
?>
</div>
<!-- Container voor de tijdlijn en titel -->
<div class="timeline-container">
    <!-- Titel van de tijdlijn -->
    <h2 class="timeline-title">Geschiedenis</h2>
    <!-- Container voor de tijdlijnitems -->
    <div class="timeline">
        <?php 
        $query = "SELECT * FROM blog
        order by blog_id desc";
        
        $result = $mysqli->query($query);
        if(isset($_SESSION['loggedin'])) {
        
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href='newHistory.php';' style='justify-content: center; align-items:' class='timeline-item'>
                    <div class='specialTextContainer'>
                        <span class='addHistory'>Geschiedenis Toevoegen</span>
                        </div>
            </a>";
                
        }}
        
        ?>
        
        <!-- Tijdlijnitem voor 1877 -->
        <div class="timeline-item">
            <span class="timeline-year">1877</span>
            <!-- Inhoud van het tijdlijnitem -->
            <div class="timeline-content">
                <h3>Oprichting en vroege jaren</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quidem reprehenderit, atque beatae aspernatur est iure veritatis officiis illo quo?</p>
            </div>
            <!-- Container voor de afbeeldingen -->
            <div class="timeline-images">
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
            </div>
        </div>
        
        <!-- Tijdlijnitem voor 1950 -->
        <div class="timeline-item">
            <span class="timeline-year">1950</span>
            <div class="timeline-content">
                <h3>Belangrijke mijlpalen en prestatie</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veniam fugit mollitia praesentium ea iusto magni deleniti, incidunt molestias laudantium.</p>
            </div>
            <div class="timeline-images">
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
            </div>
        </div>
        
        <!-- Tijdlijnitem voor 2000 -->
        <div class="timeline-item">
            <span class="timeline-year">2000</span>
            <div class="timeline-content">
                <h3>Groeiperiode en ontwikkeling</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non excepturi quibusdam alias corrupti molestias a velit harum. Sequi, maxime deserunt.</p>
            </div>
            <div class="timeline-images">
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
            </div>
        </div>
        
        <!-- Tijdlijnitem voor 2015 -->
        <div class="timeline-item">
            <span class="timeline-year">2015</span>
            <div class="timeline-content">
                <h3>Speciale evenementen</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur maiores dolorem nihil non iste, eos ipsa assumenda accusantium porro facere.</p>
            </div>
            <div class="timeline-images">
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
            </div>
        </div>
        
        <!-- Tijdlijnitem voor 2024 -->
        <div class="timeline-item">
            <span class="timeline-year">2024</span>
            <div class="timeline-content">
                <h3>Huidige status</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quas dolor enim nulla illo perspiciatis quo quae beatae minima soluta.</p>
            </div>
            <div class="timeline-images">
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
                <div class="timeline-image">
                    <img src="../assets/images/pageimages/???" alt="tijdlijn-image">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="anotherContainer">
<?php 

include __DIR__ . "/partials/footer.php";
?>
</div>
</body>
</html>
