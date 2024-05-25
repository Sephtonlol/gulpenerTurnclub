<?php

require __DIR__ . "/partials/_dbcon.php";

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GulpenerTurnclub</title>
    <link rel="icon" type="x-icon" href="../assets/images/favicon.png">

    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/gallery.css">


<link rel="stylesheet" href="../styling/style.css">

<script src="../scripts/header.js" defer></script>
</head>
<body>
<?php

include "./partials/smallHeader.php";

?>

<?php

$imgB = $_GET['blogimage'];
$imgH = $_GET['historyimage'];
$imgG = $_GET['galleryimage'];

if(file_exists('../assets/images/galleryimages/galleryimage_' . $imgG. '.png')){
echo '<div class="deContainer" style="min-height: 300px;"><img src="../assets/images/galleryimages/galleryimage_' . $imgG . '.png" alt="image"></div>';
} elseif(file_exists('../assets/images/historyimages/historyimage_' . $imgH. '.png')){
echo '<div class="deContainer" style="min-height: 300px;" ><img src="../assets/images/historyimages/historyimage_' . $imgH . '.png" alt="image"></div>';
} elseif(file_exists('../assets/images/blogimages/blogimage_' . $imgB. '.png')){
echo '<div class="deContainer" style="min-height: 300px;" ><img src="../assets/images/blogimages/blogimage_' . $imgB . '.png" alt="image"></div>';
}

?>

<?php

include "./partials/footer.php";
    
?>

</body>
</html>