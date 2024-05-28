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
        $query = "SELECT * FROM history
        order by date desc";
        
        $result = $mysqli->query($query);
        if(isset($_SESSION['loggedin'])) {
        
        if ($_SESSION['authlevel'] <= 1) {
            echo "<a href='newHistory.php';' style='justify-content: center; align-items:' class='timeline-item newHistory'>
                    <div class='specialTextContainer'>
                        <span class='addHistory'>Geschiedenis Toevoegen</span>
                        </div>
            </a>";
                
        }}
        
        while ($row = $result->fetch_assoc()) {
            $historyId = $row["history_id"];
            $date = $row["date"];
            $title = $row["title"];
            $content = $row["content"];
            
            $img1 = "../assets/images/historyimages/historyimage_{$historyId}_1.png";
            $img2 = "../assets/images/historyimages/historyimage_{$historyId}_2.png";
            $img3 = "../assets/images/historyimages/historyimage_{$historyId}_3.png";


            echo '<div class="timeline-item">
            <span class="timeline-year">' . $date . '</span>
            <div class="timeline-content">
                <h3>' . $title . '</h3>
                <p>' . $content . '</p>
            </div>
            <div class="timeline-images">';
            if(file_exists($img1)){
                echo '<div class="timeline-image" onclick="window.location.href=\'image.php?historyimage=' . $historyId . '_1\'">
                    <img src="' . $img1 . '" alt="tijdlijn-image">
                </div>';
            }
            if(file_exists($img2)){
                echo '<div class="timeline-image" onclick="window.location.href=\'image.php?historyimage=' . $historyId . '_2\'">
                    <img src="' . $img2 . '" alt="tijdlijn-image">
                </div>';
            }
            if(file_exists($img3)){
                echo '<div class="timeline-image" onclick="window.location.href=\'image.php?historyimage=' . $historyId . '_3\'">
                    <img src="' . $img3 . '" alt="tijdlijn-image">
                </div>';
            }
            echo '</div>';
            if (isset($_SESSION["loggedin"])){

                if ($_SESSION['authlevel'] <= 1) {
                    echo '<div class="imageCol" ><a href=\'editHistory.php?historyToEdit=' . $historyId . '\'>Edit</a>';
                    echo '<a onclick="check()" href=\'deleteHistory.php?historyToDelete=' . $historyId . '\'>Delete</a></div>';
                }
            }
        echo '</div>';
        }        
        ?>
    </div>
</div>
<div class="anotherContainer">
<?php 

include __DIR__ . "/partials/footer.php";
?>
</div>
</body>
</html>
