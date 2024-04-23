<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit; 
}




if (isset($_POST['logoutsub'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}


if (isset($_POST['newBlog'])) {
    header("location: newBlog.php");
    exit;
}

require __DIR__ . "/partials/_dbcon.php";

            $query = "SELECT * FROM textfields";

            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
            $textfieldId = $row["textfield_id"];
            $textContent = $row["textContent"];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulpener Turnclub</title>
    <link rel="stylesheet" href="../styling/blog.css">
    <link rel="stylesheet" href="../styling/header.css">
    <link rel="stylesheet" href="../styling/preface.css">
    <link rel="stylesheet" href="../styling/longImage.css">
    <link rel="stylesheet" href="../styling/lesInformatie.css">
    <link rel="stylesheet" href="../styling/footer.css">


    <script src="../scripts/deletePostConfirm.js"></script>
</head>
<body>
    <div class="container">
    <div class="header">
        <div class="upperHeader">
            <div class="column">
            <img src="../assets/images/pageimages/pageImage_3.png" alt="logo" class="simpleImage">
            <?php
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editImage.php?imageToEdit=3>Edit Image</a><br>";
            }
            ?>
            </div>
            <div class="line"></div>
                
            <div class="simpleImage">
            <?php
            echo '<form method="post">
            <button class="button" type="submit" name="logoutsub">Log out</button>
            </form>';
            
            if ($_SESSION['authlevel'] <= 1) {
                echo "<a href=editImage.php?imageToEdit=1>Edit Image</a><br>";
            }
            
            ?>
            </div>
        </div>
        <span class="headerTitle">GULPENER TURNCLUB</span>
        <span class="headerText">Landsraderweg 5, 6271 NT Gulpen</span>
        <div class="buttonContainer">
            <button class="headerButtons">HomePage</button>
            <button class="headerButtons">Vereniging</button>
            <button class="headerButtons">Groepen</button>
            <button class="headerButtons">Geschiedenis</button>
            <button class="headerButtons">Foto's</button>
            <button class="headerButtons">Niews</button>
            <button class="headerButtons">Contact</button>

        </div>
    </div>
    <div class="preface">
<?php
$imageId = 2;
echo "<div class='column'><img class='images' src=../assets/images/pageImages/pageImage_" . $imageId . ".png >";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=" . $imageId . ">Edit Image</a>";
}
echo "</div>";

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];
if ($textfieldId == 1){
    echo "<div class='column'><span class='text'>" . $textContent . "</span>";
    }
}
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
        }
?>
    </div></div>

<?php
echo "<div class='column'><img class='longImage' src=../assets/images/pageImages/pageImage_5.png ></div>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=5>Edit Image</a>";
}
echo "</div></div>";

?>

<div class="theContainer">
<div class="lesInformatieContainer">
<?php
echo "<div class='lesInformatie'>";

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 2){
echo "<span class='lesInformatieTitle'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
if ($textfieldId == 3){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
if ($textfieldId == 4){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
if ($textfieldId == 5){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
echo "<div class='informatieLine'></div>";
echo "<img class='informatieImage' src='../assets/images/pageImages/pageImage_6.png' alt='pageImage_6'>";   
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=6>Edit Image</a>";
}
echo "</div></div>";
echo "<div class='lesInformatieContainer'>";

echo "<img class='informatieImage' src=../assets/images/pageImages/pageImage_7.png >";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editImage.php?imageToEdit=7>Edit Image</a>";
}
require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 6){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
if ($textfieldId == 7){
echo "<span class='lesInformatieText'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
echo "<div class='informatieLine'></div>";
echo "</div></div></div>";


?>

</div>

        <form method="POST" action="index.php">

    <span onclick="window.location.href='blog.php';" class="headerBlog">Laatste nieuws</span>
            <div class='blogIndex'>
                

            <?php

    require __DIR__ . "/partials/_dbcon.php";

    $query = "SELECT * FROM blog
    order by blog_id desc";

    $result = $mysqli->query($query);


    $count = 0;
    while (($row = $result->fetch_assoc()) && $count < 3) {
        $count++;
        $blogId = $row["blog_id"];
        $title = $row["title"];
        $content = $row["content"];
        $date = $row["date"];
        
        echo "<div class='blogPost'>";
        $imagePath = "../assets/images/blogimages/$blogId.png";
        if (file_exists($imagePath)) {
            echo "<div><img src='$imagePath' alt='$title' class='blogImage' ><br>";
        }
        echo "<div class='blogTitle'><span>" . $title .  "</span></div>";
        echo "<div class='blogTextContainer'><div class='filler2'></div><div class='blogText'><span>" . $content .  "</span></div><div class='filler2'></div></div></div>";
        
        echo "<div class='blogDate'> <span>" . $date . "</span><br>";
        echo "<a class='readPostRedirect' href='blogPost.php?postToView=" . $blogId . "'><div class='readPostContainer'><div class='readPost'>Lees meer</div></div></a>";


        if ($_SESSION['authlevel'] <= 1) {
        echo "<div class='editButtons'><a href=editPost.php?posttoedit=" . $blogId . ">Edit post</a><br>";
        echo "<a onclick='check()' href=deletePost.php/?posttodelete=" . $blogId . ">Delete post</a> </div>";
        }
        else {
        echo "<div class='filler'></div>";
        }
        echo "</div></div>";

    }

            ?>
            <div onclick="window.location.href='blog.php';" style="justify-content: center;" class="blogSpecial">
            <div class="specialTextContainer">
                <span class="blogTitle">alles zien</span>
                </div>
            </div>
            </div>
        </form>
        <footer>
            <div class="columnFooter">
                <?php

require __DIR__ . "/partials/_dbcon.php";

$query = "SELECT * FROM textfields";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$textfieldId = $row["textfield_id"];
$textContent = $row["textContent"];

if ($textfieldId == 8){
echo "<span class='footerTitle'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
if ($textfieldId == 9){
echo "<span class='footerText'>" . $textContent . "</span>";
if ($_SESSION['authlevel'] <= 1) {
    echo "<a href=editTextfield.php?textfieldToEdit=" . $textfieldId . ">Edit textfield</a>";
    }
}
}
                ?>
                </div>
                <div class="footerContainer">
                    <div class="footer">
                    <div class="footerLine"></div>
                    <div class="footerIcons">
                        <span>volg ons</span>
                        <a href="https://www.facebook.com/gulpenerturnclub/"><img class="icons" src="../assets/images/icons/facebook.png" alt="facebook"></a>
                        <a href="https://www.instagram.com/gulpenerturnclub/"><img class="icons" src="../assets/images/icons/instagram.png" alt="instagram"></a>

                    </div>
                    </div>
                </div>
                
        </footer>
    </div>
</body>
</html>