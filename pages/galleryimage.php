<?php

require __DIR__ . "/partials/_dbcon.php";


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

$photoToShow = $_GET['galleryimage'];


echo '<div class="deContainer"><img src="../assets/images/galleryimages/galleryimage_' . $photoToShow . '.png" alt="image"></div>';

?>

<?php

include "./partials/footer.php";
    
?>

</body>
</html>